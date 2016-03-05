<?php

namespace DTOMarketplace\Context\Venture\Product;

class UpdateStockTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('Context\DataWrapper\DataWrapperInterface')
            ->setMethods([
                'getSku',       
                'getSimpleCollection',       
                'toArray'
            ])
            ->getMock();

        $this->dwSimple = $this->getMockBuilder('Context\DataWrapper\DataWrapperInterface')
            ->setMethods([
                'getSku',       
                'getQuantity',       
                'toArray'
            ])
            ->getMock();

        $this->context = new UpdateStock($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $info             = null;
        $skuSimple        = 'sku simple';
        $quantity         = 1;
        $exportedData = [
            'name' => 'dtomarketplace.context.venture.product.updatestock',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'sku' => 'sku config',
                'simple_collection' => [[
                    'sku' => $skuSimple,
                    'quantity'   => $quantity
                ]]
            ]
        ];

        $this->dwSimple
            ->expects($this->once())
            ->method('getSku')
            ->willReturn($skuSimple);

        $this->dwSimple
            ->expects($this->once())
            ->method('getQuantity')
            ->willReturn($quantity);

        $this->dw
            ->expects($this->once())
            ->method('getSku')
            ->willReturn('sku config');

        $this->dw
            ->expects($this->once())
            ->method('getSimpleCollection')
            ->willReturn([$this->dwSimple]);

        $export = $this->context->exportContextData();
        unset($export['data_wrapper']);

        $this->assertSame(
            $exportedData,
            $export
        );
    }
}
