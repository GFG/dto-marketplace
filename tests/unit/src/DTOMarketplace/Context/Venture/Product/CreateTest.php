<?php

namespace DTOMarketplace\Context\Venture\Product;

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

    public function testGetUrlParts()
    {
        $this->assertSame('post', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $simple           = t::mock('DTOMarketplace\DataWrapper\Catalog\Simple', $this);
        $image            = t::mock('DTOMarketplace\DataWrapper\Catalog\Image', $this);

        //data
        $info             = null;

        //config
        $sku             = 'sku config';
        $name            = 'name';
        $description     = 'description';
        $brand           = 'brand'; 
        $price           = 100.00;
        $specialPrice    = 50.00;
        $specialFromDate = '2015-01-01';
        $specialToDate   = '2015-02-01';
        $attributes      = ['attribute1' => 'Attribute'];
        $attributeSet    = 2;

        //image
        $url             = 'http://site.com/image.jpg';
        $position        = 2;

        //simple
        $partnerSku      = 'partner sku';
        $variation       = 'variation';
        $quantity        = 2;
        $ean             = 'ean';

        $exportedData     = [
            'name' => 'dtomarketplace.context.venture.product.create',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'sku_config'        => $sku,
                'simple_collection' => $simpleCollection
            ]
        ];

        $image->method('getUrl')->willReturn($url);
        $image->method('getPosition')->willReturn($position);

        $simple->method('getPartnerSku')->willReturn($partnerSku);
        $simple->method('getVariation')->willReturn($variation);
        $simple->method('getQuantity')->willReturn($quantity);
        $simple->method('getEan')->willReturn($ean);

        $this->dw->method('getSku')->willReturn($sku);
        $this->dw->method('getName')->willReturn($name);
        $this->dw->method('getDescription')->willReturn($description);
        $this->dw->method('getbrand')->willReturn($brandj);
        $this->dw->method('getPrice')->willReturn($price);
        $this->dw->method('getSpecialPrice')->willReturn($specialPrice);
        $this->dw->method('getSpecialFromDate')->willReturn($specialFromDate);
        $this->dw->method('getSpecialToDate')->willReturn($specialToDate);
        $this->dw->method('getAttributes')->willReturn($attributes);
        $this->dw->method('getAttributeSet')->willReturn($attributeSet);
        $this->dw->method('getSimpleCollection')->willReturn([$simple]);
        $this->dw->method('getImageCollection')->willReturn([$image]);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
