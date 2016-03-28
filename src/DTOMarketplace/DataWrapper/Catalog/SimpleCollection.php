<?php

namespace GFG\DTOMarketplace\DataWrapper\Catalog;

use GFG\DTOContext\DataWrapper\BaseCollection;

class SimpleCollection extends BaseCollection
{
    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'GFG\DTOMarketplace\DataWrapper\Catalog\Simple';
    }
}
