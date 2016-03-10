<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

use Context\DataWrapper\Mock;

class DeliverTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw      = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\PostPayment', 
            $this
        );
        $this->context = new Deliver($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $item               = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\Item', 
            $this
        );
        $hash               = 'hash';
        $info               = null;
        $ventureOrderNr = 1234;
        $ventureOrderItemId = 321;
        $exportedData       = [
            'name' => 'dtomarketplace.context.venture.postpayment.deliver',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'venture_order_nr'  => $ventureOrderNr,
                'item_collection' => [[
                    'venture_order_item_id' => $ventureOrderItemId
                ]]
            ]
        ];

        $item->method('getVentureOrderItemId')->willReturn($ventureOrderItemId);

        $this->dw->method('getVentureOrderNr')->willReturn($ventureOrderNr);
        $this->dw->method('getItemCollection')->willReturn([$item]);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
