<?php

namespace GFG\DTOMarketplace\Context;

use GFG\DTOUrl\Url;
use GFG\DTOContext\Context\Base as BaseContext;

abstract class Base extends BaseContext
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
        $path = array_map(
            'strtolower',
            array_slice(preg_split('@\\\\|_@', static::class), -3)
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
