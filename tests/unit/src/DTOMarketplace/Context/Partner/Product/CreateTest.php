<?php

namespace DTOMarketplace\Context\Partner\Product;

use Context\DataWrapper\Mock;

class CreateTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::mock(
            'DTOMarketplace\DataWrapper\Catalog\Config', 
            $this
        );
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
        $specialFromDate  = '2001-01-01';
        $specialToDate    = '2010-01-01';
        $attributes       = [];
        $attributeSet     = 1;
        $images           = [];
        $url              = 'http://site.com/url';
        $position         = 1;
        $simpleCollection = [
            [
                'partner_sku' => $skuSimple,
                'variation' => $variation,
                'quantity' => $quantity,
                'ean' => $ean,
            ]
        ]; 
        $imageCollection = [
            [
            'url'      => $url,
            'position' => $position
            ]
        ];
        $status           = 'active';

        $simple = Mock::mock(
            'DTOMarketplace\DataWrapper\Catalog\Simple',
            $this
        );

        $image = Mock::mock(
            'DTOMarketplace\DataWrapper\Catalog\Image',
            $this
        );

        $image->method('getUrl')->willReturn($url);
        $image->method('getPosition')->willReturn($position);

        $simple->method('getPartnerSku')->willReturn($skuSimple);
        $simple->method('getVariation')->willReturn($variation);
        $simple->method('getQuantity')->willReturn($quantity);
        $simple->method('getEan')->willReturn($ean);
                             
        $exportedData     = [
            'name' => 'dtomarketplace.context.partner.product.create',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'sku'               => $skuConfig,
                'name'              => $name,
                'description'       => $description,
                'brand'             => $brand,
                'price'             => $price,
                'special_price'     => $specialPrice,
                'special_from_date' => $specialFromDate,
                'special_to_date'   => $specialToDate,
                'attributes'        => $attributes,
                'attribute_set'     => $attributeSet,
                'image_collection'  => $imageCollection,
                'simple_collection' => $simpleCollection,
            ]
        ];

        $this->dw->method('getSku')->willReturn($skuConfig);
        $this->dw->method('getName')->willReturn($name);
        $this->dw->method('getDescription')->willReturn($description);
        $this->dw->method('getBrand')->willReturn($brand);
        $this->dw->method('getPrice')->willReturn($price);
        $this->dw->method('getSpecialPrice')->willReturn($specialPrice);
        $this->dw->method('getSpecialFromDate')->willReturn($specialFromDate);
        $this->dw->method('getSpecialToDate')->willReturn($specialToDate);
        $this->dw->method('getAttributes')->willReturn($attributes);
        $this->dw->method('getAttributeSet')->willReturn($attributeSet);
        $this->dw->method('getImageCollection')->willReturn([$image]);
        $this->dw->method('getSimpleCollection')->willReturn([$simple]);
        $this->dw->method('getStatus')->willReturn($status);

        $this->assertSame($exportedData,$this->context->exportContextData());
    }

    public function testGetHttpMethod()
    {
        $this->assertSame('post', $this->context->getHttpMethod());
    }
}
