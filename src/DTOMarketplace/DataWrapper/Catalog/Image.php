<?php

namespace GFG\DTOMarketplace\DataWrapper\Catalog;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getUrl()
 * @method string getPosition()
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Image setUrl(string $url)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Image setPosition(tring $position)
 */
class Image extends Base
{
    private $url;
    private $position;
}
