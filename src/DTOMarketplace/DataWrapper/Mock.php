<?php

namespace DTOMarketplace\DataWrapper;

class Mock
{
    /**
     * Creates a mock for a given transfer (because of dynamic getters and setters)
     */
    public static function mock($name, \PHPUnit_Framework_TestCase $phpunit)
    {
        $methods = array();

        $ref = new \ReflectionClass($name);
        foreach ($ref->getProperties() as $property) {
            $methods[] = 'get' . ucfirst($property->name);
            $methods[] = 'set' . ucfirst($property->name);
        }

        foreach ($ref->getMethods() as $method) {
            $methods[] = $method->name;
        }

        return $phpunit->getMockBuilder($name)
            ->disableOriginalConstructor()
            ->setMethods($methods)
            ->getMock();
    }
}
