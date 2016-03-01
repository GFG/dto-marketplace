<?php

namespace Context;

class ManagerTest extends \PHPUnit_Framework_TestCase
{
    private $factory;
    private $contextManager;

    public function setUp()
    {
        $this->factory = $this->getMock('Context\Factory\FactoryInterface');
        $this->contextManager = new Manager($this->factory);
    }

    /**
     * @expectedException RuntimeException
     * @expectedExceptionMessage Factory not set
     */
    public function testGetFactory()
    {
        $this->assertSame(
            $this->factory, 
            $this->contextManager->getFactory()
        );
    }

    public function testSetFactory()
    {
        $factory = $this->getMock('Context\Factory\FactoryInterface');
        $this->assertSame(
            $this->contextManager, 
            $this->contextManager->setFactory($factory)
        );

        $this->assertSame(
            $factory, 
            $this->contextManager->getFactory()
        );
    }

    public function testBuild()
    {
        $contextName = 'venture.product.create';
        $dataWrapper = $this->getMock('Context\DataWrapper\DataWrapperInterface');
        $context     = $this->getMockBuilder('Context\Context\Base')
            ->disableOriginalConstructor()
            ->getMock();

        $this->factory
            ->expects($this->once())
            ->method('build')
            ->with($contextName, $dataWrapper)
            ->willReturn($context);

        $this->contextManager->setFactory($this->factory);

        $this->assertSame(
            $context,
            $this->contextManager->build($contextName, $dataWrapper)
        );
    }
}
