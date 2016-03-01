<?php

namespace DTOMarketplace\DataWrapper\PostPayment;

use Context\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getReason()
 * @method string getReasonDetail()
 * @method string getDeliveryType()
 * @method string getTrackingCode()
 * @method string getTrackingUrl()
 * @method string getNfeKey()
 * @method integer getVentureOrderNr()
 * @method integer getOrderNr()
 * @method integer getVentureOrderItemId()
 * @method integer getOrderItemId()
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setReason(string $reason)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setReasonDetail(string $reasonDetail)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setDeliveryType(string $deliveryType)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setShippingProvider(string $shippingProvider)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setTrackingCode(string $trackingCode)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setTrackingUrl(string $trackingUrl)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setNfeKey(string $nfeKey)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setVentureOrderNr(integer $ventureOrderNr)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setOrderNr(integer $orderNr)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setVentureOrderItemId(integer $ventureOrderItemId)
 * @method \DTOMarketplace\DataWrapper\PostPayment\PostPayment setOrderItemId(integer $orderItemId)
 */
class PostPayment extends Base
{
    private $trackingCode;
    private $trackingUrl;
    private $nfeKey;
    private $deliveryType;
    private $shippingProvider;
    private $ventureOrderNr;
    private $orderNr;
    private $ventureOrderItemId;
    private $orderItemId;
    private $reason;
    private $reasonDetail;
}
