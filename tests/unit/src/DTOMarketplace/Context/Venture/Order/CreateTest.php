<?php

namespace DTOMarketplace\Context\Venture\Order;

use DTOMarketplace\DataWrapper\Mock as t;

class CreateTest extends \PHPUnit_Framework_TestCase
{
    private $context;

    public function setup()
    {
        $this->dw = t::mock('DTOMarketplace\DataWrapper\Order\Order');
        $this->context = new Create($this->dw);
    } 

    public function testExportContextData()
    {
        $customer        = t::mock('DTOMarketplace\DataWrapper\Customer');
        $shippingAddress = t::mock('DTOMarketplace\DataWrapper\Order\Address');
        $billingAddress  = t::mock('DTOMarketplace\DataWrapper\Order\Address');
        $item            = t::mock('DTOMarketplace\DataWrapper\Order\Item');

        //data
        $hash           = 'hash';
        $info           = null;

        //order
        $orderNr        = 123;
        $freightCost    = 10.00;
        $customer       = 1;

        //item
        $id             = 12;
        $sku            = 'sku';
        $price          = 100.00;

        //billingAddress
        $street         = 'Rua Direita';
        $number         = 1;
        $complement     = 'Apartamento 12';
        $city           = 'São Paulo';
        $postCode       = '01002001';
        $neighborhood   = 'centro';
        $regionCode     = 'SP';
        $phone          = '5000-4030';

        //shippingAddress
        $shippingStreet         = 'Rua Direita';
        $shippingNumber         = 1;
        $shippingComplement     = 'Apartamento 12';
        $shippingCity           = 'São Paulo';
        $shippingPostCode       = '01002001';
        $shippingNeighborhood   = 'centro';
        $shippingRegionCode     = 'SP';
        $shippingPhone          = '5000-4030';

        //customer
        $email                  = 'username@email.com';
        $firstName              = 'John';
        $lastName               = 'Armless';
        $document               = '0123098';
        $birthday               = '1990-01-01';

        $exportedData   = [
            'name' => 'iris.context.venture.order.create',
            'info' => $info,
            'hash' => $this->context->getHash(),
            'data' => [
                'order_nr'        => $orderNr,
                'freight_cost'    => $grandTotal,
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
                    'document'   => $lastName,
                ],
                'addresses' => [
                    'billing' => [
                        'street'        => $street,
                         'number'       => $number,
                         'complement'   => $complement,
                         'city'         => $city,
                         'postcode'     => $postCode,
                         'neighborhood' => $neighborhood,
                         'region_code'  => $regionCode,
                         'phone'        => $phone
                    ],

                    'shipping' => [
                        'street'        => $shippingStreet,
                         'number'       => $shippingNumber,
                         'complement'   => $shippingComplement,
                         'city'         => $shippingCity,
                         'postcode'     => $shippingPostCode,
                         'neighborhood' => $shippingNeighborhood,
                         'region_code'  => $shippingRegionCode,
                         'phone'        => $shippingPhone
                    ],
                ]
            ]
        ];

        $this->dw->method('getOrderNr')->willReturn($orderNr);
        $this->dw->method('getFreightCost')->willReturn($freightCost);
        $this->dw->method('getItemCollection')->willReturn([$item]);
        $this->dw->method('getCustomer')->willReturn($customer);
        $this->dw->method('getBillingAddress')->willReturn($billingAddress);
        $this->dw->method('getShippingAddress')->willReturn($shippingAddress);

        $this->assertSame($exportedData, $this->context->exportContextData());
    }
}
