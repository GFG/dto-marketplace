<?php

namespace GFG\DTOMarketplace\DataWrapper\Order;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getOrderNr()
 * @method string getBobOrderId()
 * @method string getVentureOrderNr()
 * @method \GFG\DTOMarketplace\DataWrapper\Customer getCustomer()
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Address getShippingAddress()
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Address getBillingAddress()
 * @method \GFG\DTOMarketplace\DataWrapper\Order\ItemCollection getItemCollection()
 * @method float getFreightCost()
 * @method string getStatus()
 * @method string getReason()
 * @method string getReasonDetail()
 * @method string getPaymentMethod()
 * @method string getVoucherCode()
 * @method string getGiftOption()
 * @method string getGiftMessage()
 * @method string getCreatedAt()
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setOrderNr(string $orderNr)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setBobOrderId(string $bobOrderId)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setVentureOrderNr(string $ventureOrderNr)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setCustomer(\GFG\DTOMarketplace\DataWrapper\Customer $customer)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setShippingAddress(\GFG\DTOMarketplace\DataWrapper\Order\Address $shippingAddress)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setBillingAddress(\GFG\DTOMarketplace\DataWrapper\Order\Address $billingAddress)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setItemCollection(\GFG\DTOMarketplace\DataWrapper\Order\ItemCollection $itemCollection)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setFreightCost(float $freightCost)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setStatus(string $status)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setReason(string $reason)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setReasonDetail(string $reasonDetail)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setPaymentMethod(string $paymentMethod)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setVoucherCode(string $voucherCode)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setGiftOption(string $giftOption)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setGiftMessage(string $giftMessage)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Order setCreatedAt(string $createdAt)
 */
class Order extends Base
{
    private $orderNr;
    private $bobOrderId;
    private $ventureOrderNr;
    private $customer;
    private $billingAddress;
    private $shippingAddress;
    private $itemCollection;
    private $freightCost;
    private $status;
    private $reason;
    private $reasonDetail;
    private $paymentMethod;
    private $voucherCode;
    private $giftOption;
    private $giftMessage;
    private $createdAt;
}
