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
                'getSkuSimple',       
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
            'name' => 'iris.context.venture.product.updatestock',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'sku_simple' => $skuSimple,
                'quantity'   => $quantity
            ]
        ];

        $this->dw
            ->expects($this->once())
            ->method('getSkuSimple')
            ->willReturn($skuSimple);

        $this->dw
            ->expects($this->once())
            ->method('getQuantity')
            ->willReturn($quantity);

        $this->assertSame(
            $exportedData,
            $this->context->exportContextData()
        );
    }
}
