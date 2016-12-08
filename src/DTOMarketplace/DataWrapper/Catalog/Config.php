<?php

namespace GFG\DTOMarketplace\DataWrapper\Catalog;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getSku()
 * @method string getPartnerSku()
 * @method string getName()
 * @method string getDescription()
 * @method string getBrand()
 * @method float getPrice()
 * @method float getSpecialPrice()
 * @method string getSpecialFromDate()
 * @method string getSpecialToDate()
 * @method array getAttributes()
 * @method string getAttributeSet()
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\ImageCollection getImageCollection()
 * @method string getStatus()
 * @method string getShipmentType()
 * @method string getSupplierDeliveryTime()
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\SimpleCollection getSimpleCollection()
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setSku(string $sku)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setPartnerSku(string $partnerSKu)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setName(string $name)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setDescription(string $description)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setBrand(string $brand)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setPrice(float $price)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setSpecialPrice(float $specialPrice)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setSpecialFromDate(string $specialFromDate)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setSpecialToDate(string $specialToDate)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setAttributes(array $attributes)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setAttributeSet(string $attributeSet)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setImageCollection(\GFG\DTOMarketplace\DataWrapper\Catalog\ImageCollection $imageCollection)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setSimpleCollection(\GFG\DTOMarketplace\DataWrapper\Catalog\SimpleCollection $simpleCollection)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setStatus(string $status)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setShipmentType(string $shipmentType)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Config setSupplierDeliveryTime(string $supplierDeliveryTime)
 */
class Config extends Base
{
    private $sku;
    private $partnerSku;
    private $name;
    private $description;
    private $brand;
    private $price;
    private $specialPrice;
    private $specialFromDate;
    private $specialToDate;
    private $attributes;
    private $attributeSet;
    private $imageCollection;
    private $simpleCollection;
    private $status;
    private $shipmentType;
    private $supplierDeliveryTime;
}
