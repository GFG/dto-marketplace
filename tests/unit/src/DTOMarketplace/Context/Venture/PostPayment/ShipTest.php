<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

use Context\DataWrapper\Mock;

class ShipTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\PostPayment',
            $this
        );
        $this->context = new Ship($this->dw);
    } 

    public function testGetUrlParts()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $item               = Mock::mock(
            'DTOMarketplace\DataWrapper\PostPayment\Item', 
            $this
        );
        //data
        $info               = null;

        $deliveryType       = 'delivery type';
        $shippingProvider   = 'shipping provider'; 
        $trackingCode       = 'tracking code';     
        $trackingUrl        = 'tracking url';
        $nfeKey             = 'nfe key';
        $ventureOrderNr     = 1234;
        $ventureOrderItemId = 321;
        $partnerCode        = 'partner code';
        $reason             = 'reason';
        $reasonDetail       = 'reason detail';

        $exportedData       = [
            'name' => 'dtomarketplace.context.venture.postpayment.ship',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'venture_order_nr'  => $ventureOrderNr,
                'item_collection' => [[
                    'tracking_code'         => $trackingCode,
                    'tracking_url'          => $trackingUrl,
                    'nfe_key'               => $nfeKey,
                    'delivery_type'         => $deliveryType,
                    'shipping_provider'     => $shippingProvider,
                    'venture_order_item_id' => $ventureOrderItemId,
                    'reason'                => $reason,
                    'reason_detail' => $reasonDetail
                ]]
            ]
        ];

        $this->dw->method('getVentureOrderNr')->willReturn($ventureOrderNr);
        $this->dw->method('getItemCollection')->willReturn([$item]);

        $item->method('getTrackingCode')->willReturn($trackingCode);
        $item->method('getTrackingUrl')->willReturn($trackingUrl);
        $item->method('getNfeKey')->willReturn($nfeKey);
        $item->method('getDeliveryType')->willReturn($deliveryType);
        $item->method('getShippingProvider')->willReturn($shippingProvider);
        $item->method('getVentureOrderItemId')->willReturn($ventureOrderItemId);
        $item->method('getReason')->willReturn($reason);
        $item->method('getReasonDetail')->willReturn($reasonDetail);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }

    public function testGetUrl()
    {
        $this->assertInstanceOf(
            'Url\Url',
            $this->context->getUrl()
        );
    }
}
