<?php

namespace DTOMarketplace\Context\Partner\Product;

use DTOMarketplace\Context\BaseInContext;

class Update extends BaseInContext
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
        $imageCollection  = [];

        foreach ($dataWrapper->getSimpleCollection() as $simple) {
            $simpleCollection[] = [
                'partner_sku' => $simple->getPartnerSku(),
                'variation'   => $simple->getVariation(),
                'ean'         => $simple->getEan()
            ];
        }

        foreach ($dataWrapper->getImageCollection() as $image) {
            $imageCollection[] = [
                'url'      => $image->getUrl(),
                'position' => $image->getPosition()
            ];
        }

        return $this->prepareExport([
            'partner_sku'       => $dataWrapper->getPartnerSku(),
            'name'              => $dataWrapper->getName(),
            'description'       => $dataWrapper->getDescription(),
            'brand'             => $dataWrapper->getBrand(),
            'attributes'        => $dataWrapper->getAttributes(),
            'attribute_set'     => $dataWrapper->getAttributeSet(),
            'image_collection'  => $imageCollection,
            'simple_collection' => $simpleCollection,
            'status'            => $dataWrapper->getStatus()
        ]);
    }
}
