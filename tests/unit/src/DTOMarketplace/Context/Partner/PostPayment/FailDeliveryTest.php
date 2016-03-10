<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

use Context\DataWrapper\Mock;

class FailDeliveryTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\PostPayment',
            $this
        );
        $this->context = new FailDelivery($this->dw);
    } 

    public function testExportContextData()
    {
        $item               = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\Item', 
            $this
        );
        $info               = null;
        $orderNumber = 1234;
        $orderItemId = 321;
        $reason             = 'Reason';
        $reasonDetail       = 'Reason detail';

        $exportedData       = [
            'name' => 'dtomarketplace.context.partner.postpayment.faildelivery',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'order_nr'  => $orderNumber,
                'item_collection' => [[
                    'reason'        => $reason,
                    'reason_detail' => $reasonDetail,
                    'order_item_id' => $orderItemId,
                ]]
            ]
        ];

        $item->method('getReason')->willReturn($reason);
        $item->method('getReasonDetail')->willReturn($reasonDetail);
        $item->method('getOrderItemId')->willReturn($orderItemId);

        $this->dw->method('getOrderNr')->willReturn($orderNumber);
        $this->dw->method('getItemCollection')->willReturn([$item]);

        $this->assertSame($exportedData, $this->context->exportContextData());

    }

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }
}
