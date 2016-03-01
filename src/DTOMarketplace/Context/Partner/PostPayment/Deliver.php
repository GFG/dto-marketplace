<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

use DTOMarketplace\Context\BaseOutContext;

class Deliver extends BaseInContext
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
            'order_nr'  => $dataWrapper->getOrderNr(),
            'order_item_id' => $dataWrapper->getOrderItemId()
        ]);
    }
}
