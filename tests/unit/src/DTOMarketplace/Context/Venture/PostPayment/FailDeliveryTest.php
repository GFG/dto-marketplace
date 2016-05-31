<?php

namespace GFG\DTOMarketplace\Context\Venture\PostPayment;

use GFG\DTOContext\DataWrapper\Mock;

class FailDeliveryTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw      = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment', 
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
        $item               = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\PostPayment\Item', 
            $this
        );
        $info               = [];
        $ventureOrderNumber = 1234;
        $ventureOrderItemId = 321;
        $reason             = 'Reason';
        $reasonDetail       = 'Reason detail';

        $exportedData       = [
            'name' => 'gfg.dtomarketplace.context.venture.postpayment.faildelivery',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'venture_order_nr'  => $ventureOrderNumber,
                'order_nr' => null,
                'item_collection' => [[
                    'reason'                => $reason,
                    'reason_detail'         => $reasonDetail,
                    'venture_order_item_id' => $ventureOrderItemId,
                    'order_item_id' => null
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
