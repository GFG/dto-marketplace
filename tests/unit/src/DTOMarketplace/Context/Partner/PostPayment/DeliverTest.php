<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

class DeliverTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('Context\DataWrapper\DataWrapperInterface')
            ->setMethods([
                'getOrderNr',
                'getOrderItemId',
                'toArray'])
            ->getMock();

        $this->context = new Deliver($this->dw);
    } 

    public function testExportContextData()
    {
        $hash         = 'hash';
        $info         = null;
        $orderNr      = 1234;
        $orderItemId  = 4321;
        $exportedData = [
            'name' => 'dtomarketplace.context.partner.postpayment.deliver',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'venture_order_nr' => $orderNr,
                'partner_code'        => $partnerCode,
                'venture_order_item_id' => $ventureOrderItemId
            ]
        ];

        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->dw->method('getOrderItemNr')->willReturn($orderItemId);

        $export = $this->context->exportContextData();
        unset($export['data_wrapper']);
        $this->assertSame($exportedData, $export);
    }
}
