<?php

namespace GFG\DTOMarketplace\Context\Venture\Product;

use GFG\DTOMarketplace\Context\Base;

class UpdateImage extends Base
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
        $imageCollection = [];

        foreach ($dataWrapper->getImageCollection() as $image) {
            $imageCollection[] = [
                'position' => $image->getPosition(),
                'url'      => $image->getUrl()
            ];
        }

        return $this->prepareExport(
            [
                'sku'              => $dataWrapper->getSku(),
                'partner_sku'      => $dataWrapper->getPartnerSku(),
                'image_collection' => $imageCollection
            ]
        );
    }
}
