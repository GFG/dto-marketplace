<?php

namespace DTOMarketplace\Context\Venture\Product;

class Delete extends Update
{
    /**
     * {@inheritdoc}
     */
    public function exportContextData()
    {
        $dataWrapper      = $this->getDataWrapper();
        $simpleCollection = [];

        foreach ($dataWrapper->getSimpleCollection() as $simple) {
            $simpleCollection[] = [
                'sku'    => $simple->getSku(),
                'status' => $simple->getStatus()
            ];
        }

        return $this->prepareExport([
            'sku'               => $dataWrapper->getSku(),
            'status'            => $dataWrapper->getStatus(),
            'simple_collection' => $simpleCollection
        ]);
    }
}
