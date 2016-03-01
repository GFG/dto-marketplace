<?php

namespace DTOMarketplace\DataWrapper\PostPayment;

use Context\DataWrapper\BaseCollection;

class PostPaymentCollection extends BaseCollection
{
    public function getType()
    {
        return 'DTOMarketplace\DataWrapper\PostPayment\PostPayment';
    }

    public function toArray()
    {
        $export = array();

        foreach ($this as $postPayment) {
            $export[] = $postPayment;
        }

        return $export;
    }
}
