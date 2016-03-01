<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

use Context\Context\Base;

class Delivered extends Base
{
    /**
     * {@inheritdoc}
     */
    public function exportContextData()
    {
        $dataWrapper = $this->getDataWrapper();

        return $this->prepareExport([
            'order_nr'  => $dataWrapper->getOrderNr(),
            'order_item_id' => $dataWrapper->getOrderItemId()
        ]);
    }
}
