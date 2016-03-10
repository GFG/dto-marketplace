<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

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

    public function testExportContextData()
    {
        $item               = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\Item', 
            $this
        );
        $hash               = 'hash';
        $info               = null;
        $orderNr = 1234;
        $orderItemId = 321;
        $exportedData       = [
            'name' => 'dtomarketplace.context.partner.postpayment.deliver',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'order_nr'  => $orderNr,
                'item_collection' => [[
                    'order_item_id' => $orderItemId
                ]]
            ]
        ];

        $item->method('getOrderItemId')->willReturn($orderItemId);

        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->dw->method('getItemCollection')->willReturn([$item]);

        $this->assertSame($exportedData, $this->context->exportContextData());

    }

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }
}
