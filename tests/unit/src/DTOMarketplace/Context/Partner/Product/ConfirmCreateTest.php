<?php

namespace DTOMarketplace\Context\Partner\Product;

class ConfirmCreateTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('Context\DataWrapper\DataWrapperInterface')
            ->setMethods([
                'getSkuConfig',
                'getSimpleCollection',
                'toArray'])
            ->getMock();

        $this->context = new ConfirmCreate($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $hash      = 'hash';
        $info      = null;
        $skuConfig = 'sku config';
        $simpleSku = 'simple sku';
        $simple    = $this->getMockBuilder('DTOMarketplace\DataWrapper\Catalog\Simple')
            ->setMethods(['getSkuSimple'])
            ->getMock();

        $simple->method('getSkuSimple')->willReturn($simpleSku);

        $this->dw->method('getSimpleCollection')->willReturn([$simple]);
        $this->dw->method('getSkuConfig')->willReturn($skuConfig);

        $exportedData     = [
            'name' => 'iris.context.partner.product.confirmcreate',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'sku_config'        => $skuConfig,
                'simple_collection' => [
                    [
                        'sku_simple' => $simpleSku
                    ]
                ]
            ]
        ];

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
