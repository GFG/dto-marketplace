<?php

namespace GFG\DTOMarketplace\DataWrapper\Order;

use GFG\DTOContext\DataWrapper\BaseCollection;

class ItemCollection extends BaseCollection
{
    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return  'GFG\DTOMarketplace\DataWrapper\Order\Item';
    }
}
