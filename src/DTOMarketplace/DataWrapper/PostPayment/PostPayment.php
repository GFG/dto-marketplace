<?php

namespace GFG\DTOMarketplace\DataWrapper\PostPayment;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method integer getOrderNr()
 * @method integer getVentureOrderNr()
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\ItemCollection getItemCollection()
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setOrderNr(string $orderNr)
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setVentureOrderNr(string $ventureOrderNr)
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setItemCollection(\GFG\DTOMarketplace\DataWrapper\PostPayment\ItemCollection $itemCollection)
 */
class PostPayment extends Base
{
    private $orderNr;
    private $ventureOrderNr;
    private $itemCollection;
}
