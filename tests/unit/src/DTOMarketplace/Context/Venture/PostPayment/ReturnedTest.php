<?php

namespace GFG\DTOMarketplace\Context\Venture\PostPayment;

use GFG\DTOContext\DataWrapper\Mock;

class ReturnedTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw      = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment', 
            $this
        );
        $this->context = new Returned($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $item               = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\PostPayment\Item', 
            $this
        );
        $hash               = 'hash';
        $info               = [];
        $ventureOrderNr     = 1234;
        $ventureOrderItemId = 321;
        $exportedData       = [
            'name' => 'gfg.dtomarketplace.context.venture.postpayment.returned',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'venture_order_nr'  => $ventureOrderNr,
                'order_nr' => null,
                'item_collection' => [[
                    'venture_order_item_id' => $ventureOrderItemId,
                    'order_item_id' => null
                ]]
            ]
        ];

        $item->method('getVentureOrderItemId')->willReturn($ventureOrderItemId);

        $this->dw->method('getVentureOrderNr')->willReturn($ventureOrderNr);
        $this->dw->method('getItemCollection')->willReturn([$item]);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
