<?php

namespace Context\DataWrapper;

abstract class Base implements \ArrayAccess, DataWrapperInterface
{
    /**
     * Base constructor - you may use an array to initialize the dataWrapper
     *
     * @param array $data
     */
    public function __construct(array $data = array())
    {
        if (!empty($data)) {
            $ref = new \ReflectionObject($this);
            foreach ($ref->getProperties() as $property) {
                try {
                    $value = $this->getValue($data, $property->getName());
                    if ($this->isCollection($property)) {
                        $value = $this->toCollection($value, $property);
                    }
                    $property->setAccessible(true);
                    $property->setValue($this, $value);
                } catch (\Exception $e) {
                    // does nothing when we don't have a certain property in
                    // the $data array
                }
            }
        }
    }

    /**
     * Getter and Setters
     *
     * @param string $name
     * @param array $args
     */
    public function __call($name, array $args)
    {
        if (in_array(substr($name, 0, 3), array('get', 'set'))) {
            $property = lcfirst(substr($name, 3));
            $ref = new \ReflectionObject($this);

            if ($ref->hasProperty($property)) {
                $property = $ref->getProperty($property);
                $property->setAccessible(true);
                switch (substr($name, 0, 3)) {
                    case 'get':
                        return $property->getValue($this);
                    case 'set':
                    default:
                        $property->setValue($this, $args[0]);
                        return $this;
                }
            }

            throw new \InvalidArgumentException(
                sprintf('Property %s does not exists', $property)
            );
        }

        throw new \InvalidArgumentException('Method does not exists');
    }

    /**
     * Export dataWrapper values as an array
     *
     * @return array
     */
    public function toArray()
    {
        $ref = new \ReflectionObject($this);
        $export = array();

        foreach ($ref->getProperties() as $property) {
            $property->setAccessible(true);
            $name = strtolower(
                preg_replace('@([A-Z])@', '_\1', $property->getName())
            );
            $export[$name] = $property->getValue($this);

            if ($export[$name] instanceof self) {
                $export[$name] = $export[$name]->toArray();
            }

            if ($export[$name] instanceof \DateTime) {
                $export[$name] = $export[$name]->format('Y-m-d');
            }
        }

        return $export;
    }

    /**
     * ToArray with unset null fields
     *
     * @return array
     */
    public function toCleanArray()
    {
        $export = $this->toArray();

        $cleanExport = array();
        foreach ($export as $key => $value) {
            if ($value) {
                $cleanExport[$key] = $value;
            }
        }

        return $cleanExport;
    }

    /**
     * Extract dataWrapper $property value from $data
     *
     * @param array $data
     * @param string $property
     * @return
     */
    private function getValue(array $data, $property)
    {
        if (isset($data[$property])) {
            return $data[$property];
        }

        $property = strtolower(preg_replace('@([A-Z])@', '_\1', $property));
        if (isset($data[$property])) {
            return $data[$property];
        }

        throw new \OutOfBoundsException('');
    }

    /**
     * Convert from undescore to camel case
     *
     * @param string $name
     * @return void
     */
    private function toCamelCase($name)
    {
        return lcfirst(
            str_replace(' ', '', ucwords(str_replace('_', ' ', $name)))
        );
    }

    /**
     * Convert from undescore to studly caps
     *
     * @param string $name
     * @return void
     */
    private function toStudlyCaps($name)
    {
        return ucfirst($this->toCamelCase($name));
    }

    /**
     * @param string $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        $property = $this->toStudlyCaps($offset);
        return call_user_func(array($this, 'get' . $property));
    }

    /**
     * @param string $offset
     * @param mixed $value
     * @return mixed
     */
    public function offsetSet($offset, $value)
    {
        $property = $this->toStudlyCaps($offset);
        return call_user_func(array($this, 'set' . $property), $value);
    }

    /**
     * @param string
     * @return mixed
     */
    public function offsetExists($offset)
    {
        $property = $this->toCamelCase($offset);
        return (new \ReflectionObject($this))->hasProperty($property);
    }

    /**
     * @param string offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        $this->offsetSet($offset, null);
    }

    /**
     * @param \ReflectionProperty $property
     * @return bool
     */
    public function isCollection(\ReflectionProperty $property)
    {
        return false !== stripos($this->findType($property), 'Collection');
    }

    /**
     * @param mixed $value
     * @param \ReflectionProperty $property
     * @return BaseCollection
     */
    public function toCollection($value, \ReflectionProperty $property)
    {
        $type = $this->findType($property);
        return new $type($value);
    }

    /**
     * @param \ReflectionProperty $property
     * @return string
     */
    private function findType(\ReflectionProperty $property)
    {
        $class      = $property->getDeclaringClass();
        $doc        = $class->getDocComment();
        $getter     = 'get' . $this->toStudlyCaps($property->getName());
        $regex      = "#@method (.+?) #";

        foreach (explode(PHP_EOL, $doc) as $commentLine) {
            if (false !== strpos($commentLine, $getter)) {
                preg_match($regex, $commentLine, $matches);
                if (isset($matches[1])) {
                    return $matches[1];
                }
            }
        }
    }
}
