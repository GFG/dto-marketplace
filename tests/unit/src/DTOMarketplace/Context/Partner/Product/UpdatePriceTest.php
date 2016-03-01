<?php

namespace DTOMarketplace\Context\Partner\Product;

class UpdatePriceTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('Context\DataWrapper\DataWrapperInterface')
            ->setMethods([
                'getPartnerSku',       
                'getPrice',       
                'getSpecialPrice',       
                'getSpecialFromDate',       
                'getSpecialToDate',       
                'toArray'
            ])
            ->getMock();

        $this->context = new UpdatePrice($this->dw);
    } 

    public function testExportContextData()
    {
        $info             = null;
        $partnerSku       = 'sku';
        $price            = 100.00;
        $specialPrice     = 50.00;
        $specialFromDate  = '2016-01-01 00:00:01';
        $specialToDate    = '2016-02-01 00:00:01';
        $simpleCollection = [];
        $exportedData = [
            'name' => 'iris.context.partner.product.updateprice',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'partner_sku'       => $partnerSku,
                'price'             => $price,
                'special_price'     => $specialPrice,
                'special_from_date' => $specialFromDate,
                'special_to_date'   => $specialToDate
            ]
        ];

        $this->dw->method('getSkuConfig')->willReturn($skuConfig);
        $this->dw->method('getPrice')->willReturn($price);
        $this->dw->method('getSpecialPrice')->willReturn($specialPrice);
        $this->dw->method('getSpecialFromDate')->willReturn($specialFromDate);
        $this->dw->method('getSpecialToDate')->willReturn($specialToDate);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
