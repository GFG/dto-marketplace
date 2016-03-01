<?php

namespace DTOMarketplace\Context;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
//    protected $factory;

    public function setUp()
    {
        $this->factory = new Factory;
    }

    public function testGetMappedContext()
    {
         $context  = Factory::VENTURE_CREATE_PRODUCT_ON_PARTNER;
         $expected = 'DTOMarketplace\Context\Venture\Product\Create';

         $this->assertSame(
             $expected,
             $this->factory->getMappedContext($context)
         );
    }

    public function testBuild()
    {
        $contextName = Factory::VENTURE_CREATE_PRODUCT_ON_PARTNER;
        $instance    = 'DTOMarketplace\Context\Venture\Product\Create';
        $dataWrapper = $this->getMock('Context\DataWrapper\DataWrapperInterface');

        $this->assertInstanceOf(
            $instance, 
            $this->factory->build($contextName, $dataWrapper)
        );
    }

    public function testBuildWithCustomClass()
    {
        $contextName      = Factory::VENTURE_CREATE_PRODUCT_ON_PARTNER;
        $contextClassName = '\StdClass';
        $dataWrapper = $this->getMock('Context\DataWrapper\DataWrapperInterface');

        $this->assertSame(
            $this->factory,
            $this->factory->overwrite($contextName, $contextClassName)
        );

        $this->assertInstanceOf(
            $contextClassName, 
            $this->factory->build($contextName, $dataWrapper)
        );
    }

    public function testOverwrite()
    {
        $factory          = new Factory;
        $contextName      = Factory::VENTURE_CREATE_PRODUCT_ON_PARTNER;
        $contextClassName = 'Path\ClassName';

        $this->assertSame(
            $this->factory,
            $this->factory->overwrite($contextName, $contextClassName)
        );

        $this->assertSame(
            $contextClassName, 
            $this->factory->getMappedContext($contextName)
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage invalid context name invalidContextName
     */
    public function testOverwriteException()
    {
        $contextName      = 'invalidContextName';
        $contextClassName = 'Path\ClassName';

        $this->factory->overwrite($contextName, $contextClassName);
    }
}
