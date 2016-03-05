<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

use DTOMarketplace\DataWrapper\Mock as t;

class DeliverTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = t::mock('DTOMarketplace\DataWrapper\PostPayment\PostPayment', $this);
        $this->context = new Deliver($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $hash               = 'hash';
        $info               = null;
        $ventureOrderNr = 1234;
        $ventureOrderItemId = 321;
        $exportedData       = [
            'name' => 'dtomarketplace.context.venture.postpayment.deliver',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'venture_order_nr'  => $ventureOrderNr,
                'venture_order_item_id' => $ventureOrderItemId
            ]
        ];

        $this->dw->method('getVentureOrderNr')
            ->willReturn($ventureOrderNr);

        $this->dw->method('getVentureOrderItemId')
            ->willReturn($ventureOrderItemId);

        $export = $this->context->exportContextData();
        unset($export['data_wrapper']);
        $this->assertSame($exportedData, $export);
    }
}
