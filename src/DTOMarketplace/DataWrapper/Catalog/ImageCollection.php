<?php

namespace DTOMarketplace\DataWrapper\Catalog;

use Context\DataWrapper\BaseCollection;

class ImageCollection extends BaseCollection
{
    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'DTOMarketplace\DataWrapper\Catalog\Image';
    }
}
