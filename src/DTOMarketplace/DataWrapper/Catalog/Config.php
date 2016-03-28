<?php

namespace GFG\DTOMarketplace\DataWrapper\Catalog;

use Context\DataWrapper\Base;

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
 * @method \DTOMarketplace\DataWrapper\Catalog\ImageCollection getImageCollection()
 * @method string getStatus()
 * @method \DTOMarketplace\DataWrapper\Catalog\SimpleCollection getSimpleCollection()
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setSku(string $sku)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setPartnerSku(string $partnerSKu)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setName(string $name)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setDescription(string $description)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setBrand(string $brand)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setPrice(float $price)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setSpecialPrice(float $specialPrice)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setSpecialFromDate(string $specialFromDate)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setSpecialToDate(string $specialToDate)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setAttributes(array $attributes)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setAttributeSet(string $attributeSet)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setImageCollection(\DTOMarketplace\DataWrapper\Catalog\ImageCollection $imageCollection)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setSimpleCollection(\DTOMarketplace\DataWrapper\Catalog\SimpleCollection $simpleCollection)
 * @method \DTOMarketplace\DataWrapper\Catalog\Config setStatus(string $status)
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
}
