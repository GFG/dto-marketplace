<?php

namespace GFG\DTOMarketplace\Context\Venture\Product;

use GFG\DTOMarketplace\Context\Base;

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
                'sku'         => $simple->getSku(),
                'partner_sku' => $simple->getPartnerSku(),
                'variation'   => $simple->getVariation(),
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
            'attributes'        => $dataWrapper->getAttributes(),
            'attribute_set'     => $dataWrapper->getAttributeSet(),
            'image_collection'  => $imageCollection,
            'simple_collection' => $simpleCollection,
            'status'            => $dataWrapper->getStatus(),
            'supplier_delivery_time' => $dataWrapper->getSupplierDeliveryTime(),
            'shipment_type' => $dataWrapper->getShipmentType(),
        ]);
    }
}
