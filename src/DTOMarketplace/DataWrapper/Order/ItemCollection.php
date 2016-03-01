<?php

namespace DTOMarketplace\DataWrapper\Order;

use Context\DataWrapper\BaseCollection;

class ItemCollection extends BaseCollection
{
    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return  'DTOMarketplace\DataWrapper\Order\Order\Item';
    }
}
