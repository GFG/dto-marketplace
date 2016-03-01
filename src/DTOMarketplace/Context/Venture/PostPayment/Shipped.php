<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

use DTOMarketplace\Context\BaseOutContext;

class Shipped extends BaseOutContext
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
            'delivery_type'         => $dataWrapper->getDeliveryType(),
            'shipping_provider'     => $dataWrapper->getShippingProvider(),
            'tracking_code'         => $dataWrapper->getTrackingCode(),
            'tracking_url'          => $dataWrapper->getTrackingUrl(),
            'nfe_key'               => $dataWrapper->getNfeKey(),
            'venture_order_nr'      => $dataWrapper->getVentureOrderNr(),
            'venture_order_item_id' => $dataWrapper->getVentureOrderItemId()
        ]);
    }
}
