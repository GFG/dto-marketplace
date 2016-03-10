<?php

namespace DTOMarketplace\Context;

use Context\Context\Base;

abstract class BaseInContext extends Base
{
    /**
     * Verify if the method that is received is the same as the context needs to be
     *
     * @return void
     */
    public function isValidMethod()
    {
        return ($this->getHttpMethod() === $_SERVER['REQUEST_METHOD']);
    }

    /**
     * Get the http method specific for the context
     *
     * @return string
     */
    abstract public function getHttpMethod();
}
