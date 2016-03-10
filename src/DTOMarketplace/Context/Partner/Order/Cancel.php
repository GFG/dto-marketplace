<?php

namespace DTOMarketplace\Context\Partner\Order;

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
            'order_nr' => $dataWrapper->getOrderNr()
        ]);
    }
}
