<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

class DeliveredTest extends \PHPUnit_Framework_TestCase
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

        $this->context = new Delivered($this->dw);
    } 

    public function testExportContextData()
    {
        $hash         = 'hash';
        $info         = null;
        $orderNr      = 1234;
        $orderItemId  = 4321;
        $exportedData = [
            'name' => 'iris.context.partner.postpayment.delivered',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'venture_order_number' => $ventureOrderNumber,
                'partner_code'        => $partnerCode,
                'venture_order_item_id' => $ventureOrderItemId
            ]
        ];

        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->dw->method('getOrderItemNr')->willReturn($orderItemId);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
