<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

use Context\DataWrapper\Mock;

class CancelTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw      = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\PostPayment', 
            $this
        );
        $this->context = new Cancel($this->dw);
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
        $hash               = 'hash';
        $info               = null;
        $reason             = 'Reason';
        $reasonDetail       = 'Reason detail';
        $ventureOrderNr     = 1234;
        $partnerCode        = 'Partner code';
        $ventureOrderItemId = 321;

        $exportedData       = [
            'name' => 'dtomarketplace.context.venture.postpayment.cancel',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'venture_order_nr' => $ventureOrderNr,
                'item_collection' => [[
                    'reason'                => $reason,
                    'reason_detail'         => $reasonDetail,
                    'venture_order_item_id' => $ventureOrderItemId,
                ]]
            ]
        ];

        $this->dw->method('getVentureOrderNr')->willReturn($ventureOrderNr);
        $this->dw->method('getItemCollection')->willReturn([$item]);

        $item->method('getReason')->willReturn($reason);
        $item->method('getReasonDetail')->willReturn($reasonDetail);
        $item->method('getVentureOrderItemId')->willReturn($ventureOrderItemId);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
