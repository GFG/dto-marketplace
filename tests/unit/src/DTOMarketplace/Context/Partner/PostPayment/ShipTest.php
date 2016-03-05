<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

use DTOMarketplace\DataWrapper\Mock as t;

class ShipTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = t::mock('DTOMarketplace\DataWrapper\PostPayment\PostPayment', $this);
        $this->context = new Ship($this->dw);
    } 

    public function testExportContextData()
    {
        $hash             = 'hash';
        $info             = null;
        $deliveryType     = 'delivery type';
        $shippingProvider = 'shipping provider'; 
        $trackingCode     = 'tracking code';     
        $trackingUrl      = 'tracking url';
        $nfeKey           = 'nfe key';
        $orderNr          = 1234;
        $orderItemId      = 4321;
        $exportedData     = [
            'name' => 'dtomarketplace.context.partner.postpayment.ship',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'delivery_type'     => $deliveryType,
                'shipping_provider' => $shippingProvider,
                'tracking_code'     => $trackingCode,
                'tracking_url'      => $trackingUrl,
                'nfe_key'           => $nfeKey,
                'order_nr'          => $ventureOrderNr,
                'order_item_id'     => $partnerCode
            ]
        ];

        $this->dw->method('getDeliveryType')->willReturn($deliveryType);

        $this->dw->method('getShippingProvider')->willReturn($shippingProvider);
        $this->dw->method('getTrackingCode')->willReturn($trackingCode);
        $this->dw->method('getTrackingUrl')->willReturn($trackingUrl);
        $this->dw->method('getNfeKey')->willReturn($nfeKey);
        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->dw->method('getOrderItemId')->willReturn($orderItemId);

        $export = $this->context->exportContextData();
        unset($export['data_wrapper']);
        $this->assertSame($exportedData, $export);
    }
}
