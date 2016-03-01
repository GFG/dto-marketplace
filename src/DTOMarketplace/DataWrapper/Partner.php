<?php

namespace DTOMarketplace\DataWrapper;

use Context\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method integer getIdIrisPartner()
 * @method integer getFkStore()
 * @method string getPartnerCode()
 * @method \DTOMarketplace\DataWrapper\Partner setIdIrisPartner(integer $idIrisPartner)
 * @method \DTOMarketplace\DataWrapper\Partner setFkStore(integer $fkStore)
 * @method \DTOMarketplace\DataWrapper\Partner setPartnerCode(string $partnerCode)
 */
class Partner extends Base
{
    private $idIrisPartner;
    private $fkStore;
    private $partnerCode;
}
