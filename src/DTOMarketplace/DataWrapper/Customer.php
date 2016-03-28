<?php

namespace GFG\DTOMarketplace\DataWrapper;

use GFG\DTOContext\DataWrapper\Base;

/**
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 * @method integer getIdCustomer()
 * @method string getEmail()
 * @method string getFirstName()
 * @method string getLastName()
 * @method string getDocument()
 * @method string getBirthday()
 * @method \GFG\DTOMarketplace\DataWrapper\Customer setIdCustomer(integer $idCustomer)
 * @method \GFG\DTOMarketplace\DataWrapper\Customer setEmail(string $email)
 * @method \GFG\DTOMarketplace\DataWrapper\Customer setFirstName(string $firstName)
 * @method \GFG\DTOMarketplace\DataWrapper\Customer setLastName(string $lastName)
 * @method \GFG\DTOMarketplace\DataWrapper\Customer setDocument(string $document)
 * @method \GFG\DTOMarketplace\DataWrapper\Customer setBirthday(string $birthday)
 */
class Customer extends Base
{
    private $email;
    private $firstName;
    private $lastName;
    private $document;
    private $birthday;
}
