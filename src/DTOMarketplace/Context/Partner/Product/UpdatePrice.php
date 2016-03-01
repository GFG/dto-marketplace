<?php

namespace DTOMarketplace\Context\Partner\Product;

use Context\Context\Base;

class UpdatePrice extends Base
{
    /**
     * {@inheritdoc}
     */
    public function exportContextData()
    {
        $dataWrapper = $this->getDataWrapper();

        return $this->prepareExport([
            'partner_sku'       => $dataWrapper->getPartnerSku(),
            'price'             => $dataWrapper->getPrice(),
            'special_price'     => $dataWrapper->getSpecialPrice(),
            'special_from_date' => $dataWrapper->getSpecialFromDate(),
            'special_to_date'   => $dataWrapper->getSpecialToDate()
        ]);
    }
}
