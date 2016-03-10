<?php

namespace DTOMarketplace\DataWrapper\PostPayment;

use Context\DataWrapper\BaseCollection;

class ItemCollection extends BaseCollection
{
    public function getType()
    {
        return 'DTOMarketplace\DataWrapper\PostPayment\Item';
    }
}
