<?php

namespace GFG\DTOMarketplace\Context\Partner\Order;

use GFG\DTOMarketplace\Context\Base;

class Cancel extends Base
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

        $itemCollection = [];

        foreach ($dataWrapper->getItemCollection() as $item) {
            $itemCollection[] = [
                'id'    => $item->getId(),
            ];
        }

        return $this->prepareExport([
            'order_nr'          => $dataWrapper->getOrderNr(),
            'venture_order_nr'  => $dataWrapper->getVentureOrderNr(),
            'item_collection'   => $itemCollection,
        ]);
    }
}
