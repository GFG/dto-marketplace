<?php

namespace DTOMarketplace\Context\Venture\Product;

class UpdatePriceTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('Context\DataWrapper\DataWrapperInterface')
            ->setMethods([
                'getSkuConfig',       
                'getPrice',       
                'getSpecialPrice',       
                'getSpecialFromDate',       
                'getSpecialToDate',       
                'getSimpleCollection',       
                'toArray'
            ])
            ->getMock();

        $this->context = new UpdatePrice($this->dw);
    } 

     public function testGetHttpMethod()
     {
         $this->assertSame('put', $this->context->getHttpMethod());
     }

    public function testExportContextData()
    {
        $info             = null;
        $skuConfig        = 'sku config';
        $price            = 100.00;
        $specialPrice     = 50.00;
        $specialFromDate  = '2016-01-01 00:00:01';
        $specialToDate    = '2016-02-01 00:00:01';
        $simpleCollection = [];
        $exportedData = [
            'name' => 'iris.context.venture.product.updateprice',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'sku_config'        => $skuConfig,
                'price'             => $price,
                'special_price'      => $specialPrice,
                'special_from_date' => $specialFromDate,
                'special_to_date'   => $specialToDate,
                'simple_collection' => $simpleCollection,
            ]
        ];

        $this->dw
            ->expects($this->once())
            ->method('getSkuConfig')
            ->willReturn($skuConfig);

        $this->dw
            ->expects($this->once())
            ->method('getPrice')
            ->willReturn($price);

        $this->dw
            ->expects($this->once())
            ->method('getSpecialPrice')
            ->willReturn($specialPrice);

        $this->dw
            ->expects($this->once())
            ->method('getSpecialFromDate')
            ->willReturn($specialFromDate);

        $this->dw
            ->expects($this->once())
            ->method('getSpecialToDate')
            ->willReturn($specialToDate);

        $this->dw
            ->expects($this->once())
            ->method('getSimpleCollection')
            ->willReturn($simpleCollection);

        $this->assertSame(
            $exportedData,
            $this->context->exportContextData()
        );
    }
}
