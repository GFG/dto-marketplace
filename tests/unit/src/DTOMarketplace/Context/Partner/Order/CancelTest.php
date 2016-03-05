<?php

namespace DTOMarketplace\Context\Partner\Order;

class CancelTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('DTOMarketplace\DataWrapper\Order\Order')
            ->disableOriginalConstructor()
            ->setMethods(['getOrderNr', 'toArray'])
            ->getMock();

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
        $info         = null;
        $orderNr      = 123;
        $exportedData = [
            'name' => 'dtomarketplace.context.partner.order.cancel',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'order_nr' => $orderNr
            ]
        ];

        $this->dw->method('getOrderNr')->willReturn($orderNr);

        $export = $this->context->exportContextData();
        unset($export['data_wrapper']);
        $this->assertSame($exportedData, $export);
    }
}
