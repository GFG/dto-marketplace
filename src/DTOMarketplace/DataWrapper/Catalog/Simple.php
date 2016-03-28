<?php

namespace GFG\DTOMarketplace\DataWrapper\Catalog;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getSku()
 * @method string getPartnerSku()
 * @method string getVariation()
 * @method int getQuantity()
 * @method string getEan()
 * @method string getStatus()
 * @method array getAttributes()
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Simple setSku(string $sku)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Simple setPartnerSku(string $partnerSku)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Simple setVariation(string $variation)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Simple setQuantity(int $quantity)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Simple setEan(string $ean)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Simple setStatus(string $status)
 * @method \GFG\DTOMarketplace\DataWrapper\Catalog\Simple setAttributes(array $attributes)
 */
class Simple extends Base
{
    private $sku;
    private $partnerSku;
    private $variation;
    private $quantity;
    private $ean;
    private $status;
    private $attributes;
}
