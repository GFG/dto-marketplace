<?php

namespace GFG\DTOMarketplace\Context\Venture\Entity;

use GFG\DTOContext\DataWrapper\Mock;

class UpdateTest extends \PHPUnit_Framework_TestCase
{
    private $dw;
    private $context;

    public function setup()
    {
        $this->dw = Mock::create(
            'GFG\DTOMarketplace\DataWrapper\Venture', 
            $this
        );
        $this->context = new Update($this->dw);
    } 
    
    public function testGetHttpMethod()
    {
        $this->assertSame('put', $this->context->getHttpMethod());
    }

    public function testExportContextData()
    {
        $idIrisVenture = 1;
        $fkCatalogSupplier = 2;
        $ventureCode = 3;
        $id = 4;
        $email = 5;
        $companyName = 6;
        $shopName = 7;
        $phone = 8;
        $address1 = 9;
        $address2 = 10;
        $city = 11;
        $postcode = 12;
        $country = 13;
        $customercareEmail = 14;
        $customercareName = 15;
        $customercarePhone = 16;
        $customercareAddress1 = 17;
        $customercareAddress2 = 18;
        $customercareCity = 19;
        $customercarePostcode = 20;
        $customercareCountry = 21;
        $status = 22;

        $this->dw->method('getIdIrisVenture')->willReturn($idIrisVenture);
        $this->dw->method('getFkCatalogSupplier')->willReturn($fkCatalogSupplier);
        $this->dw->method('getVentureCode')->willReturn($ventureCode);
        $this->dw->method('getId')->willReturn($id);
        $this->dw->method('getEmail')->willReturn($email);
        $this->dw->method('getCompanyName')->willReturn($companyName);
        $this->dw->method('getShopName')->willReturn($shopName);
        $this->dw->method('getPhone')->willReturn($phone);
        $this->dw->method('getAddress1')->willReturn($address1);
        $this->dw->method('getAddress2')->willReturn($address2);
        $this->dw->method('getCity')->willReturn($city);
        $this->dw->method('getPostcode')->willReturn($postcode);
        $this->dw->method('getCountry')->willReturn($country);
        $this->dw->method('getCustomercareEmail')->willReturn($customercareEmail);
        $this->dw->method('getCustomercareName')->willReturn($customercareName);
        $this->dw->method('getCustomercarePhone')->willReturn($customercarePhone);
        $this->dw->method('getCustomercareAddress1')->willReturn($customercareAddress1);
        $this->dw->method('getCustomercareAddress2')->willReturn($customercareAddress2);
        $this->dw->method('getCustomercareCity')->willReturn($customercareCity);
        $this->dw->method('getCustomercarePostcode')->willReturn($customercarePostcode);
        $this->dw->method('getCustomercareCountry')->willReturn($customercareCountry);
        $this->dw->method('getStatus')->willReturn($status);

        $exportedData = [
            'name' => 'gfg.dtomarketplace.context.venture.entity.update',
            'info' => [],
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'id_iris_venture'       => $idIrisVenture,
                'fk_catalog_supplier'   => $fkCatalogSupplier,
                'venture_code'          => $ventureCode,
                'id'                    => $id,
                'email'                 => $email,
                'company_name'          => $companyName,
                'shop_name'             => $shopName,
                'phone'                 => $phone,
                'address1'              => $address1,
                'address2'              => $address2,
                'city'                  => $city,
                'postcode'              => $postcode,
                'country'               => $country,
                'customercare_email'    => $customercareEmail,
                'customercare_name'     => $customercareName,
                'customercare_phone'    => $customercarePhone,
                'customercare_address1' => $customercareAddress1,
                'customercare_address2' => $customercareAddress2,
                'customercare_city'     => $customercareCity,
                'customercare_postcode' => $customercarePostcode,
                'customercare_country'  => $customercareCountry,
                'status'                => $status
            ]
        ];

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
