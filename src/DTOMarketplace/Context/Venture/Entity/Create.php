<?php

namespace GFG\DTOMarketplace\Context\Venture\Entity;

use GFG\DTOMarketplace\Context\Base;

class Create extends Base
{
    /**
     * {@inheritdoc}
     */
    public function getHttpMethod()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function exportContextData()
    {
        $dataWrapper = $this->getDataWrapper();

        return $this->prepareExport([
            'id_iris_venture'       => $dataWrapper->getIdIrisVenture(),
            'fk_catalog_supplier'   => $dataWrapper->getFkCatalogSupplier(),
            'venture_code'          => $dataWrapper->getVentureCode(),
            // extra fields after sellercenter (Venture === Seller)
            'id'                    => $dataWrapper->getId(),
            'email'                 => $dataWrapper->getEmail(),
            'company_name'          => $dataWrapper->getCompanyName(),
            'shop_name'             => $dataWrapper->getShopName(),
            'phone'                 => $dataWrapper->getPhone(),
            'address1'              => $dataWrapper->getAddress1(),
            'address2'              => $dataWrapper->getAddress2(),
            'city'                  => $dataWrapper->getCity(),
            'postcode'              => $dataWrapper->getPostcode(),
            'country'               => $dataWrapper->getCountry(),
            'customercare_email'    => $dataWrapper->getCustomercareEmail(),
            'customercare_name'     => $dataWrapper->getCustomercareName(),
            'customercare_phone'    => $dataWrapper->getCustomercarePhone(),
            'customercare_address1' => $dataWrapper->getCustomercareAddress1(),
            'customercare_address2' => $dataWrapper->getCustomercareAddress2(),
            'customercare_city'     => $dataWrapper->getCustomercareCity(),
            'customercare_postcode' => $dataWrapper->getCustomercarePostcode(),
            'customercare_country'  => $dataWrapper->getCustomercareCountry(),
            'status'                => $dataWrapper->getStatus()
        ]);
    }
}
