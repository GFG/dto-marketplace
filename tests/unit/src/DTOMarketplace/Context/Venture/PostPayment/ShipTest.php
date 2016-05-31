<?php

namespace GFG\DTOMarketplace\Context\Venture\PostPayment;

use GFG\DTOContext\DataWrapper\Mock;

class ShipTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\PostPayment\PostPayment',
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
        $item               = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\PostPayment\Item', 
            $this
        );
        //data
        $info               = [];

        $deliveryType       = 'delivery type';
        $shippingProvider   = 'shipping provider'; 
        $trackingCode       = 'tracking code';     
        $trackingUrl        = 'tracking url';
        $nfeKey             = 'nfe key';
        $ventureOrderNr     = 1234;
        $ventureOrderItemId = 321;
        $partnerCode        = 'partner code';

        $exportedData       = [
            'name' => 'gfg.dtomarketplace.context.venture.postpayment.ship',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'venture_order_nr'  => $ventureOrderNr,
                'order_nr' => null,
                'item_collection' => [[
                    'tracking_code'         => $trackingCode,
                    'tracking_url'          => $trackingUrl,
                    'nfe_key'               => $nfeKey,
                    'delivery_type'         => $deliveryType,
                    'shipping_provider'     => $shippingProvider,
                    'venture_order_item_id' => $ventureOrderItemId,
                    'order_item_id' => null
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

        $this->assertSame($exportedData, $this->context->exportContextData());
    }

    public function testGetUrl()
    {
        $this->assertInstanceOf(
            'GFG\DTOUrl\Url',
            $this->context->getUrl()
        );
    }
}
