<?php

namespace DTOMarketplace\Context\Partner\Product;

use DTOMarketplace\Context\BaseInContext;

class UpdateStock extends BaseInContext
{
    /**
     * {@inheritdoc}
     */
    public function getHttpMethod()
    {
        return 'put';
    }

    /**
     * {@inheritdoc}
     */
    public function exportContextData()
    {
        $dataWrapper      = $this->getDataWrapper();
        $simpleCollection = [];

        foreach ($dataWrapper->getSimpleCollection() as $simple) {
            $simpleCollection[] = [
                'partner_sku' => $simple->getPartnerSku(),
                'quantity'    => $simple->getQuantity(),
            ];
        }

        return $this->prepareExport([
            'partner_sku'       => $dataWrapper->getPartnerSku(),
            'simple_collection' => $simpleCollection
        ]);

    }
}
