<?php

namespace GFG\DTOMarketplace\Context\Venture\Product;

use GFG\DTOMarketplace\Context\Base;
use GFG\DTOMarketplace\DataWrapper\Catalog\Simple;

class Create extends Base
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

        /** @var Simple $simple */
        foreach ($dataWrapper->getSimpleCollection() as $simple) {
            $simpleCollection[] = [
                'sku'         => $simple->getSku(),
                'partner_sku' => $simple->getPartnerSku(),
                'venture_product_id' => $simple->getVentureProductId(),
                'variation'   => $simple->getVariation(),
                'quantity'    => $simple->getQuantity(),
                'ean'         => $simple->getEan(),
                'attributes'  => $simple->getAttributes()
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
            'partner_sku'       => $dataWrapper->getPartnerSku(),
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
