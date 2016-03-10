<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

use DTOMarketplace\Context\BaseInContext;

class Ship extends BaseInContext
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
                'tracking_code'     => $item->getTrackingCode(),
                'tracking_url'      => $item->getTrackingUrl(),
                'nfe_key'           => $item->getNfeKey(),
                'delivery_type'     => $item->getDeliveryType(),
                'shipping_provider' => $item->getShippingProvider(),
                'order_item_id'     => $item->getOrderItemId(),
                'reason'            => $item->getReason(),
                'reason_detail'     => $item->getReasonDetail()
            ];
        }

        return $this->prepareExport([
            'order_nr'        => $dataWrapper->getOrderNr(),
            'item_collection' => $items
        ]);

    }
}
