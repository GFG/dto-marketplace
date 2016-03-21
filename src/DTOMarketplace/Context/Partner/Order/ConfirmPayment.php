<?php

namespace DTOMarketplace\Context\Partner\Order;

use DTOMarketplace\Context\Base;

class ConfirmPayment extends Base
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
            'order_nr' => $dataWrapper->getOrderNr()
        ]);
    }
}
