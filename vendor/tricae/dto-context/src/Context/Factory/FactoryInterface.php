<?php

namespace Context\Factory;

use Context\DataWrapper;
use Context\Context;

interface FactoryInterface
{
    /**
     * Build the context
     *
     * @param string $contextName
     * @param DataWrapper\DataWrapperInterface $dataWrapper;
     * @return void
     */
    public function build($contextName, DataWrapper\DataWrapperInterface $dataWrapper);

    /**
     * Overwrite mapped classes
     *
     * @param mixed $contextName
     * @param string $contextClass
     * @return void
     */
    public function overwrite($contextName, $contextClassName);
}
