<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

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

    public function testGetUrlParts()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        //data
        $info               = null;

        $deliveryType       = 'delivery type';
        $shippingProvider   = 'shipping provider'; 
        $trackingCode       = 'tracking code';     
        $trackingUrl        = 'tracking url';
        $nfeKey             = 'nfe key';
        $ventureOrderNr     = 1234;
        $ventureOrderItemId = 321;

        $exportedData       = [
            'name' => 'dtomarketplace.context.venture.postpayment.ship',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'delivery_type'         => $deliveryType,
                'shipping_provider'     => $shippingProvider,
                'tracking_code'         => $trackingCode,
                'tracking_url'          => $trackingUrl,
                'nfe_key'               => $nfeKey,
                'venture_order_nr'  => $ventureOrderNr,
                'partner_code'          => $partnerCode,
                'venture_order_item_id' => $ventureOrderItemId
            ]
        ];

        $this->dw->method('getDeliveryType')->willReturn($deliveryType);
        $this->dw->method('getShippingProvider')->willReturn($shippingProvider);
        $this->dw->method('getTrackingCode')->willReturn($trackingCode);
        $this->dw->method('getTrackingUrl')->willReturn($trackingUrl);
        $this->dw->method('getNfeKey')->willReturn($nfeKey);
        $this->dw->method('getVentureOrderNr')->willReturn($ventureOrderNr);
        $this->dw->method('getVentureOrderItemId')->willReturn($ventureOrderItemId);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
