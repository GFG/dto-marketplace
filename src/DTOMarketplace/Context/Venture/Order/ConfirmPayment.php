<?php

namespace DTOMarketplace\Context\Venture\Order;

use DTOMarketplace\Context\BaseInContext;

class ConfirmPayment extends BaseInContext
{

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
            'venture_order_nr' => $dataWrapper->getVentureOrderNr()
        ]);
    }
}
