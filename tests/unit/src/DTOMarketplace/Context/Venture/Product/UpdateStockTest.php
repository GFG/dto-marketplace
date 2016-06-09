<?php

namespace GFG\DTOMarketplace\Context\Venture\Product;

use GFG\DTOContext\DataWrapper\Mock;

class UpdateStockTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Catalog\Config', 
            $this
        );
        $this->dwSimple = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Catalog\Simple',
            $this
        );

        $this->context = new UpdateStock($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $info         = [];
        $skuSimple    = 'sku simple';
        $quantity     = 1;
        $exportedData = [
            'name' => 'gfg.dtomarketplace.context.venture.product.updatestock',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'sku' => 'sku config',
                'partner_sku' => null,
                'simple_collection' => [[
                    'sku' => $skuSimple,
                    'partner_sku' => null,
                    'quantity'   => $quantity
                ]]
            ]
        ];

        $this->dwSimple->method('getSku')->willReturn($skuSimple);
        $this->dwSimple->method('getQuantity')->willReturn($quantity);

        $this->dw->method('getSku')->willReturn('sku config'); 
        $this->dw->method('getSimpleCollection')->willReturn([$this->dwSimple]);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
