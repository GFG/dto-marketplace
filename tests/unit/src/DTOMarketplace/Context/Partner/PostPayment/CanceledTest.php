<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

class CanceledTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('Context\DataWrapper\DataWrapperInterface')
            ->setMethods([
                'getOrderNr',
                'getOrderItemId',
                'getReason',
                'getReasonDetail',
                'toArray'])
            ->getMock();

        $this->context = new Canceled($this->dw);
    } 

    public function testExportContextData()
    {
        $hash         = 'hash';
        $info         = null;
        $orderNr      = 1234;
        $orderItemId  = 4321;
        $reason       = 'reason';
        $reasonDetail = 'reason detail';

        $exportedData = [
            'name' => 'iris.context.partner.postpayment.canceled',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'order_nr'      => $orderNr,
                'order_item_id' => $orderItemId,
                'reason'        => $reason,
                'reason_detail' => $reasonDetail
            ]
        ];

        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->dw->method('getOrderItemId')->willReturn($orderItemId);
        $this->dw->method('getReason')->willReturn($reason);
        $this->dw->method('getReasonDetail')->willReturn($reasonDetail);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
