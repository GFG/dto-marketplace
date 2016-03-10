<?php

namespace DTOMarketplace\DataWrapper\PostPayment;

use Context\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method integer getOrderNr()
 * @method integer getVentureOrderNr()
 * @method \DTOMarketplace\DataWrapper\PostPayment\ItemCollection getItemCollection()
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setOrderNr(string $orderNr)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setVentureOrderNr(string $ventureOrderNr)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setItemCollection(\DTOMarketplace\DataWrapper\PostPayment\ItemCollection $itemCollection)
 */
class PostPayment extends Base
{
    private $orderNr;
    private $ventureOrderNr;
    private $itemCollection;
}
