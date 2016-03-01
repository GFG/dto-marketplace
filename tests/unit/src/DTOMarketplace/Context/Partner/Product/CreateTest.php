<?php

namespace DTOMarketplace\Context\Partner\Product;

use DTOMarketplace\DataWrapper\Mock as t;

class CreateTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = t::mock('DTOMarketplace\DataWrapper\Catalog\Config', $this);
        $this->context = new Create($this->dw);
    } 

    public function testExportContextData()
    {
        $info             = null;
        $skuConfig        = 'sku config';
        $skuSimple        = 'sku simple';
        $quantity         = 2;
        $ean              = 'ean';
        $variation        = 'variation';
        $name             = 'Name';
        $description      = 'Description';
        $brand            = 'brand';
        $price            = 100.00;
        $specialPrice     = 50.00;
        $specialFromDate  = 50.00;
        $specialToDate    = 50.00;
        $attributes       = [];
        $attributeSet     = 1;
        $images           = [];
        $simpleCollection = [
            [
                'sku_simple' => $skuSimple,
                'variation' => $variation,
                'quantity' => $quantity,
                'ean' => $ean,
            ]
        ]; 
        $status           = 'active';

        $simple = t::mock('DTOMarketplace\DataWrapper\Catalog\Simple', $this);

        $simple->method('getSkuSimple')->willReturn($skuSimple);
        $simple->method('getVariation')->willReturn($variation);
        $simple->method('getQuantity')->willReturn($quantity);
        $simple->method('getEan')->willReturn($ean);
                             
        $exportedData     = [
            'name' => 'iris.context.partner.product.create',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'sku_config'        => $skuConfig,
                'name'              => $name,
                'description'       => $description,
                'brand'             => $brand,
                'price'             => $price,
                'special_price'     => $specialPrice,
                'special_from_date' => $specialFromDate,
                'special_to_date'   => $specialToDate,
                'attributes'        => $attributes,
                'attribute_set'     => $attributeSet,
                'images'            => $images,
                'simple_collection' => $simpleCollection,
                'status'            => $status
            ]
        ];

        $this->dw->method('getSkuConfig')->willReturn($skuConfig);
        $this->dw->method('getName')->willReturn($name);
        $this->dw->method('getDescription')->willReturn($description);
        $this->dw->method('getBrand')->willReturn($brand);
        $this->dw->method('getPrice')->willReturn($price);
        $this->dw->method('getSpecialPrice')->willReturn($specialPrice);
        $this->dw->method('getSpecialFromDate')->willReturn($specialFromDate);
        $this->dw->method('getSpecialToDate')->willReturn($specialToDate);
        $this->dw->method('getAttributes')->willReturn($attributes);
        $this->dw->method('getAttributeSet')->willReturn($attributeSet);
        $this->dw->method('getImages')->willReturn($images);
        $this->dw->method('getSimpleCollection')->willReturn([$simple]);
        $this->dw->method('getStatus')->willReturn($status);

        $this->assertSame($exportedData,$this->context->exportContextData());
    }
}
