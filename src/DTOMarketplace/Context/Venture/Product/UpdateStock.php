<?php

namespace GFG\DTOMarketplace\Context\Venture\Product;

use GFG\DTOMarketplace\Context\Base;

class UpdateStock extends Base
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
                'sku'           => $simple->getSku(),
                'partner_sku'   => $simple->getPartnerSku(),
                'quantity'      => $simple->getQuantity(),
            ];
        }

        return $this->prepareExport([
            'sku'               => $dataWrapper->getSku(),
            'partner_sku'       => $dataWrapper->getPartnerSku(),
            'simple_collection' => $simpleCollection
        ]);
    }
}
