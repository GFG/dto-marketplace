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
                'getSku',       
                'getPrice',       
                'getSpecialPrice',       
                'getSpecialFromDate',       
                'getSpecialToDate',       
                'getSimpleCollection',       
                'toArray'
            ])
            ->getMock();

        $this->dwSimple = $this->getMockBuilder('Context\DataWrapper\DataWrapperInterface')
            ->setMethods([
                'getSku',
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
        $skuSimple        = 'sku simple';
        $price            = 100.00;
        $specialPrice     = 50.00;
        $specialFromDate  = '2016-01-01 00:00:01';
        $specialToDate    = '2016-02-01 00:00:01';
        $simpleCollection = ['sku' => $skuSimple];
        $exportedData = [
            'name' => 'dtomarketplace.context.venture.product.updateprice',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'sku'               => $skuConfig,
                'price'             => $price,
                'special_price'     => $specialPrice,
                'special_from_date' => $specialFromDate,
                'special_to_date'   => $specialToDate,
                'simple_collection' => [$simpleCollection]
            ]
        ];

        $this->dw
            ->expects($this->once())
            ->method('getSku')
            ->willReturn($skuConfig);

        $this->dwSimple
            ->expects($this->once())
            ->method('getSku')
            ->willReturn($skuSimple);

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
            ->willReturn([$this->dwSimple]);

        $export = $this->context->exportContextData();
        unset($export['data_wrapper']);

        $this->assertEquals(
            $exportedData,
            $export
        );
    }
}
