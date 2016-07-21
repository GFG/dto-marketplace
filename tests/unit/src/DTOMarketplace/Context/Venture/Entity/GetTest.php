<?php

namespace GFG\DTOMarketplace\Context\Venture\Entity;

use GFG\DTOContext\DataWrapper\Mock;

class GetTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Venture', 
            $this
        );
        $this->context = new Get($this->dw);
    } 
    
    public function testGetHttpMethod()
    {
        $this->assertSame('get', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $id = 4;

        $this->dw->method('getId')->willReturn($id);

        $exportedData = [
            'name' => 'gfg.dtomarketplace.context.venture.entity.get',
            'info' => [],
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'id' => $id
            ]
        ];

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
