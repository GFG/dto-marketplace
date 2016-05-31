<?php

namespace GFG\DTOMarketplace\Context\Venture\PostPayment;

use GFG\DTOMarketplace\Context\Base;

class FailDelivery extends Base
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
                'reason'                => $item->getReason(),
                'reason_detail'         => $item->getReasonDetail(),
                'venture_order_item_id' => $item->getVentureOrderItemId(),
                'order_item_id'         => $item->getOrderItemId()
            ];
        }

        return $this->prepareExport([
            'venture_order_nr' => $dataWrapper->getVentureOrderNr(),
            'order_nr'         => $dataWrapper->getOrderNr(),
            'item_collection'  => $items
        ]);
    }
}
