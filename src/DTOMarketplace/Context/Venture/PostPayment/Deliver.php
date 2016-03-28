<?php

namespace GFG\DTOMarketplace\Context\Venture\PostPayment;

use GFG\DTOMarketplace\Context\Base;

class Deliver extends Base
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
        $dataWrapper = $this->getDataWrapper();
        $items = [];
        foreach ($dataWrapper->getItemCollection() as $item) {
            $items[] = [
                'venture_order_item_id' => $item->getVentureOrderItemId()
            ];
        }

        return $this->prepareExport([
            'venture_order_nr' => $dataWrapper->getVentureOrderNr(),
            'item_collection'  => $items
        ]);
    }
}
