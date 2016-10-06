<?php

namespace GFG\DTOMarketplace\Context\Partner\Order;

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
        $dataWrapper         = $this->getDataWrapper();
        $itemCollection      = [];
        $customerData        = $dataWrapper->getCustomer();
        $shippingAddressData = $dataWrapper->getShippingAddress();
        $billingAddressData  = $dataWrapper->getBillingAddress();

        $customer = [
            'email'       => $customerData->getEmail(),
            'first_name'  => $customerData->getFirstName(),
            'last_name'   => $customerData->getLastName(),
            'document'    => $customerData->getDocument(),
            'birthday'    => $customerData->getBirthday()
        ];

        $shippingAddress = [
            'street'        => $shippingAddressData->getStreet(),
            'number'        => $shippingAddressData->getNumber(),
            'complement'    => $shippingAddressData->getComplement(),
            'city'          => $shippingAddressData->getCity(),
            'postcode'      => $shippingAddressData->getPostcode(),
            'neighborhood'  => $shippingAddressData->getNeighborhood(),
            'region_code'   => $shippingAddressData->getRegionCode(),
            'phone'         => $shippingAddressData->getPhone(),
            'phone2'         => $billingAddressData->getPhone2(),
        ];

        $billingAddress = [
            'street'        => $billingAddressData->getStreet(),
            'number'        => $billingAddressData->getNumber(),
            'complement'    => $billingAddressData->getComplement(),
            'city'          => $billingAddressData->getCity(),
            'postcode'      => $billingAddressData->getPostcode(),
            'neighborhood'  => $billingAddressData->getNeighborhood(),
            'region_code'   => $billingAddressData->getRegionCode(),
            'phone'         => $billingAddressData->getPhone(),
            'phone2'         => $billingAddressData->getPhone2(),
        ];

        foreach ($dataWrapper->getItemCollection() as $item) {
            $itemCollection[] = [
                'id'    => $item->getId(),
                'sku'   => $item->getSku(),
                'price' => $item->getPrice(),
                'unit_price' => $item->getUnitPrice(),
                'tax_amount' => $item->getTaxAmount(),
                'tax_percent' => $item->getTaxPercent(),
                'shipment_type' => $item->getShipmentType(),
                'shipment_date' => $item->getShipmentDate(),
                'shipment_fee' => $item->getShipmentFee(),
                'supplier_delivery_time' => $item->getSupplierDeliveryTime(),
                'seller_id' => $item->getSellerId(),
                'sku_supplier' => $item->getSkuSupplier(),
            ];
        }

        return $this->prepareExport([
            'order_nr'         => $dataWrapper->getOrderNr(),
            'payment_method'   => $dataWrapper->getPaymentMethod(),
            'voucher_code'     => $dataWrapper->getVoucherCode(),
            'gift_option'      => $dataWrapper->getGiftOption(),
            'gift_message'     => $dataWrapper->getGiftMessage(),
            'created_at'       => $dataWrapper->getCreatedAt(),
            'freight_cost'     => $dataWrapper->getFreightCost(),
            'item_collection'  => $itemCollection,
            'customer'         => $customer,
            'shipping_address' => $shippingAddress,
            'billing_address'  => $billingAddress
        ]);
    }
}
