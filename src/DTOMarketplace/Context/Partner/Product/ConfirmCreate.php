<?php

namespace GFG\DTOMarketplace\Context\Partner\Product;

use GFG\DTOMarketplace\Context\Base;

class ConfirmCreate extends Base
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
                'sku'                => $simple->getSku(),
                'partner_sku'        => $simple->getPartnerSku(),
                'venture_product_id' => $simple->getVentureProductId()
            ];
        }

        return $this->prepareExport([
            'sku'               => $dataWrapper->getSku(),
            'partner_sku'       => $dataWrapper->getPartnerSku(),
            'simple_collection' => $simpleCollection
        ]);
    }
}
