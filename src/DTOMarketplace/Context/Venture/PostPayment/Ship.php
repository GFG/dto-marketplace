<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

use DTOMarketplace\Context\BaseOutContext;

class Ship extends BaseOutContext
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
                'tracking_code'         => $item->getTrackingCode(),
                'tracking_url'          => $item->getTrackingUrl(),
                'nfe_key'               => $item->getNfeKey(),
                'delivery_type'         => $item->getDeliveryType(),
                'shipping_provider'     => $item->getShippingProvider(),
                'venture_order_item_id' => $item->getVentureOrderItemId(),
                'reason'                => $item->getReason(),
                'reason_detail'         => $item->getReasonDetail()
            ];
        }

        return $this->prepareExport([
            'venture_order_nr' => $dataWrapper->getVentureOrderNr(),
            'item_collection'  => $items
        ]);
    }
}
