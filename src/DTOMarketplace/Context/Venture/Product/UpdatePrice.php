<?php

namespace DTOMarketplace\Context\Venture\Product;

use DTOMarketplace\Context\BaseOutContext;

class UpdatePrice extends BaseOutContext
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
                'sku' => $simple->getSku()
            ];
        }

        return $this->prepareExport([
            'sku'               => $dataWrapper->getSku(),
            'price'             => $dataWrapper->getPrice(),
            'special_price'     => $dataWrapper->getSpecialPrice(),
            'special_from_date' => $dataWrapper->getSpecialFromDate(),
            'special_to_date'   => $dataWrapper->getSpecialToDate(),
            'simple_collection' => $simpleCollection
        ]);
    }
}
