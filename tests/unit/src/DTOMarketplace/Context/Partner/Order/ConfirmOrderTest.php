<?php

namespace DTOMarketplace\Context\Partner\Order;

use Context\DataWrapper\Mock;

class ConfirmOrderTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::mock(
            'DTOMarketplace\DataWrapper\Order\Order',
            $this
        );
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
            'data_wrapper' => get_class($this->dw),
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

        $this->assertSame($exportedData, $this->context->exportContextData());
    }

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }
}
