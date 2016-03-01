<?php

namespace Context;

use Context\DataWrapper;
use Context\Factory;

class Manager
{
    /**
     * Factory responsible to create the ContextObject
     *
     * @var Factory\FactoryInterface
     */
    private static $factory;

    /**
     * Get the current factory
     *
     * @return void
     */
    public function getFactory()
    {
        if (!self::$factory) {
            throw new \RuntimeException('Factory not set');
        }

        return self::$factory;
    }
     
    /**
     * Sets a new factory class
     *
     * @param Factory\FactoryInterface
     * @return Context\Manager
     */
    public function setFactory(Factory\FactoryInterface $factory)
    {
        self::$factory = $factory;
        return $this;
    }

    /**
     * Ask the factory to build the context
     *
     * @param mixed $contextName
     * @param DataWrapper\DataWrapperInterface $dataWrapper
     * @return ContextInterface
     */
    public function build(
        $contextName,
        DataWrapper\DataWrapperInterface $dataWrapper
    ) {
         return $this->getFactory()
             ->build($contextName, $dataWrapper);
    }
}
