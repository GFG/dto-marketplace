<?php

namespace DTOMarketplace\DataWrapper\Catalog;

use Context\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getSku()
 * @method string getPartnerSku()
 * @method string getVariation()
 * @method int getQuantity()
 * @method string getEan()
 * @method string getStatus()
 * @method \DTOMarketplace\DataWrapper\Catalog\Simple setSku(string $sku)
 * @method \DTOMarketplace\DataWrapper\Catalog\Simple setPartnerSku(string $partnerSku)
 * @method \DTOMarketplace\DataWrapper\Catalog\Simple setVariation(string $variation)
 * @method \DTOMarketplace\DataWrapper\Catalog\Simple setQuantity(int $quantity)
 * @method \DTOMarketplace\DataWrapper\Catalog\Simple setEan(string $ean)
 * @method \DTOMarketplace\DataWrapper\Catalog\Simple setStatus(string $status)
 */
class Simple extends Base
{
    private $sku;
    private $partnerSku;
    private $variation;
    private $quantity;
    private $ean;
    private $status;
}
