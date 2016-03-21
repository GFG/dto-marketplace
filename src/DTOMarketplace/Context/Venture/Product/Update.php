<?php

namespace DTOMarketplace\Context\Venture\Product;

use DTOMarketplace\Context\Base;

class Update extends Base
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
                'sku'        => $simple->getSku(),
                'variation'  => $simple->getVariation(),
                'ean'        => $simple->getEan()
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
            'attributes'        => $dataWrapper->getAttributes(),
            'attribute_set'     => $dataWrapper->getAttributeSet(),
            'image_collection'  => $imageCollection,
            'simple_collection' => $simpleCollection,
            'status'            => $dataWrapper->getStatus()
        ]);

    }
}
