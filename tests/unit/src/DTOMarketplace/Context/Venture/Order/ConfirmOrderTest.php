<?php

namespace DTOMarketplace\Context\Venture\Order;

use DTOMarketplace\DataWrapper\Mock as t;

class ConfirmOrderTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = t::mock('DTOMarketplace\DataWrapper\Order\Order', $this);
        $this->context = new ConfirmOrder($this->dw);
    } 
    
    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $info           = null;
        $salesOrderId   = 1;
        $sku            = 'sku';
        $orderNr        = 'order nr';
        $price          = 100.00;               
        $ventureOrderNr = 'venture order nr';
        $status         = 'active';
        $reason         = 'reason';
        $reasonDetail   = 'reason detail';
        $items          = [];
        $item           = t::mock('DTOMarketplace\DataWrapper\Order\Item', $this);

        $item->method('getIdSalesOrderItem')->willReturn($salesOrderId);
        $item->method('getSku')->willReturn($sku);
        $item->method('getStatus')->willReturn($status);
        $item->method('getReason')->willReturn($reason);
        $item->method('getPrice')->willReturn($price);
        $item->method('getReasonDetail')->willReturn($reasonDetail);

        $exportedData = [
            'name' => 'iris.context.venture.order.confirmorder',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'order_nr'         => $orderNr,
                'venture_order_nr' => $ventureOrderNr,
                'status'           => $status,
                'reason'           => $reason,
                'reason_detail'    => $reasonDetail,
                'item_collection'  => [
                    [
                        'id_sales_order_item' => $salesOrderId,
                        'sku'                 => $sku,
                        'status'              => $status,
                        'price'               => $price,
                        'reason'              => $reason,
                        'reason_detail'       => $reasonDetail
                    ]
                ],
            ]
        ];

        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->dw->method('getVentureOrderNr')->willReturn($ventureOrderNr);
        $this->dw->method('getStatus')->willReturn($status);
        $this->dw->method('getReason')->willReturn($reason);
        $this->dw->method('getReasonDetail')->willReturn($reasonDetail);
        $this->dw->method('getItemCollection')->willReturn([$item]);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
