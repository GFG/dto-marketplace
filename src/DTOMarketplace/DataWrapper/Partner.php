<?php

namespace GFG\DTOMarketplace\DataWrapper;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method integer getIdIrisPartner()
 * @method integer getFkStore()
 * @method string getPartnerCode()
 * @method \GFG\DTOMarketplace\DataWrapper\Partner setIdIrisPartner(integer $idIrisPartner)
 * @method \GFG\DTOMarketplace\DataWrapper\Partner setFkStore(integer $fkStore)
 * @method \GFG\DTOMarketplace\DataWrapper\Partner setPartnerCode(string $partnerCode)
 */
class Partner extends Base
{
    private $idIrisPartner;
    private $fkStore;
    private $partnerCode;
}
