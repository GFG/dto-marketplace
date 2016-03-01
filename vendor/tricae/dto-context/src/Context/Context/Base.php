<?php

namespace Context\Context;

use Context\DataWrapper;

class Base implements ContextInterface
{
    /**
     * Meaninful information about the context
     *
     * @var array
     */
    protected $info;

    /**
     * Context name
     *
     * @var string
     */
    protected $name;

    /**
     * Hash to identify an operation using this context
     *
     * @var string
     */
    protected $hash;
    
    /**
     * DataWrapper
     *
     * @var DataWrapper\DataWrapperInterface
     */
    protected $dataWrapper;

    /**
     * @param string $contextName
     * @param \DataWrapper\DataWrapperInterface $dataWrapper
     */
    public function __construct(DataWrapper\DataWrapperInterface $dataWrapper)
    {
        $this->setDataWrapper($dataWrapper);
    }

    /**
     * Magic method to add additional meaninful information about the context
     *
     * @param string $method
     * @param array $arguments
     * @return mixed
     */
    public function __call($method, array $arguments)
    {
        $action = substr($method, 0, 3);

        if (in_array($action, ['get', 'set'])) {

            $property = substr($method, 3);

            switch ($action) {
                case 'get':
                    $return = (isset($this->info[$property]))?
                        $this->info[$property] : null;
                    break;
                
                case 'set':
                    $this->info[$property] = current($arguments);
                    $return = $this;
                    break;
            }

            return $return;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getDataWrapper()
    {
        return $this->dataWrapper;
    }

    /**
     * {@inheritdoc}
     */
    public function setDataWrapper(DataWrapper\DataWrapperInterface $dataWrapper)
    {
        $this->dataWrapper = $dataWrapper;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getHash()
    {
        if (!$this->hash) {
            $this->hash = $this->generateHash();
        }

        return $this->hash;
    }

    /**
     * {@inheritdoc}
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        if (!$this->name) {
            $this->name = str_replace('\\', '.', strtolower(__CLASS__));
        }

        return $this->name;
    }

    /**
     * @param string $name
     * @return Context\Context\Base
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Generate a unique hash
     *
     * @return string
     */
    protected function generateHash()
    {
        return sha1(uniqid(mt_rand(), true));
    }

    /**
     * Export context data
     *
     * @return void
     * {@inheritdoc}
     */
    public function exportContextData()
    {
        return $this->prepareExport($this->dataWrapper->toArray());
    }

    /**
     * Prepare the info to be exported
     *
     * @param array
     * @return array
     */
    protected function prepareExport($data)
    {
        return [
            'name' => $this->getName(),
            'info' => $this->info,
            'hash' => $this->getHash(),
            'data' => $data
        ];
    }
}
