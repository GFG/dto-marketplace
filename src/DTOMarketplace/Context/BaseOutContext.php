<?php

namespace DTOMarketplace\Context;

use Context\Context\Base;
use Url\Url;

abstract class BaseOutContext extends Base
{
    /**
     * @var Url\Url
     */
    protected $url;

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        if (!$this->url) {
            $this->url = new Url($this->getUrlParts());
        }

        return $this->url;
    }

    /**
     * Extracts the url information from the current class name and
     * namespace
     *
     * @return array
     */
    protected function getUrlParts()
    {
        $path = array_merge(
            ['api', 'version' => 'v2'],
            array_slice(explode('\\', static::class), 2)
        );

        return ['httpMethod' => $this->getHttpMethod(), 'path' => $path];
    }

    /**
     * Get the http method specific for the context
     *
     * @return string
     */
    abstract public function getHttpMethod();
}
