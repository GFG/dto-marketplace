<?php

namespace DTOMarketplace\Context\Venture\Order;

use DTOMarketplace\DataWrapper\Mock as t;

class CancelTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = t::mock('DTOMarketplace\DataWrapper\Order\Order', $this);
        $this->context = new Cancel($this->dw);
    } 

    public function testExportContextData()
    {
        $info           = null;
        $ventureOrderNr = 'order nr';
        $exportedData   = [
            'name' => 'dtomarketplace.context.venture.order.cancel',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'venture_order_nr' => $ventureOrderNr,
            ]
        ];

        $this->dw->method('getVentureOrderNr')->willReturn($orderNr);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
