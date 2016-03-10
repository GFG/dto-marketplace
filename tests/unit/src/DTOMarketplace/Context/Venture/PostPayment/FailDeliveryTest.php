<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

use Context\DataWrapper\Mock;

class FailDeliveryTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw      = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\PostPayment', 
            $this
        );
        $this->context = new FailDelivery($this->dw);
    } 

    public function testGetUrlParts()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $item               = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\Item', 
            $this
        );
        $info               = null;
        $ventureOrderNumber = 1234;
        $ventureOrderItemId = 321;
        $reason             = 'Reason';
        $reasonDetail       = 'Reason detail';

        $exportedData       = [
            'name' => 'dtomarketplace.context.venture.postpayment.faildelivery',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'venture_order_nr'  => $ventureOrderNumber,
                'item_collection' => [[
                    'reason'                => $reason,
                    'reason_detail'         => $reasonDetail,
                    'venture_order_item_id' => $ventureOrderItemId,
                ]]
            ]
        ];

        $item->method('getReason')->willReturn($reason);
        $item->method('getReasonDetail')->willReturn($reasonDetail);
        $item->method('getVentureOrderItemId')->willReturn($ventureOrderItemId);

        $this->dw->method('getVentureOrderNr')->willReturn($ventureOrderNumber);
        $this->dw->method('getItemCollection')->willReturn([$item]);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
