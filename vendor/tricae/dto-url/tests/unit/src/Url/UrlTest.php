<?php

namespace Url;

class UrlTest extends \PHPUnit_Framework_TestCase
{
    private $url;

    public function setUp()
    {
        $urlParts = [
            'scheme'   => 'http',
            'host'     => 'externalshop.com',
            'port'     => 80,
            'user'     => 'username',
            'pass'     => 'password',
            'path'     => ['api', 'version', 'action'],
            'query'    => ['query' => 'string'],
            'fragment' => 'first'
        ];

        $this->url = new Url($urlParts);
    }

    public function testBuildUrl()
    {
        $expected = 'http://username:password@externalshop.com:80/api/version/action?query=string#first';
        $this->assertSame(
            $expected, 
            $this->url->getFullUrl()
         );
    }

    public function testHostPartial()
    {
        $expected = 'https://www.externalshop.com/test';
        $urlParts = [
            'scheme'   => 'https',
            'host'     => 'www.externalshop.com',
            'path'     => ['test']
        ];

        $url = new Url($urlParts);
        $this->assertSame(
            $expected, 
            $url->getFullUrl()
        );
    }

    public function testApiPartial()
    {
        $expected = "/api/2/kanui/product";
        $urlParts = [
            'path' => [
                'api', 
                'version' => 'version',
                'partnerCode' => 'partner-code',
                'product'
            ]
        ];

        $url = new Url($urlParts);

        $replace = [
            'version'     => 2,
            'partnerCode' => 'kanui'
        ];

        $url->replacePath($replace);

        $this->assertSame(
            $expected, 
            $url->getFullUrl()
        );
    }

    public function testReplacePaths()
    {
        $expected = 'http://username:password@externalshop.com:80/2.0/create/product?query=string#first';
        $paths = [
            'version' => 'version',
            'create',
            'product'
        ];

        $replace = ['version' => '2.0'];

        $this->assertSame(
            $this->url,
            $this->url->setPath($paths)
        );

        $this->assertSame(
            $this->url,
            $this->url->replacePath($replace)
        );

        $this->assertSame(
            $expected, 
            $this->url->getFullUrl()
        );
    }

    public function testReplaceQuery()
    {
        $expected = 'http://username:password@externalshop.com:80/api/version/action?name=fullname#first';
        $query = [
            'name' => 'name',
        ];

        $replace = ['name' => 'fullname'];

        $this->assertSame(
            $this->url,
            $this->url->setQuery($query)
        );

        $this->assertSame(
            $this->url,
            $this->url->replaceQuery($replace)
        );

        $this->assertSame(
            $expected, 
            $this->url->getFullUrl()
        );
    }
}
