<?php

namespace Context\Context;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    private $context;
    private $contextName = 'context.context.base';
    private $dataWrapper;

    public function setup()
    {
        $this->dataWrapper = $this->getMock('Context\DataWrapper\DataWrapperInterface');
        $this->context     = new Base($this->dataWrapper);
    }

    public function testGetName()
    {

        $this->assertSame(
            $this->contextName,
            $this->context->getName()
        );
    }

    public function testSetName()
    {
        $name = 'Name';

        $this->assertSame(
            $this->context,
            $this->context->setName($name)
        );

        $this->assertSame(
            $name,
            $this->context->getName()
        );
    }

    public function testCallError()
    {
        $this->assertNull(
            $this->context->bananas()
        );
    }

    public function testGetDataWrapper()
    {
        $this->assertSame(
            $this->dataWrapper,
            $this->context->getDataWrapper()
        );
    }

    public function testSetDataWrapper()
    {
        $dataWrapper  = $this->getMock('Context\DataWrapper\DataWrapperInterface');
        $this->assertSame(
            $this->context,
            $this->context->setDataWrapper($dataWrapper)
        );

        $this->assertSame(
            $dataWrapper, 
            $this->context->getDataWrapper()
        );
    }

    public function testGetAndSetHash()
    {
        $hash = rand(1,99999);
        $this->assertSame(
            $this->context,
            $this->context->setHash($hash)
        );

        $this->assertSame(
            $hash, 
            $this->context->getHash()
        );
    }

    public function testGetRandomHash()
    {
        $this->assertSame(
            40,
            strlen($this->context->getHash())
        );
    }

    public function testSetAndGetContextProperties()
    {
        //set
        $partnerCode = 'Partner Code 1';
        $this->assertSame(
            $this->context,
            $this->context->setPartnerCode($partnerCode)
            );

        $this->assertSame(
            $partnerCode, 
            $this->context->getPartnerCode()
        );
    }

     public function testExportContextData()
     {
        $hash        = $this->context->getHash(); 
        $data        = ['order_nr' => 123];
        $partnerCode = 'Partner Code';
        $reference  = [
            'name' => $this->contextName,
            'info' => ['Partner' => $partnerCode],
            'hash' => $hash,
            'data' => $data
        ];                 

        $dataWrapper  = $this->getMock('Context\DataWrapper\DataWrapperInterface');
        $dataWrapper->expects($this->once())
            ->method('toArray')
            ->willReturn($data);

        $this->context->setDataWrapper($dataWrapper);
        $this->context->setPartner($partnerCode);

        $this->assertSame(
            $reference,
            $this->context->exportContextData()
        );
     }
}
