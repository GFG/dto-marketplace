<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

use DTOMarketplace\Context\BaseInContext;

class Deliver extends BaseInContext
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
                'order_item_id' => $item->getOrderItemId()
            ];
        }

        return $this->prepareExport([
            'order_nr'        => $dataWrapper->getOrderNr(),
            'item_collection' => $items
        ]);

    }
}
