<?php

namespace Context\DataWrapper;

abstract class BaseCollection extends \ArrayObject implements DataWrapperInterface
{

    /**
     * @param array $collection
     *
     * If not items of this collection already, it creates it!
     */
    public function __construct(array $collection = array())
    {
        $type = $this->getType();

        foreach ($collection as &$item) {
            if (!is_object($item)) {
                $item = new $type($item);
            }
        }

        parent::__construct($collection);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $return = [];
        foreach ($this as $key => $value) {
            $return[$key] = $value->toArray();
        }

        return $return;
    }

    /**
     * @return string Must return the class of this collection items
     */
    abstract protected function getType();
}
