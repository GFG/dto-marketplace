<?php

namespace DTOMarketplace\Context;

class Factory extends \Context\Factory\Base
{
    const VENTURE_PRODUCT_CREATE           = 'venture.product.create';
    const VENTURE_PRODUCT_UPDATE           = 'venture.product.update';
    const VENTURE_PRODUCT_UPDATE_STOCK     = 'venture.product.update.stock';
    const VENTURE_PRODUCT_UPDATE_PRICE     = 'venture.product.update.price';
    const VENTURE_PRODUCT_DELETE           = 'venture.product.delete';

    const PARTNER_PRODUCT_CREATE           = 'partner.product.create';
    const PARTNER_PRODUCT_UPDATE           = 'partner.product.update';
    const PARTNER_PRODUCT_UPDATE_STOCK     = 'partner.product.update.stock';
    const PARTNER_PRODUCT_UPDATE_PRICE     = 'partner.product.update.price';
    const PARTNER_PRODUCT_CONFIRM_CREATE   = 'partner.product.confirm.create';

    const PARTNER_ORDER_CREATE             = 'partner.order.create';
    const PARTNER_ORDER_CONFIRM_PAYMENT    = 'partner.order.confirm.payment';
    const PARTNER_ORDER_CANCEL             = 'partner.order.cancel';
    const PARTNER_ORDER_CONFIRM_ORDER      = 'partner.order.confirm.order';

    const VENTURE_ORDER_CREATE             = 'venture.order.create';
    const VENTURE_ORDER_CONFIRM_ORDER      = 'venture.order.confirm.order';
    const VENTURE_ORDER_CONFIRM_PAYMENT    = 'venture.order.confirm.payment';
    const VENTURE_ORDER_CANCEL             = 'venture.order.cancel';

    const VENTURE_POSTPAYMENT_SHIP         = 'venture.postpayment.ship';
    const VENTURE_POSTPAYMENT_DELIVER      = 'venture.postpayment.deliver';
    const VENTURE_POSTPAYMENT_FAILDELIVERY = 'venture.postpayment.faildelivery';
    const VENTURE_POSTPAYMENT_CANCEL       = 'venture.postpayment.cancel';

    const PARTNER_POSTPAYMENT_SHIP         = 'partner.postpayment.ship';
    const PARTNER_POSTPAYMENT_FAILDELIVERY = 'partner.postpayment.faildelivery';
    const PARTNER_POSTPAYMENT_DELIVER      = 'partner.postpayment.deliver';
    const PARTNER_POSTPAYMENT_CANCEL       = 'partner.postpayment.cancel';
    
    /**
     * @var array
     */
    protected static $mappedContext = [
        self::VENTURE_PRODUCT_CREATE           => __NAMESPACE__ . '\Venture\Product\Create',
        self::VENTURE_PRODUCT_UPDATE           => __NAMESPACE__ . '\Venture\Product\Update',
        self::VENTURE_PRODUCT_UPDATE_STOCK     => __NAMESPACE__ . '\Venture\Product\UpdateStock',
        self::VENTURE_PRODUCT_UPDATE_PRICE     => __NAMESPACE__ . '\Venture\Product\UpdatePrice',
        self::VENTURE_PRODUCT_DELETE           => __NAMESPACE__ . '\Venture\Product\Delete',
                                              
        self::PARTNER_PRODUCT_CREATE           => __NAMESPACE__ .  '\Partner\Product\Create',
        self::PARTNER_PRODUCT_UPDATE           => __NAMESPACE__ .  '\Partner\Product\Update',
        self::PARTNER_PRODUCT_UPDATE_STOCK     => __NAMESPACE__ .  '\Partner\Product\UpdateStock',
        self::PARTNER_PRODUCT_UPDATE_PRICE     => __NAMESPACE__ .  '\Partner\Product\UpdatePrice',
        self::PARTNER_PRODUCT_CONFIRM_CREATE   => __NAMESPACE__ .  '\Partner\Product\ConfirmCreate',
                                              
        self::PARTNER_ORDER_CREATE             => __NAMESPACE__ . '\Partner\Order\Create',
        self::PARTNER_ORDER_CONFIRM_PAYMENT    => __NAMESPACE__ .  '\Partner\Order\ConfirmPayment',
        self::PARTNER_ORDER_CANCEL             => __NAMESPACE__ .  '\Partner\Order\Cancel',
        self::PARTNER_ORDER_CONFIRM_ORDER      => __NAMESPACE__ .  '\Partner\Order\ConfirmOrder',
                                              
        self::VENTURE_ORDER_CREATE             => __NAMESPACE__ . '\Venture\Order\Create',
        self::VENTURE_ORDER_CONFIRM_ORDER      => __NAMESPACE__ . '\Venture\Order\ConfirmPayment',
        self::VENTURE_ORDER_CONFIRM_PAYMENT    => __NAMESPACE__ . '\Venture\Order\ConfirmOrder',
        self::VENTURE_ORDER_CANCEL             => __NAMESPACE__ . '\Venture\Order\Cancel',
                                              
        self::VENTURE_POSTPAYMENT_SHIP         => __NAMESPACE__ . '\Venture\PostPayment\Shipped',
        self::VENTURE_POSTPAYMENT_DELIVER      => __NAMESPACE__ . '\Venture\PostPayment\Delivered',
        self::VENTURE_POSTPAYMENT_FAILDELIVERY => __NAMESPACE__ . '\Venture\PostPayment\FailedDelivery',
        self::VENTURE_POSTPAYMENT_CANCEL       => __NAMESPACE__ . '\Venture\PostPayment\Canceled',
                                              
        self::PARTNER_POSTPAYMENT_SHIP         => __NAMESPACE__ . '\Partner\PostPayment\Shipped',
        self::PARTNER_POSTPAYMENT_FAILDELIVERY => __NAMESPACE__ . '\Partner\PostPayment\Delivered',
        self::PARTNER_POSTPAYMENT_DELIVER      => __NAMESPACE__ . '\Partner\PostPayment\FailedDelivery',
        self::PARTNER_POSTPAYMENT_CANCEL       => __NAMESPACE__ . '\Partner\PostPayment\Canceled'
     ];

    /**
     * {@inheritdoc}
     */
    protected function getMappingList()
    {
        return self::$mappedContext;
    }
}
