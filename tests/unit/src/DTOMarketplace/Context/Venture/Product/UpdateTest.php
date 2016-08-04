<?php

namespace GFG\DTOMarketplace\Context\Venture\Product;

use GFG\DTOContext\DataWrapper\Mock;

class UpdateTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Catalog\Config', 
            $this
        );
        $this->context = new Update($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {

        //dataWrappers 
        $image            = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Catalog\Image', 
            $this
        );
        $simple           = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Catalog\Simple',
            $this
        );

        //data
        $info             = [];

        //config
        $sku              = 'sku';
        $name             = 'Product name';
        $description      = 'Description';
        $brand            = 'Brand';
        $attributes       = ['attribute 1' => 1];
        $attributeSet     = 2;
        $status           = 'active'; 
        $shipmentType     = '1'; 
        $supplierDeliveryTime = '100'; 

        //image
        $url              = 'http://site.com/image.jpg';
        $position         = 1;

        //simple
        $simpleSku        = 'simple sku'; 
        $variation        = 'variation';
        $ean              = 'ean';

        $exportedData     = [
            'name' => 'gfg.dtomarketplace.context.venture.product.update',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'sku'               => $sku,
                'partner_sku'       => $sku,
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
                        'sku'         => $simpleSku,
                        'partner_sku' => $simpleSku,
                        'variation'   => $variation,
                        'ean'         => $ean,
                        'attributes'  => $attributes
                    ]
                ],
                'status'            => $status,
                'supplier_delivery_time' => $supplierDeliveryTime,
                'shipment_type'     => $shipmentType
            ]
        ];

        $simple->method('getSku')->willReturn($simpleSku);
        $simple->method('getPartnerSku')->willReturn($simpleSku);
        $simple->method('getVariation')->willReturn($variation);
        $simple->method('getEan')->willReturn($ean);
        $simple->method('getAttributes')->willReturn($attributes);

        $image->method('getUrl')->willReturn($url);
        $image->method('getPosition')->willReturn($position);

        $this->dw->method('getSku')->willReturn($sku);
        $this->dw->method('getPartnerSku')->willReturn($sku);
        $this->dw->method('getName')->willReturn($name);
        $this->dw->method('getDescription')->willReturn($description);
        $this->dw->method('getBrand')->willReturn($brand);
        $this->dw->method('getAttributes')->willReturn($attributes);
        $this->dw->method('getAttributeSet')->willReturn($attributeSet);
        $this->dw->method('getStatus')->willReturn($status);
        $this->dw->method('getShipmentType')->willReturn($shipmentType);
        $this->dw->method('getSupplierDeliveryTime')->willReturn($supplierDeliveryTime);
        $this->dw->method('getImageCollection')->willReturn([$image]);
        $this->dw->method('getSimpleCollection')->willReturn([$simple]);

        $this->assertSame($exportedData, $this->context->exportContextData());

    }
}
