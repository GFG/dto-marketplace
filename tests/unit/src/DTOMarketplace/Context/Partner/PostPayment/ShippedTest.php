<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

use DTOMarketplace\DataWrapper\Mock as t;

class ShippedTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = t::mock('DTOMarketplace\DataWrapper\PostPayment\PostPayment');
        $this->context = new Shipped($this->dw);
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
            'name' => 'iris.context.partner.postpayment.shipped',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'delivery_type'     => $deliveryType,
                'shipping_provider' => $shippingProvider,
                'tracking_code'     => $trackingCode,
                'tracking_url'      => $trackingUrl,
                'nfe_key'           => $nfeKey,
                'order_nr'          => $ventureOrderNumber,
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

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
