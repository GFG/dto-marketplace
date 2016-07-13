<?php

namespace GFG\DTOMarketplace\DataWrapper;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method integer getIdIrisVenture()
 * @method integer getFkCatalogSupplier()
 * @method string getVentureCode()
 * @method integer getId()
 * @method string getEmail()
 * @method string getCompanyName()
 * @method string getShopName()
 * @method string getPhone()
 * @method string getAddress1()
 * @method string getAddress2()
 * @method string getCity()
 * @method string getPostcode()
 * @method string getCountry()
 * @method string getCustomercareEmail()
 * @method string getCustomercareName()
 * @method string getCustomercarePhone()
 * @method string getCustomercareAddress1()
 * @method string getCustomercareAddress2()
 * @method string getCustomercareCity()
 * @method string getCustomercarePostcode()
 * @method string getCustomercareCountry()
 * @method string getStatus()
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setIdIrisVenture(integer $idIrisVenture)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setFkCatalogSupplier(integer $fkCatalogSupplier)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setVentureCode(string $VentureCode)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setId(integer $id)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setEmail(string $email)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setCompanyName(string $companyName)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setShopName(string $shopName)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setPhone(string $phone)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setAddress1(string $address1)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setAddress2(string $address2)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setCity(string $city)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setPostcode(string $postcode)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setCountry(string $country)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setCustomercareEmail(string $customercareEmail)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setCustomercareName(string $customercareName)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setCustomercarePhone(string $customercarePhone)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setCustomercareAddress1(string $customercareAddress1)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setCustomercareAddress2(string $customercareAddress2)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setCustomercareCity(string $customercareCity)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setCustomercarePostcode(string $customercarePostcode)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setCustomercareCountry(string $customercareCountry)
 * @method \GFG\DTOMarketplace\DataWrapper\Venture setStatus(string $status)
 */
class Venture extends Base
{
    private $idIrisVenture;
    private $fkCatalogSupplier;
    private $ventureCode;
    // extra fields after sellercenter (Venture === Seller)
    private $id;
    private $email;
    private $companyName;
    private $shopName;
    private $phone;
    private $address1;
    private $address2;
    private $city;
    private $postcode;
    private $country;
    private $customercareEmail;
    private $customercareName;
    private $customercarePhone;
    private $customercareAddress1;
    private $customercareAddress2;
    private $customercareCity;
    private $customercarePostcode;
    private $customercareCountry;
    private $status;
}
