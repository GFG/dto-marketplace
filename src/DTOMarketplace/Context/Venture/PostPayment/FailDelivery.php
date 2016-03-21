<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

use DTOMarketplace\Context\Base;

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
                'venture_order_item_id' => $item->getVentureOrderItemId()
            ];
        }

        return $this->prepareExport([
            'venture_order_nr' => $dataWrapper->getVentureOrderNr(),
            'item_collection'  => $items
        ]);
    }
}
