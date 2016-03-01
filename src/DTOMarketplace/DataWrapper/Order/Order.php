<?php

namespace DTOMarketplace\DataWrapper\Order;

use Context\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getOrderNr()
 * @method string getVentureOrderNr()
 * @method \DTOMarketplace\DataWrapper\Customer getCustomer()
 * @method \DTOMarketplace\DataWrapper\Order\Address getShippingAddress()
 * @method \DTOMarketplace\DataWrapper\Order\Address getBillingAddress()
 * @method \DTOMarketplace\DataWrapper\Order\ItemCollection getItemCollection()
 * @method float getFreightCost()
 * @method string getStatus()
 * @method string getReason()
 * @method string getReasonDetail()
 * @method \DTOMarketplace\DataWrapper\Order\Order setOrderNr(string $orderNr)
 * @method \DTOMarketplace\DataWrapper\Order\Order setVentureOrderNr(string $ventureOrderNr)
 * @method \DTOMarketplace\DataWrapper\Order\Order setCustomer(\DTOMarketplace\DataWrapper\Customer $customer)
 * @method \DTOMarketplace\DataWrapper\Order\Order setShippingAddress(\DTOMarketplace\DataWrapper\Order\Address $shippingAddress)
 * @method \DTOMarketplace\DataWrapper\Order\Order setBillingAddress(\DTOMarketplace\DataWrapper\Order\Address $billingAddress)
 * @method \DTOMarketplace\DataWrapper\Order\Order setItemCollection(\DTOMarketplace\DataWrapper\Order\ItemCollection $itemCollection)
 * @method \DTOMarketplace\DataWrapper\Order\Order setFreightCost(float $freightCost)
 * @method \DTOMarketplace\DataWrapper\Order\Order setStatus(string $status)
 * @method \DTOMarketplace\DataWrapper\Order\Order setReason(string $reason)
 * @method \DTOMarketplace\DataWrapper\Order\Order setReasonDetail(string $reasonDetail)
 */
class Order extends Base
{
    private $orderNr;
    private $ventureOrderNr;
    private $customer;
    private $billingAddress;
    private $shippingAddress;
    private $itemCollection;
    private $freightCost;
    private $status;
    private $reason;
    private $reasonDetail;
}
