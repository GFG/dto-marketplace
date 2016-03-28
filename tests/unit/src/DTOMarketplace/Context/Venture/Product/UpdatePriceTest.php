<?php

namespace GFG\DTOMarketplace\Context\Venture\Product;

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
            'name' => 'gfg.dtomarketplace.context.venture.product.updateprice',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'sku'               => $skuConfig,
                'price'             => $price,
                'special_price'     => $specialPrice,
                'special_from_date' => $specialFromDate,
                'special_to_date'   => $specialToDate,
                'simple_collection' => [$simpleCollection]
            ]
        ];
        $this->dwSimple->method('getSku')->willReturn($skuSimple);

        $this->dw->method('getSku')->willReturn($skuConfig);
        $this->dw->method('getPrice')->willReturn($price);
        $this->dw->method('getSpecialPrice')->willReturn($specialPrice);
        $this->dw->method('getSpecialFromDate')->willReturn($specialFromDate);
        $this->dw->method('getSpecialToDate')->willReturn($specialToDate);
        $this->dw->method('getSimpleCollection')->willReturn([$this->dwSimple]);

        $this->assertEquals($exportedData, $this->context->exportContextData());
    }
}
