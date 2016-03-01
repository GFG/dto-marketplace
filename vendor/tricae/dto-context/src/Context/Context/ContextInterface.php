<?php

namespace Context\Context;

use Context\DataWrapper;

interface ContextInterface
{
    /**
     * Get the context name
     *
     * @return string
     */
    public function getName();

    /**
     * Get the datawrapper from the context
     *
     * @return DataWrapper\DataWrapperInterface
     */
    public function getDataWrapper();

    /**
     * Get hash information
     *
     * @return string
     */
    public function getHash();
    
    /**
     * Set hash information
     *
     * @param string $hash
     * @return ContextInterface
     */
    public function setHash($hash);

    /**
     * Get all data that is relevant to this specific context
     *
     * @return array
     */
    public function exportContextData();
}
