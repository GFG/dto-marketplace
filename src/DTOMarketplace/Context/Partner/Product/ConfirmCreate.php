<?php

namespace DTOMarketplace\Context\Partner\Product;

use DTOMarketplace\Context\BaseOutContext;

class ConfirmCreate extends BaseOutContext
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
                'sku' => $simple->getSku(),
            ];
        }

        return $this->prepareExport([
            'sku'               => $dataWrapper->getSku(),
            'partner_sku'       => $dataWrapper->getPartnerSku(),
            'simple_collection' => $simpleCollection
        ]);
    }
}
