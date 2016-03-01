<?php

namespace DTOMarketplace\Context\Partner\Order;

class CreateTest extends \PHPUnit_Framework_TestCase
{
    private $context;

    public function setup()
    {
        $this->dw = $this->getMockBuilder('DTOMarketplace\DataWrapper\Order\Order')
            ->setMethods([
                'toArray',
                'getItemCollection',
                'getOrderNr',
                'getGrandTotal',
                'getCreatedAt',
                'getShippingAmount',
                'getBillingAddress',
                'getShippingAddress',
                'getFreightCost',
                'getCustomer'
            ])
            ->getMock();

        $this->context = new Create($this->dw);
    } 

    public function testExportContextData()
    {
        $hash           = 'hash';
        $info           = null;
        $orderNr        = 123;
        $grandTotal     = 100.0;
        $createdAt      = '2016-01-01 00:00:01';
        $shippingAmount = 2;
        $address        = 'Rua Direita, 1';
        $freightCost    = 10.00;
        $sku            = 'simple sku';
        $id             = 1;
        $price          = 10.00;

        //items
        $item = $this->getMockBuilder('DTOMarketplace\DataWrapper\Order\Order\Item')
            ->setMethods([
                'getIdSalesOrderItem',
                'getSku',
                'getPrice'
            ])
            ->getMock();

        $item->method('getId')->willReturn($idSalesOrderItem);
        $item->method('getSku')->willReturn($sku);
        $item->method('getPrice')->willReturn($price);

        $itemCollection = [$item];

        $expectedItemCollection[] = [
                'id_sales_order_item' => $idSalesOrderItem,
                'sku'                 => $sku,
                'price'               => $price
            ];
        //\items

        //addresses
        $firstName    = 'Shipping';
        $lastName     = 'Address';
        $street       = 'Rua da Glória';
        $streetNumber = '1';
        $complement   = 'Complemento';
        $city         = 'São Paulo';
        $postCode     = '04327-130';
        $neighborhood = 'Centro';
        $regionCode   = 'SP';
        $phone        = '99999-9999';

        $shippingAddressDataWrapper = $this->getMockBuilder('DTOMarketplace\DataWrapper\Order\Order\Address')
            ->disableOriginalConstructor()
            ->setMethods([
                'getFirstName',
                'getLastName',
                'getStreet',
                'getNumber',
                'getComplement',
                'getCity',
                'getPostCode',
                'getNeighborhood',
                'getRegionCode',
                'getPhone',
            ])
            ->getMock();

        $shippingAddressDataWrapper->method('getFirstName')->willReturn($firstName);
        $shippingAddressDataWrapper->method('getLastName')->willReturn($lastName);
        $shippingAddressDataWrapper->method('getStreet')->willReturn($street);
        $shippingAddressDataWrapper->method('getNumber')->willReturn($streetNumber);
        $shippingAddressDataWrapper->method('getComplement')->willReturn($complement);
        $shippingAddressDataWrapper->method('getCity')->willReturn($city);
        $shippingAddressDataWrapper->method('getPostCode')->willReturn($postCode);
        $shippingAddressDataWrapper->method('getRegionCode')->willReturn($regionCode);
        $shippingAddressDataWrapper->method('getNeighborhood')->willReturn($neighborhood);
        $shippingAddressDataWrapper->method('getPhone')->willReturn($phone);

        $shippingAddress = [
            'first_name'    => $firstName,
            'last_name'     => $lastName,
            'street'        => $street,
            'street_number' => $streetNumber,
            'complement'    => $complement,
            'city'          => $city,
            'postcode'      => $postCode,
            'neighborhood'  => $neighborhood,
            'region_code'   => $regionCode,
            'phone'         => $phone
        ];

        $billingAddressDataWrapper = $this->getMockBuilder('DTOMarketplace\DataWrapper\Order\Order\Address')
            ->disableOriginalConstructor()
            ->setMethods([
                'getFirstName',
                'getLastName',
                'getStreet',
                'getNumber',
                'getComplement',
                'getCity',
                'getPostCode',
                'getNeighborhood',
                'getRegionCode',
                'getPhone',
            ])
            ->getMock();

        $firstName = 'Billing';

        $billingAddressDataWrapper->method('getFirstName')->willReturn($firstName);
        $billingAddressDataWrapper->method('getLastName')->willReturn($lastName);
        $billingAddressDataWrapper->method('getStreet')->willReturn($street);
        $billingAddressDataWrapper->method('getNumber')->willReturn($streetNumber);
        $billingAddressDataWrapper->method('getComplement')->willReturn($complement);
        $billingAddressDataWrapper->method('getCity')->willReturn($city);
        $billingAddressDataWrapper->method('getPostCode')->willReturn($postCode);
        $billingAddressDataWrapper->method('getRegionCode')->willReturn($regionCode);
        $billingAddressDataWrapper->method('getNeighborhood')->willReturn($neighborhood);
        $billingAddressDataWrapper->method('getPhone')->willReturn($phone);

        $billingAddress = [
            'first_name'    => $firstName,
            'last_name'     => $lastName,
            'street'        => $street,
            'street_number' => $streetNumber,
            'complement'    => $complement,
            'city'          => $city,
            'postcode'      => $postCode,
            'neighborhood'  => $neighborhood,
            'region_code'   => $regionCode,
            'phone'         => $phone
        ];

        //\addresses

        //customer
        $email      = 'email@site.com';
        $idCustomer = 1;
        $firstName  = 'John';
        $lastName   = 'Armless';
        $document   = '810.857.546-00';
        $birthday   = '01-01-1991';

        $customerDataWrapper = $this->getMockBuilder('DTOMarketplace\DataWrapper\Customer')
            ->disableOriginalConstructor()
            ->setMethods([
                'getIdCustomer',
                'getEmail',
                'getFirstName',
                'getLastName',
                'getDocument',
                'getBirthday',
            ])
            ->getMock();

        $customerDataWrapper->method('getIdCustomer')->willReturn($idCustomer);
        $customerDataWrapper->method('getEmail')->willReturn($email);
        $customerDataWrapper->method('getFirstName')->willReturn($firstName);
        $customerDataWrapper->method('getLastName')->willReturn($lastName);
        $customerDataWrapper->method('getDocument')->willReturn($document);
        $customerDataWrapper->method('getBirthday')->willReturn($birthday);

        $customer = [
            'id_customer' => $idCustomer,
            'email'       => $email, 
            'first_name'  => $firstName,
            'last_name'   => $lastName,
            'document'    => $document,
            'birthday'    => $birthday
        ];
        //\customer

        $exportedData   = [
            'name' => 'iris.context.partner.order.create',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'order_nr'        => $orderNr,
                'grand_total'     => $grandTotal,
                'created_at'      => $createdAt,
                'shipping_amount' => $shippingAmount,
                'freight_cost'    => $freightCost,
                'item_collection' => $expectedItemCollection,
                'customer'        => $customer,
                'addresses'       => [
                    'shipping' => $shippingAddress, 
                    'billing'  => $billingAddress 
                ]
            ]
        ];

        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->dw->method('getGrandTotal')->willReturn($grandTotal);
        $this->dw->method('getCreatedAt')->willReturn($createdAt);
        $this->dw->method('getShippingAmount')->willReturn($shippingAmount);
        $this->dw->method('getShippingAddress')->willReturn($shippingAddressDataWrapper);
        $this->dw->method('getBillingAddress')->willReturn($billingAddressDataWrapper);
        $this->dw->method('getFreightCost')->willReturn($freightCost);
        $this->dw->method('getCustomer')->willReturn($customerDataWrapper);
        $this->dw->method('getItemCollection')->willReturn($itemCollection);

        $this->assertSame(
            $exportedData,
            $this->context->exportContextData()
        );
    }
}
