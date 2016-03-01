<?php

namespace DTOMarketplace\Context\Partner\Order;

class BindVentureOrderTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('Context\DataWrapper\DataWrapperInterface')
            ->setMethods(['getOrderNr', 'getVentureOrderNr', 'toArray'])
            ->getMock();

        $this->context = new BindVentureOrder($this->dw);
    } 

    public function testExportContextData()
    {
        $hash           = 'hash';
        $info           = null;
        $orderNr        = 123;
        $ventureOrderNr = 321;
        $exportedData   = [
            'name' => 'iris.context.partner.order.bindventureorder',
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

        $this->assertSame(
            $exportedData,
            $this->context->exportContextData()
        );
    }
}
