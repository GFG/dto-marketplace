<?php

namespace DTOMarketplace\Context\Partner\Order;

use DTOMarketplace\Context\BaseInContext;

class ConfirmOrder extends BaseInContext
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
            'order_nr'         => $dataWrapper->getOrderNr(),
            'venture_order_nr' => $dataWrapper->getVentureOrderNr()
        ]);
    }
}
