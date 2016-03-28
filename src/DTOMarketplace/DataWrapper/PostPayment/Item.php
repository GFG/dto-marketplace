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
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setReason(string $reason)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setReasonDetail(string $reasonDetail)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setDeliveryType(string $deliveryType)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setShippingProvider(string $shippingProvider)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setTrackingCode(string $trackingCode)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setTrackingUrl(string $trackingUrl)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setNfeKey(string $nfeKey)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setVentureOrderItemId(integer $ventureOrderItemId)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setOrderItemId(integer $orderItemId)
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
