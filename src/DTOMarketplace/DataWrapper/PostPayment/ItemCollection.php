<?php

namespace GFG\DTOMarketplace\DataWrapper\PostPayment;

use GFG\DTOContext\DataWrapper\BaseCollection;

class ItemCollection extends BaseCollection
{
    public function getType()
    {
        return 'GFG\DTOMarketplace\DataWrapper\PostPayment\Item';
    }
}
