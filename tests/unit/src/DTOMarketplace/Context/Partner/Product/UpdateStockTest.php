<?php

namespace DTOMarketplace\Context\Partner\Product;

use Context\DataWrapper\Mock;

class UpdateStockTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::mock(
            'DTOMarketplace\DataWrapper\Catalog\Config',
            $this
        );
        $this->context = new UpdateStock($this->dw);
    } 

    public function testExportContextData()
    {
        $simple           = Mock::mock(
            'DTOMarketplace\DataWrapper\Catalog\Simple', 
            $this
        );

        $info             = null;
        $partnerSku       = 'partner sku';
        $simplePartnerSku = 'simple partner sku';
        $quantity         = 1;
        $exportedData = [
            'name' => 'dtomarketplace.context.partner.product.updatestock',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'partner_sku' => $partnerSku,
                'simple_collection' => [
                    [
                    'partner_sku' => $simplePartnerSku,
                    'quantity'    => $quantity
                    ]
                ]
            ]
        ];


        $simple->method('getPartnerSku')->willReturn($simplePartnerSku);
        $simple->method('getQuantity')->willReturn($quantity);

        $this->dw->method('getPartnerSku')->willReturn($partnerSku);
        $this->dw->method('getSimpleCollection')->willReturn([$simple]);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }
}
