<?php

namespace DTOMarketplace\Context;

use Context\Context\Base;
use Url\Url;

abstract class BaseOutContext extends Base
{
    /**
     * List of Url\Url objects to be executed by the context
     *
     * @var array
     */
    protected $urls;

    /**
     * {@inheritdoc}
     */
    public function getUrls()
    {
        if (!$this->urls) {
            foreach ($this->getUrlParts() as $parts) {
                $this->urls[] = new Url($parts);
            }
        }

        return $this->urls;
    }

    /**
     * Add a new url to the url list
     *
     * @param Url\Url $url
     * @return BaseContext
     */
    public function addUrl(\Url\Url $url)
    {
        $this->urls[] = $url;
        return $this;
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
            ['api', 'version' => 2],
            array_slice(explode('\\', static::class), 2)
        );

        return [['httpMethod' => 'put', 'path' => $paths]];
    }
}
