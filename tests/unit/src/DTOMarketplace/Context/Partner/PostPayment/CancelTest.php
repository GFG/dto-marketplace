<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

class CancelTest extends \PHPUnit_Framework_TestCase
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

        $this->context = new Cancel($this->dw);
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
            'name' => 'dtomarketplace.context.partner.postpayment.cancel',
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

        $export = $this->context->exportContextData();
        unset($export['data_wrapper']);
        $this->assertSame($exportedData, $export);
    }
}
