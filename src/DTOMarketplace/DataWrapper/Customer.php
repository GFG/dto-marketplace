<?php

namespace DTOMarketplace\DataWrapper;

use Context\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method integer getIdCustomer()
 * @method string getEmail()
 * @method string getFirstName()
 * @method string getLastName()
 * @method string getDocument()
 * @method string getBirthday()
 * @method \DTOMarketplace\DataWrapper\Customer setIdCustomer(integer $idCustomer)
 * @method \DTOMarketplace\DataWrapper\Customer setEmail(string $email)
 * @method \DTOMarketplace\DataWrapper\Customer setFirstName(string $firstName)
 * @method \DTOMarketplace\DataWrapper\Customer setLastName(string $lastName)
 * @method \DTOMarketplace\DataWrapper\Customer setDocument(string $document)
 * @method \DTOMarketplace\DataWrapper\Customer setBirthday(string $birthday)
 */
class Customer extends Base
{
    private $email;
    private $firstName;
    private $lastName;
    private $document;
    private $birthday;
}
