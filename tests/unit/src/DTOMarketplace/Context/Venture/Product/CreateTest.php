<?php

namespace DTOMarketplace\Context\Venture\Product;

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

    public function testGetUrlParts()
    {
        $this->assertSame('post', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $simple           = Mock::mock(
            'DTOMarketplace\DataWrapper\Catalog\Simple',
            $this
        );
        $image            = Mock::mock(
            'DTOMarketplace\DataWrapper\Catalog\Image',
            $this
        );

        //data
        $info             = null;

        //config
        $sku             = 'sku config';
        $skuSimple       = 'sku simple';
        $name            = 'name';
        $description     = 'description';
        $brand           = 'brand'; 
        $price           = 100.00;
        $quantity        = 1;
        $ean             = 'ean';
        $url             = 'http://site.com/image.jpg';
        $position        = 1;
        $variation       = 'variation';
        $specialPrice    = 50.00;
        $specialFromDate = '2015-01-01';
        $specialToDate   = '2015-02-01';
        $attributes      = ['attribute1' => 'Attribute'];

        $partnerSku      = 'partner sku';
        $variation       = 'variation';
        $quantity        = 2;
        $ean             = 'ean';

        $attributeSet    = 2;
        $imageCollection  = [
            [
                'url'      => $url,
                'position' => $position
            ]
        ];
        $simpleCollection = [
            [
                'partner_sku' => $partnerSku,
                'variation'   => $variation,
                'quantity'    => $quantity,
                'ean'         => $ean,
                'attributes'  => null
            ]
        ]; 


        //simple
        $exportedData     = [
            'name' => 'dtomarketplace.context.venture.product.create',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'sku'               => $sku,
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
        $this->dw->method('getbrand')->willReturn($brand);
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
