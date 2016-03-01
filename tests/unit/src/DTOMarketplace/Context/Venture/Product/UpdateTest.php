<?php

namespace DTOMarketplace\Context\Venture\Product;

class UpdateTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('Context\DataWrapper\DataWrapperInterface')
            ->setMethods([
                'getSkuConfig',       
                'getSimpleCollection',    
                'getName',     
                'getDescription',
                'getBrand',       
                'getAttributes',
                'getAttributeSet',   
                'getStatus',      
                'toArray'
            ])
            ->getMock();

        $this->context = new Update($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $info             = null;
        $skuConfig        = 'sku config';
        $simpleCollection = [];
        $name             = 'Product name';
        $description      = 'Description';
        $brand            = 'Brand';
        $attributes       = ['attribute 1' => 1];
        $attributeSet     = 2;
        $status           = 'active'; 
        $exportedData     = [
            'name' => 'iris.context.venture.product.update',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'sku_config'        => $skuConfig,
                'simple_collection' => $simpleCollection,
                'name'              => $name,
                'description'       => $description,
                'brand'             => $brand,
                'attributes'        => $attributes,
                'attribute_set'     => $attributeSet,
                'status'            => $status
            ]
        ];

        $this->dw
            ->expects($this->once())
            ->method('getSkuConfig')
            ->willReturn($skuConfig);

        $this->dw
            ->expects($this->once())
            ->method('getSimpleCollection')
            ->willReturn($simpleCollection);

        $this->dw
            ->expects($this->once())
            ->method('getName')
            ->willReturn($name);

        $this->dw
            ->expects($this->once())
            ->method('getDescription')
            ->willReturn($description);

        $this->dw
            ->expects($this->once())
            ->method('getBrand')
            ->willReturn($brand);

        $this->dw
            ->expects($this->once())
            ->method('getAttributes')
            ->willReturn($attributes);

        $this->dw
            ->expects($this->once())
            ->method('getAttributeSet')
            ->willReturn($attributeSet);

        $this->dw
            ->expects($this->once())
            ->method('getStatus')
            ->willReturn($status);

        $this->assertSame(
            $exportedData,
            $this->context->exportContextData()
        );
    }
}
