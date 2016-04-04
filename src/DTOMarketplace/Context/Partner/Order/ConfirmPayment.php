<?php

namespace GFG\DTOMarketplace\Context\Partner\Order;

use GFG\DTOMarketplace\Context\Base;

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
            'order_nr'          => $dataWrapper->getOrderNr(),
            'venture_order_nr'  => $dataWrapper->getVentureOrderNr()
        ]);
    }
}
