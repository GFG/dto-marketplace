<?php

namespace DTOMarketplace\Context\Venture\Order;

use Context\Context\Base;

class ConfirmPayment extends Base
{
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
