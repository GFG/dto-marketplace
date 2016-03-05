<?php

namespace DTOMarketplace\Context\Partner\PostPayment;

use DTOMarketplace\Context\BaseInContext;

class Cancel extends BaseInContext
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
            'order_nr'      => $dataWrapper->getOrderNr(),
            'order_item_id' => $dataWrapper->getOrderItemId(),
            'reason'        => $dataWrapper->getReason(),
            'reason_detail' => $dataWrapper->getReasonDetail()
        ]);
    }
}
