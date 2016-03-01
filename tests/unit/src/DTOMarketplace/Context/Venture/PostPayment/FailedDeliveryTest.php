<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

use DTOMarketplace\DataWrapper\Mock as t;

class FailedDeliveryTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw      = t::mock('DTOMarketplace\DataWrapper\PostPayment\PostPayment');
        $this->context = new FailedDelivery($this->dw);
    } 

    public function testGetUrlParts()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $info               = null;
        $ventureOrderNumber = 1234;
        $ventureOrderItemId = 321;
        $reason             = 'Reason';
        $reasonDetail       = 'Reason detail';

        $exportedData       = [
            'name' => 'iris.context.venture.postpayment.faileddelivery',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'venture_order_number'  => $ventureOrderNumber,
                'venture_order_item_id' => $ventureOrderItemId,
                'reason'                => $reason,
                'reason_detail'         => $reasonDetail
            ]
        ];

        $this->dw->method('getReason')->willReturn($reason);
        $this->dw->method('getReasonDetail')->willReturn($reasonDetail);
        $this->dw->method('getVentureOrderNumber')->willReturn($ventureOrderNumber);
        $this->dw->method('getVentureOrderItemId')->willReturn($ventureOrderItemId);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
