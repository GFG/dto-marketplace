<?php

namespace DTOMarketplace\Context\Partner\Product;

use Context\DataWrapper\Mock;

class UpdateTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::mock(
            'DTOMarketplace\DataWrapper\Catalog\Config', 
            $this
        );

        $this->context = new Update($this->dw);
    } 

    public function testExportContextData()
    {
        //dataWrappers 
        $image            = Mock::mock(
            'DTOMarketplace\DataWrapper\Catalog\Image', 
            $this
        );
        $simple           = Mock::mock(
            'DTOMarketplace\DataWrapper\Catalog\Simple',
            $this
        );

        //data
        $info             = null;

        //config
        $sku              = 'venture sku';
        $partnerSku       = 'sku partner';
        $name             = 'Product name';
        $description      = 'Description';
        $brand            = 'Brand';
        $attributes       = ['attribute 1' => 1];
        $attributeSet     = 2;
        $status           = 'active'; 

        //image
        $url              = 'http://site.com/image.jpg';
        $position         = 1;

        //simple
        $simplePartnerSku = 'simple partner sku'; 
        $variation        = 'variation';
        $ean              = 'ean';

        $exportedData     = [
            'name' => 'dtomarketplace.context.partner.product.update',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'partner_sku'       => $partnerSku,
                'name'              => $name,
                'description'       => $description,
                'brand'             => $brand,
                'attributes'        => $attributes,
                'attribute_set'     => $attributeSet,
                'image_collection'  => [
                    [
                        'url'      => $url,
                        'position' => $position
                    ]
                ],
                'simple_collection' => [
                    [
                        'partner_sku' => $simplePartnerSku,
                        'variation'   => $variation,
                        'ean'         => $ean
                    ]
                ],
                'status'            => $status
            ]
        ];

        $simple->method('getPartnerSku')->willReturn($simplePartnerSku);
        $simple->method('getVariation')->willReturn($variation);
        $simple->method('getEan')->willReturn($ean);

        $image->method('getUrl')->willReturn($url);
        $image->method('getPosition')->willReturn($position);

        $this->dw->method('getPartnerSku')->willReturn($partnerSku);
        $this->dw->method('getName')->willReturn($name);
        $this->dw->method('getDescription')->willReturn($description);
        $this->dw->method('getBrand')->willReturn($brand);
        $this->dw->method('getAttributes')->willReturn($attributes);
        $this->dw->method('getAttributeSet')->willReturn($attributeSet);
        $this->dw->method('getStatus')->willReturn($status);
        $this->dw->method('getImageCollection')->willReturn([$image]);
        $this->dw->method('getSimpleCollection')->willReturn([$simple]);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }
}
