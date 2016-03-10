<?php

namespace DTOMarketplace\Context\Partner\Product;

use Context\DataWrapper\Mock;

class UpdatePriceTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw      = Mock::mock(
            'DTOMarketplace\DataWrapper\Catalog\Config', 
            $this
        );
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
            'name' => 'dtomarketplace.context.partner.product.updateprice',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'partner_sku'       => $partnerSku,
                'price'             => $price,
                'special_price'     => $specialPrice,
                'special_from_date' => $specialFromDate,
                'special_to_date'   => $specialToDate
            ]
        ];

        $this->dw->method('getPartnerSku')->willReturn($partnerSku);
        $this->dw->method('getPrice')->willReturn($price);
        $this->dw->method('getSpecialPrice')->willReturn($specialPrice);
        $this->dw->method('getSpecialFromDate')->willReturn($specialFromDate);
        $this->dw->method('getSpecialToDate')->willReturn($specialToDate);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }
}
