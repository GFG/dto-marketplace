<?php

namespace GFG\DTOMarketplace\Context\Partner\Product;

use GFG\DTOContext\DataWrapper\Mock;

class ConfirmCreateTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Catalog\Config',
            $this
        );
        $this->context = new ConfirmCreate($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $hash       = 'hash';
        $info       = [];
        $sku        = 'sku';
        $partnerSku = 'partner sku';
        $simpleSku  = 'simple sku';
        $partnerSimpleSku  = 'partner simple sku';
        $simple     = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Catalog\Simple', 
            $this
        );

        $simple->method('getSku')->willReturn($simpleSku);
        $simple->method('getPartnerSku')->willReturn($partnerSimpleSku);

        $this->dw->method('getSimpleCollection')->willReturn([$simple]);
        $this->dw->method('getSku')->willReturn($sku);
        $this->dw->method('getPartnerSku')->willReturn($partnerSku);

        $exportedData     = [
            'name' => 'gfg.dtomarketplace.context.partner.product.confirmcreate',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'sku'         => $sku,
                'partner_sku' => $partnerSku,
                'simple_collection' => [
                    [
                        'sku' => $simpleSku,
                        'partner_sku' => $partnerSimpleSku
                    ]
                ]
            ]
        ];

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
