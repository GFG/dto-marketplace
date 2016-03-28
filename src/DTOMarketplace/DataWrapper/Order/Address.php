<?php

namespace GFG\DTOMarketplace\DataWrapper\Order;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method string getStreet()
 * @method integer getNumber()
 * @method string getComplement()
 * @method string getCity()
 * @method string getPostcode(),
 * @method string getNeighborhood()
 * @method string getRegionCode()
 * @method string getPhone()
 * @method \DTOMarketplace\DataWrapper\Order\Address setStreet(string $street)
 * @method \DTOMarketplace\DataWrapper\Order\Address setNumber(integer $number)
 * @method \DTOMarketplace\DataWrapper\Order\Address setComplement(string $complement)
 * @method \DTOMarketplace\DataWrapper\Order\Address setCity(string $city)
 * @method \DTOMarketplace\DataWrapper\Order\Address setPostcode(string $postcode)
 * @method \DTOMarketplace\DataWrapper\Order\Address setNeighborhood(string $neighborhood)
 * @method \DTOMarketplace\DataWrapper\Order\Address setRegionCode(string $regionCode)
 * @method \DTOMarketplace\DataWrapper\Order\Address setPhone(string $phone)
 */
class Address extends Base
{
    private $street;
    private $number;
    private $complement;
    private $city;
    private $postcode;
    private $neighborhood;
    private $regionCode;
    private $phone;
}
