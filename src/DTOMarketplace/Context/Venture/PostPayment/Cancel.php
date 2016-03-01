<?php

namespace DTOMarketplace\Context\Venture\PostPayment;

use DTOMarketplace\Context\BaseOutContext;

class Cancel extends BaseOutContext
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
            'reason'                => $dataWrapper->getReason(),
            'reason_detail'         => $dataWrapper->getReasonDetail(),
            'venture_order_nr'      => $dataWrapper->getVentureOrderNr(),
            'venture_order_item_id' => $dataWrapper->getVentureOrderItemId()
        ]);
    }
}
