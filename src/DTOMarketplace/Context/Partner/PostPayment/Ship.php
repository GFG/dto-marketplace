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

        return $this->prepareExport([
            'delivery_type'     => $dataWrapper->getDeliveryType(),
            'shipping_provider' => $dataWrapper->getShippingProvider(),
            'tracking_code'     => $dataWrapper->getTrackingCode(),
            'tracking_url'      => $dataWrapper->getTrackingUrl(),
            'nfe_key'           => $dataWrapper->getNfeKey(),
            'order_nr'          => $dataWrapper->getOrderNr(),
            'order_item_id'     => $dataWrapper->getOrderItemId()
        ]);
    }
}
