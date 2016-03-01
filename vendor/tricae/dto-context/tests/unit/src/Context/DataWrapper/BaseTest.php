<?php

namespace Context\DataWrapper;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testNewDataWrapper()
    {
        $dataWrapper = new TestDataWrapper(array('prop1' => 1));
        $this->assertSame(1, $dataWrapper->getProp1());
    }

    public function testGetSet()
    {
        $dataWrapper = new TestDataWrapper();
        $this->assertSame($dataWrapper, $dataWrapper->setProp1(1));
        $this->assertSame(1, $dataWrapper->getProp1());
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Method does not exists
     */
    public function testInvalidMethod()
    {
        $dataWrapper = new TestDataWrapper();
        $dataWrapper->nonExistentMethod();
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Property x does not exists
     */
    public function testInvalidProperty()
    {
        $dataWrapper = new TestDataWrapper();
        $dataWrapper->getX();
    }

    public function testToArray()
    {
        $dataWrapper = new TestDataWrapper();
        $this->assertSame(
            array(
                'prop1'  => null,
                'prop2'  => null,
                'prop3'  => null,
                'prop4'  => null,
                'prop5'  => null,
                'prop6'  => null,
                'prop7'  => null,
                'prop8'  => null,
                'prop9'  => null,
                'prop10' => null
            ),
            $dataWrapper->toArray()
        );
    }

    public function testToArrayWithDate()
    {
        $dataWrapper = new TestDataWrapper(array('prop1' => new \DateTime('1960-01-01')));
        $this->assertSame(
            array(
                'prop1' => '1960-01-01',
                'prop2' => null,
                'prop3' => null,
                'prop4' => null,
                'prop5' => null,
                'prop6' => null,
                'prop7' => null,
                'prop8' => null,
                'prop9' => null,
                'prop10' => null
            ),
            $dataWrapper->toArray()
        );
    }

    public function testToCleanArray()
    {
        $dataWrapper = new TestDataWrapper();
        $this->assertSame(
            array(),
            $dataWrapper->toCleanArray()
        );
    }

    public function testArrayAccess()
    {
        $dataWrapper = new TestDataWrapper();
        $dataWrapper['prop1'] = 1;
        $this->assertSame(1, $dataWrapper['prop1']);
        if (isset($dataWrapper['prop1'])) {
            unset($dataWrapper['prop1']);
            $this->assertNull($dataWrapper['prop1']);
        }
    }

}

class TestDataWrapper extends Base
{
    private $prop1;
    private $prop2;
    private $prop3;
    private $prop4;
    private $prop5;
    private $prop6;
    private $prop7;
    private $prop8;
    private $prop9;
    private $prop10;
}
