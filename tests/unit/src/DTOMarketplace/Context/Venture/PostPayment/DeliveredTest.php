<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

use DTOMarketplace\DataWrapper\Mock as t;

class DeliveredTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = t::mock('DTOMarketplace\DataWrapper\PostPayment\PostPayment');
        $this->context = new Delivered($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $hash               = 'hash';
        $info               = null;
        $ventureOrderNumber = 1234;
        $ventureOrderItemId = 321;
        $exportedData       = [
            'name' => 'iris.context.venture.postpayment.delivered',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'venture_order_number'  => $ventureOrderNumber,
                'venture_order_item_id' => $ventureOrderItemId
            ]
        ];

        $this->dw->method('getVentureOrderNumber')
            ->willReturn($ventureOrderNumber);

        $this->dw->method('getVentureOrderItemId')
            ->willReturn($ventureOrderItemId);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
