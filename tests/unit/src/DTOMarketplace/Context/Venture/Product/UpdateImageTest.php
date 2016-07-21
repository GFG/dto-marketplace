<?php

namespace GFG\DTOMarketplace\Context\Venture\Product;

use GFG\DTOContext\DataWrapper\Mock;

class UpdateImageTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $dwImage;
    private $context;

    public function setup()
    {
        $this->dw     = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Catalog\Config', 
            $this
        );
        $this->dwImage = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Catalog\Image',
            $this
        );

        $this->context = new UpdateImage($this->dw);
    } 

    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $info     = [];
        $sku      = 'sku';
        $position = 1;
        $url      = 'http://domain.com/image.jpg';

        $exportedData = [
            'name' => 'gfg.dtomarketplace.context.venture.product.updateimage',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'sku' => $sku,
                'image_collection' => [[
                    'position' => $position,
                    'url'      => $url
                ]]
            ]
        ];

        $this->dwImage->method('getPosition')->willReturn($position);
        $this->dwImage->method('getUrl')->willReturn($url);

        $this->dw->method('getSku')->willReturn($sku); 
        $this->dw->method('getImageCollection')->willReturn([$this->dwImage]);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
