<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

class CanceledTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('DTOMarketplace\DataWrapper\PostPayment\PostPayment')
            ->disableOriginalConstructor()
            ->setMethods([
                'getReason',
                'getReasonDetail',
                'getVentureOrderNumber',
                'getPartnerCode',
                'getVentureOrderItemId',
                'toArray'])
            ->getMock();

        $this->context = new Canceled($this->dw);
    } 

    public function testGetUrlParts()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $hash               = 'hash';
        $info               = null;
        $reason             = 'Reason';
        $reasonDetail       = 'Reason detail';
        $ventureOrderNumber = 1234;
        $partnerCode        = 'Partner code';
        $ventureOrderItemId = 321;
        $exportedData       = [
            'name' => 'iris.context.venture.postpayment.canceled',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'reason'             => $reason,
                'reason_detail'       => $reasonDetail,
                'venture_order_number' => $ventureOrderNumber,
                'partner_code'        => $partnerCode,
                'venture_order_item_id' => $ventureOrderItemId
            ]
        ];

        $this->dw
            ->expects($this->once())
            ->method('getReason')
            ->willReturn($reason);

        $this->dw
            ->expects($this->once())
            ->method('getReasonDetail')
            ->willReturn($reasonDetail);

        $this->dw
            ->expects($this->once())
            ->method('getVentureOrderNumber')
            ->willReturn($ventureOrderNumber);

        $this->dw
            ->expects($this->once())
            ->method('getPartnerCode')
            ->willReturn($partnerCode);

        $this->dw
            ->expects($this->once())
            ->method('getVentureOrderItemId')
            ->willReturn($ventureOrderItemId);

        $this->assertSame(
            $exportedData,
            $this->context->exportContextData()
        );
    }
}
