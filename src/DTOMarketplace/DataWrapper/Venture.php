<?php

namespace GFG\DTOMarketplace\DataWrapper;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method integer getIdIrisVenture()
 * @method integer getFkCatalogSupplier()
 * @method string getVentureCode()
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setIdIrisVenture(integer $idIrisVenture)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setFkCatalogSupplier(integer $fkCatalogSupplier)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setVentureCode(string $VentureCode)
 */
class Venture extends Base
{
    private $idIrisVenture;
    private $fkCatalogSupplier;
    private $ventureCode;
}
