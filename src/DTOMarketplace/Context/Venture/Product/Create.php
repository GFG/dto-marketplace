<?php

namespace DTOMarketplace\Context\Venture\Product;

use DTOMarketplace\Context\BaseOutContext;

class Create extends BaseOutContext
{
    /**
     * {@inheritdoc}
     */
    public function getHttpMethod()
    {
        return 'post';
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
                'partner_sku' => $simple->getSku(),
                'variation'   => $simple->getVariation(),
                'quantity'    => $simple->getQuantity(),
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
            'sku'               => $dataWrapper->getSku(),
            'name'              => $dataWrapper->getName(),
            'description'       => $dataWrapper->getDescription(),
            'brand'             => $dataWrapper->getBrand(),
            'price'             => $dataWrapper->getPrice(),
            'special_price'     => $dataWrapper->getSpecialPrice(),
            'special_from_date' => $dataWrapper->getSpecialFromDate(),
            'special_to_date'   => $dataWrapper->getSpecialToDate(),
            'attributes'        => $dataWrapper->getAttributes(),
            'attribute_set'     => $dataWrapper->getAttributeSet(),
            'image_collection'  => $imageCollection,
            'simple_collection' => $simpleCollection
        ]);
    }
}
