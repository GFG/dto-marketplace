<?php

namespace DTOMarketplace\Context\Venture\Order;

use Context\DataWrapper\Mock;

class CreateTest extends \PHPUnit_Framework_TestCase
{
    private $context;

    public function setup()
    {
        $this->dw      = Mock::mock(
            'DTOMarketplace\DataWrapper\Order\Order',
            $this
        );
        $this->context = new Create($this->dw);
    } 

    public function testExportContextData()
    {
        $customer        = Mock::mock(
            'DTOMarketplace\DataWrapper\Customer', 
            $this
        );
        $shippingAddress = Mock::mock(
            'DTOMarketplace\DataWrapper\Order\Address', 
            $this
        );
        $billingAddress  = Mock::mock(
            'DTOMarketplace\DataWrapper\Order\Address', 
            $this
        );
        $item           = Mock::mock(
            'DTOMarketplace\DataWrapper\Order\Item', 
            $this
        );
                        
        //data
        $hash         = 'hash';
        $info         = null;

        //order
        $orderNr      = 123;
        $freightCost  = 10.00;

        //item
        $id           = 12;
        $sku          = 'sku';
        $price        = 100.00;

        //Address
        $street       = 'Rua Direita';
        $number       = 1;
        $complement   = 'Apartamento 12';
        $city         = 'São Paulo';
        $postCode     = '01002001';
        $neighborhood = 'centro';
        $regionCode   = 'SP';
        $phone        = '5000-4030';

        //customer
        $email        = 'username@email.com';
        $firstName    = 'John';
        $lastName     = 'Armless';
        $document     = '0123098';
        $birthday     = '1990-01-01';

        $exportedData   = [
            'name' => 'dtomarketplace.context.venture.order.create',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data_wrapper' => get_class($this->dw),
            'data' => [
                'order_nr'        => $orderNr,
                'freight_cost'    => $freightCost,
                'item_collection' => [
                    [
                        'id'    => $id,
                        'sku'   => $sku,
                        'price' => $price
                    ]
                ],
                'customer'        => [
                    'email'      => $email,
                    'first_name' => $firstName,
                    'last_name'  => $lastName,
                    'document'   => $document,
                    'birthday'   => $birthday
                ],
                'shipping_address' => [
                    'street'        => $street,
                        'number'       => $number,
                        'complement'   => $complement,
                        'city'         => $city,
                        'postcode'     => $postCode,
                        'neighborhood' => $neighborhood,
                        'region_code'  => $regionCode,
                        'phone'        => $phone
                ],
                'billing_address' => [
                    'street'        => $street,
                    'number'       => $number,
                    'complement'   => $complement,
                    'city'         => $city,
                    'postcode'     => $postCode,
                    'neighborhood' => $neighborhood,
                    'region_code'  => $regionCode,
                    'phone'        => $phone
                ]
            ]
        ];

        $customer->method('getEmail')->willReturn($email);
        $customer->method('getFirstName')->willReturn($firstName);
        $customer->method('getLastName')->willReturn($lastName);
        $customer->method('getBirthday')->willReturn($birthday);
        $customer->method('getDocument')->willReturn($document);

        $item->method('getId')->willReturn($id);
        $item->method('getSku')->willReturn($sku);
        $item->method('getPrice')->willReturn($price);

        $billingAddress->method('getStreet')->willReturn($street);
        $billingAddress->method('getNumber')->willReturn($number);
        $billingAddress->method('getComplement')->willReturn($complement);
        $billingAddress->method('getCity')->willReturn($city);
        $billingAddress->method('getPostCode')->willReturn($postCode);
        $billingAddress->method('getNeighborhood')->willReturn($neighborhood);
        $billingAddress->method('getRegionCode')->willReturn($regionCode);
        $billingAddress->method('getPhone')->willReturn($phone);

        $shippingAddress->method('getStreet')->willReturn($street);
        $shippingAddress->method('getNumber')->willReturn($number);
        $shippingAddress->method('getComplement')->willReturn($complement);
        $shippingAddress->method('getCity')->willReturn($city);
        $shippingAddress->method('getPostcode')->willReturn($postCode);
        $shippingAddress->method('getNeighborhood')->willReturn($neighborhood);
        $shippingAddress->method('getRegionCode')->willReturn($regionCode);
        $shippingAddress->method('getPhone')->willReturn($phone);

        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->dw->method('getFreightCost')->willReturn($freightCost);
        $this->dw->method('getItemCollection')->willReturn([$item]);
        $this->dw->method('getCustomer')->willReturn($customer);
        $this->dw->method('getBillingAddress')->willReturn($billingAddress);
        $this->dw->method('getShippingAddress')->willReturn($shippingAddress);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }

    public function testGetHttpMethod()
    {
        $this->assertSame('post', $this->context->getHttpMethod());
    }
}
