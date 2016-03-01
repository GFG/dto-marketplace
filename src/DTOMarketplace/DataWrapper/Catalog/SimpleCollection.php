<?php

namespace DTOMarketplace\DataWrapper\Catalog;

use Context\DataWrapper\BaseCollection;

class SimpleCollection extends BaseCollection
{
    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'DTOMarketplace\DataWrapper\Catalog\Simple';
    }
}
