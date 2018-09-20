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
        /** @var \GFG\DTOMarketplace\DataWrapper\Catalog\Config $dataWrapper */
        $dataWrapper      = $this->getDataWrapper();
        $simpleCollection = [];

        /** @var \GFG\DTOMarketplace\DataWrapper\Catalog\Simple $simple */
        foreach ($dataWrapper->getSimpleCollection() as $simple) {
            $simpleCollection[] = [
                'sku'                => $simple->getSku(),
                'partner_sku'        => $simple->getPartnerSku(),
                'quantity'           => $simple->getQuantity(),
                'venture_product_id' => $simple->getVentureProductId(),
            ];
        }

        return $this->prepareExport([
            'sku'               => $dataWrapper->getSku(),
            'partner_sku'       => $dataWrapper->getPartnerSku(),
            'simple_collection' => $simpleCollection
        ]);
    }
}
