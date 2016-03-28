<?php

namespace GFG\DTOMarketplace\Context\Partner\Order;

use GFG\DTOContext\DataWrapper\Mock;

class CancelTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Order\Order', 
            $this
        );
        $this->context = new Cancel($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame(
            'put',
            $this->context->getHttpMethod()
        );
    }

    public function testExportContextData()
    {
        $hash         = 'hash';
        $info         = [];
        $orderNr      = 123;
        $exportedData = [
            'name' => 'gfg.dtomarketplace.context.partner.order.cancel',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'order_nr' => $orderNr
            ]
        ];

        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
