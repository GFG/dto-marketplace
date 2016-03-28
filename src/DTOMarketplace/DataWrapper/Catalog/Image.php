<?php

namespace GFG\DTOMarketplace\DataWrapper\Catalog;

use Context\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getUrl()
 * @method string getPosition()
 * @method \DTOMarketplace\DataWrapper\Catalog\Image setUrl(string $url)
 * @method \DTOMarketplace\DataWrapper\Catalog\Image setPosition(tring $position)
 */
class Image extends Base
{
    private $url;
    private $position;
}
