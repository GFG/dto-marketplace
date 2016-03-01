<?php

namespace DTOMarketplace\Context\Venture\Order;

class Cancel extends \Context\Context\Base
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
