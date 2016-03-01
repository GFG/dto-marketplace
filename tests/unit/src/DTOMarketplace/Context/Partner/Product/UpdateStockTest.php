<?php

namespace DTOMarketplace\Context\Partner\Product;

use DTOMarketplace\DataWrapper\Mock as t;

class UpdateStockTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = t::mock('Context\DataWrapper\DataWrapperInterface');
        $this->context = new UpdateStock($this->dw);
    } 

    public function testExportContextData()
    {
        $simple = t::mock('DTOMarketplace\DataWrapper\Catalog\Simple');

        $info             = null;
        $partnerSku       = 'partner sku';
        $simplePartnerSku = 'simple partner sku';
        $quantity         = 1;
        $exportedData = [
            'name' => 'iris.context.partner.product.updatestock',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'partner_sku' => $skuSimple,
                'simple_collection' => [
                    'partner_sku' => $simplePartnerSku,
                    'quantity'    => $quantity
                ]
            ]
        ];


        $simple->method('getPartnerSku')->willReturn($simplePartnerSku);
        $simple->method('getQuantity')->willReturn($quantity);

        $this->dw->method('getPartnerSku')->willReturn($skuSimple);
        $this->dw->method('getSimpleCollection')->willReturn([$simple]);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
