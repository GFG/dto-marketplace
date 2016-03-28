<?php

namespace GFG\DTOMarketplace\Context;

abstract class Factory extends \Context\Factory\Base
{
    const VENTURE_PRODUCT_CREATE           = 'venture.product.create';
    const VENTURE_PRODUCT_UPDATE           = 'venture.product.update';
    const VENTURE_PRODUCT_UPDATESTOCK      = 'venture.product.updatestock';
    const VENTURE_PRODUCT_UPDATEPRICE      = 'venture.product.updateprice';
    const VENTURE_PRODUCT_DELETE           = 'venture.product.delete';

    const PARTNER_PRODUCT_CONFIRMCREATE    = 'partner.product.confirmcreate';

    const PARTNER_ORDER_CREATE             = 'partner.order.create';
    const PARTNER_ORDER_CONFIRMPAYMENT     = 'partner.order.confirmpayment';
    const PARTNER_ORDER_CANCEL             = 'partner.order.cancel';

    const VENTURE_ORDER_CONFIRMORDER       = 'venture.order.confirmorder';

    const VENTURE_POSTPAYMENT_SHIP         = 'venture.postpayment.ship';
    const VENTURE_POSTPAYMENT_DELIVER      = 'venture.postpayment.deliver';
    const VENTURE_POSTPAYMENT_FAILDELIVERY = 'venture.postpayment.faildelivery';
    const VENTURE_POSTPAYMENT_CANCEL       = 'venture.postpayment.cancel';

    /**
     * @var array
     */
    protected static $mappedContext = [
        self::VENTURE_PRODUCT_CREATE           => 'Venture\Product\Create',
        self::VENTURE_PRODUCT_UPDATE           => 'Venture\Product\Update',
        self::VENTURE_PRODUCT_UPDATESTOCK      => 'Venture\Product\UpdateStock',
        self::VENTURE_PRODUCT_UPDATEPRICE      => 'Venture\Product\UpdatePrice',
        self::VENTURE_PRODUCT_DELETE           => 'Venture\Product\Delete',

        self::PARTNER_PRODUCT_CONFIRMCREATE    => 'Partner\Product\ConfirmCreate',

        self::PARTNER_ORDER_CREATE             => 'Partner\Order\Create',
        self::PARTNER_ORDER_CONFIRMPAYMENT     => 'Partner\Order\ConfirmPayment',
        self::PARTNER_ORDER_CANCEL             => 'Partner\Order\Cancel',

        self::VENTURE_ORDER_CONFIRMORDER       => 'Venture\Order\ConfirmPayment',

        self::VENTURE_POSTPAYMENT_SHIP         => 'Venture\PostPayment\Shipped',
        self::VENTURE_POSTPAYMENT_DELIVER      => 'Venture\PostPayment\Delivered',
        self::VENTURE_POSTPAYMENT_FAILDELIVERY => 'Venture\PostPayment\FailedDelivery',
        self::VENTURE_POSTPAYMENT_CANCEL       => 'Venture\PostPayment\Canceled',
    ];

    /**
     * {@inheritdoc}
     */
    public function getMappingList()
    {
        static $mappingList = null;

        if (!$mappingList) {
            $mappingList = array_map(function ($context) {
                return __NAMESPACE__ . '\\' . $context;
            }, self::$mappedContext);
        }

        return $mappingList;
    }
}
