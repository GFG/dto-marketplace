<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

use Context\DataWrapper\Mock;

class CancelTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\PostPayment',
            $this
        );
        $this->context = new Cancel($this->dw);
    } 

    public function testExportContextData()
    {
        $item               = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\Item', 
            $this
        );
        $hash               = 'hash';
        $info               = null;
        $reason             = 'Reason';
        $reasonDetail       = 'Reason detail';
        $orderNr     = 1234;
        $orderItemId = 321;

        $exportedData       = [
            'name' => 'dtomarketplace.context.partner.postpayment.cancel',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'order_nr' => $orderNr,
                'item_collection' => [[
                    'reason'                => $reason,
                    'reason_detail'         => $reasonDetail,
                    'order_item_id' => $orderItemId,
                ]]
            ]
        ];

        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->dw->method('getItemCollection')->willReturn([$item]);

        $item->method('getReason')->willReturn($reason);
        $item->method('getReasonDetail')->willReturn($reasonDetail);
        $item->method('getOrderItemId')->willReturn($orderItemId);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }
}
