<?php

namespace GFG\DTOMarketplace\Context\Partner\Order;

use GFG\DTOContext\DataWrapper\Mock;
use GFG\DTOMarketplace\DataWrapper\Order\ItemCollection;

class CancelTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    /**
     * {@inheritdoc}
     */
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
        $info         = [];
        $orderNr      = 123;
        $exportedData = [
            'name' => 'gfg.dtomarketplace.context.partner.order.cancel',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'order_nr' => $orderNr,
                'venture_order_nr' => null,
                'item_collection' => [
                    [
                        'id' => 1234
                    ]
                ],
            ]
        ];

        $itemMock = $this->getItemMock();
        $itemMock->expects($this->once())->method('getId')->willReturn(1234);
        $itemCollection = new ItemCollection([$itemMock]);

        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->dw->method('getItemCollection')->willReturn($itemCollection);
        $this->assertEquals($exportedData, $this->context->exportContextData());
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\GFG\DTOMarketplace\DataWrapper\Order\Item
     */
    private function getItemMock()
    {
        return  Mock::create(
            '\GFG\DTOMarketplace\DataWrapper\Order\Item',
            $this
        );
    }
}
