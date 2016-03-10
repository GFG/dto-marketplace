<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

use DTOMarketplace\Context\BaseInContext;

class FailDelivery extends BaseInContext
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
                'reason'        => $item->getReason(),
                'reason_detail' => $item->getReasonDetail(),
                'order_item_id' => $item->getOrderItemId()
            ];
        }

        return $this->prepareExport([
            'order_nr'        => $dataWrapper->getOrderNr(),
            'item_collection' => $items
        ]);
    }
}
