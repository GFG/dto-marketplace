<?php

namespace DTOMarketplace\Context\Partner\Order;

use Context\Context\Base;

class BindVentureOrder extends Base
{
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
