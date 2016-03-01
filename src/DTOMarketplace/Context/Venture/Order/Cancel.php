<?php

namespace DTOMarketplace\Context\Venture\Order;

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
            'venture_order_nr' => $dataWrapper->getVentureOrderNr()
        ]);
    }
}
