<?php

namespace DTOMarketplace\Context\Venture\Order;

use Context\DataWrapper\Mock;

class CancelTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw      = Mock::mock(
            'DTOMarketplace\DataWrapper\Order\Order', 
            $this
        );
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
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'venture_order_nr' => $ventureOrderNr,
            ]
        ];

        $this->dw->method('getVentureOrderNr')->willReturn($ventureOrderNr);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }
}
