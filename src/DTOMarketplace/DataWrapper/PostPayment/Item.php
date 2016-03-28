<?php

namespace GFG\DTOMarketplace\DataWrapper\PostPayment;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getReason()
 * @method string getReasonDetail()
 * @method string getDeliveryType()
 * @method string getTrackingCode()
 * @method string getTrackingUrl()
 * @method string getNfeKey()
 * @method integer getVentureOrderItemId()
 * @method integer getOrderItemId()
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setReason(string $reason)
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setReasonDetail(string $reasonDetail)
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setDeliveryType(string $deliveryType)
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setShippingProvider(string $shippingProvider)
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setTrackingCode(string $trackingCode)
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setTrackingUrl(string $trackingUrl)
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setNfeKey(string $nfeKey)
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setVentureOrderItemId(integer $ventureOrderItemId)
 * @method \GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment setOrderItemId(integer $orderItemId)
 */
class Item extends Base
{
    private $trackingCode;
    private $trackingUrl;
    private $nfeKey;
    private $deliveryType;
    private $shippingProvider;
    private $ventureOrderItemId;
    private $orderItemId;
    private $reason;
    private $reasonDetail;
}
