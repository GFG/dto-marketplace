<?php

namespace DTOMarketplace\Context\Partner\Order;

class ConfirmOrderTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('Context\DataWrapper\DataWrapperInterface')
            ->setMethods(['getOrderNr', 'getVentureOrderNr', 'toArray'])
            ->getMock();

        $this->context = new ConfirmOrder($this->dw);
    } 

    public function testExportContextData()
    {
        $hash           = 'hash';
        $info           = null;
        $orderNr        = 123;
        $ventureOrderNr = 321;
        $exportedData   = [
            'name' => 'dtomarketplace.context.partner.order.confirmorder',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'order_nr'         => $orderNr,
                'venture_order_nr' => $ventureOrderNr
            ]
        ];

        $this->dw
            ->expects($this->once())
            ->method('getOrderNr')
            ->willReturn($orderNr);

        $this->dw
            ->expects($this->once())
            ->method('getVentureOrderNr')
            ->willReturn($ventureOrderNr);

        $export = $this->context->exportContextData();
        unset($export['data_wrapper']);
        $this->assertSame($exportedData, $export);
    }
}
