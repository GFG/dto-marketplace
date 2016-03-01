<?php

namespace DTOMarketplace\Context\Venture\Order;

use DTOMarketplace\Context\BaseOutContext;

class ConfirmOrder extends BaseOutContext
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
        $dataWrapper    = $this->getDataWrapper();
        $itemCollection = [];

        foreach ($dataWrapper->getItemCollection() as $item) {
            $itemCollection[] = [
                'venture_id'    => $item->getVentureId(),
                'sku'           => $item->getSku(),
                'status'        => $item->getStatus(),
                'reason'        => $item->getReason(),
                'reason_detail' => $item->getReasonDetail()
            ];
        }

        return $this->prepareExport([
            'order_nr'         => $dataWrapper->getOrderNr(),
            'venture_order_nr' => $dataWrapper->getVentureOrderNr(),
            'status'           => $dataWrapper->getStatus(),
            'reason'           => $dataWrapper->getReason(),
            'reason_detail'    => $dataWrapper->getReasonDetail(),
            'item_collection'  => $itemCollection
        ]);
    }
}
