<?php

namespace GFG\DTOMarketplace\DataWrapper\Order;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getSku()
 * @method integer getId()
 * @method integer getVentureId()
 * @method bool getStatus()
 * @method float getPrice()
 * @method string getReason()
 * @method string getReasonDetail()
 * @method string getShipmentType()
 * @method string getSupplierDeliveryTime()
 * @method string getSellerId()
 * @method string getSkuSupplier()
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Item setSku(string $sku)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Item setId(integer $idSalesOrderItem)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Item setStatus(bool $status)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Item setPrice(float $price)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Item setReason(string $price)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Item setReasonDetail(string $price)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Item setShipmentType(string $shipmentType)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Item setSupplierDeliveryTime(string $supplierDeliveryTime)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Item setSellerId(string $sellerId)
 * @method \GFG\DTOMarketplace\DataWrapper\Order\Item setSkuSupplier(string $skuSupplier)
 */
class Item extends Base
{
    private $id;
    private $ventureId;
    private $sku;
    private $price;
    private $status;
    private $reason;
    private $reasonDetail;
    private $shipmentType;
    private $supplierDeliveryTime;
    private $sellerId;
    private $skuSupplier;
}
