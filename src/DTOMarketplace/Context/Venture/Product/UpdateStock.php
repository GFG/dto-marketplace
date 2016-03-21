<?php

namespace DTOMarketplace\Context\Venture\Product;

use DTOMarketplace\Context\Base;

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
                'sku'      => $simple->getSku(),
                'quantity' => $simple->getQuantity(),
            ];
        }

        return $this->prepareExport([
            'sku'               => $dataWrapper->getSku(),
            'simple_collection' => $simpleCollection
        ]);
    }
}
