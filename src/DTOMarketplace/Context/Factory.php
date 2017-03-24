<?php

namespace GFG\DTOMarketplace\Context;

abstract class Factory extends \GFG\DTOContext\Factory\Base
{
    const VENTURE_PRODUCT_CREATE           = 'venture.product.create';
    const VENTURE_PRODUCT_UPDATE           = 'venture.product.update';
    const VENTURE_PRODUCT_RECATEGORIZATION = 'venture.product.recategorization';

    const VENTURE_PRODUCT_UPDATESTOCK      = 'venture.product.updatestock';
    const VENTURE_PRODUCT_UPDATEPRICE      = 'venture.product.updateprice';
    const VENTURE_PRODUCT_UPDATEIMAGE      = 'venture.product.updateimage';
    const VENTURE_PRODUCT_DELETE           = 'venture.product.delete';
    const VENTURE_PRODUCT_GET              = 'venture.product.get';

    const PARTNER_PRODUCT_CONFIRMCREATE    = 'partner.product.confirmcreate';

    const PARTNER_ORDER_CREATE             = 'partner.order.create';
    const PARTNER_ORDER_CONFIRMPAYMENT     = 'partner.order.confirmpayment';
    const PARTNER_ORDER_CANCEL             = 'partner.order.cancel';

    const VENTURE_ORDER_CONFIRMORDER       = 'venture.order.confirmorder';

    const VENTURE_POSTPAYMENT_HANDLED      = 'venture.postpayment.handled';
    const VENTURE_POSTPAYMENT_READYTOSHIP  = 'venture.postpayment.readytoship';
    const VENTURE_POSTPAYMENT_SHIP         = 'venture.postpayment.ship';
    const VENTURE_POSTPAYMENT_DELIVER      = 'venture.postpayment.deliver';
    const VENTURE_POSTPAYMENT_FAILDELIVERY = 'venture.postpayment.faildelivery';
    const VENTURE_POSTPAYMENT_CANCEL       = 'venture.postpayment.cancel';
    const VENTURE_POSTPAYMENT_RETURNED     = 'venture.postpayment.returned';
    const VENTURE_POSTPAYMENT_RETURNREJECTED = 'venture.postpayment.returnrejected';
    const VENTURE_POSTPAYMENT_INTERMEDIATESTATUS = 'venture.postpayment.intermediatestatus';

    const VENTURE_ENTITY_GET               = 'venture.entity.get';
    const VENTURE_ENTITY_CREATE            = 'venture.entity.create';
    const VENTURE_ENTITY_UPDATE            = 'venture.entity.update';

    /**
     * @var array
     */
    protected static $mappedContext = [
        self::VENTURE_PRODUCT_CREATE           => 'Venture\Product\Create',
        self::VENTURE_PRODUCT_UPDATE           => 'Venture\Product\Update',
        self::VENTURE_PRODUCT_RECATEGORIZATION => 'Venture\Product\Recategorization',
        self::VENTURE_PRODUCT_UPDATESTOCK      => 'Venture\Product\UpdateStock',
        self::VENTURE_PRODUCT_UPDATEPRICE      => 'Venture\Product\UpdatePrice',
        self::VENTURE_PRODUCT_UPDATEIMAGE      => 'Venture\Product\UpdateImage',
        self::VENTURE_PRODUCT_DELETE           => 'Venture\Product\Delete',
        self::VENTURE_PRODUCT_GET              => 'Venture\Product\Get',

        self::PARTNER_PRODUCT_CONFIRMCREATE    => 'Partner\Product\ConfirmCreate',

        self::PARTNER_ORDER_CREATE             => 'Partner\Order\Create',
        self::PARTNER_ORDER_CONFIRMPAYMENT     => 'Partner\Order\ConfirmPayment',
        self::PARTNER_ORDER_CANCEL             => 'Partner\Order\Cancel',

        self::VENTURE_ORDER_CONFIRMORDER       => 'Venture\Order\ConfirmOrder',

        self::VENTURE_POSTPAYMENT_HANDLED      => 'Venture\PostPayment\Handled',
        self::VENTURE_POSTPAYMENT_READYTOSHIP  => 'Venture\PostPayment\ReadyToShip',
        self::VENTURE_POSTPAYMENT_SHIP         => 'Venture\PostPayment\Ship',
        self::VENTURE_POSTPAYMENT_DELIVER      => 'Venture\PostPayment\Deliver',
        self::VENTURE_POSTPAYMENT_FAILDELIVERY => 'Venture\PostPayment\FailDelivery',
        self::VENTURE_POSTPAYMENT_CANCEL       => 'Venture\PostPayment\Cancel',
        self::VENTURE_POSTPAYMENT_RETURNED     => 'Venture\PostPayment\Returned',
        self::VENTURE_POSTPAYMENT_RETURNREJECTED => 'Venture\PostPayment\ReturnRejected',
        self::VENTURE_POSTPAYMENT_INTERMEDIATESTATUS => 'Venture\PostPayment\IntermediateStatus',

        self::VENTURE_ENTITY_GET               => 'Venture\Entity\Get',
        self::VENTURE_ENTITY_CREATE            => 'Venture\Entity\Create',
        self::VENTURE_ENTITY_UPDATE            => 'Venture\Entity\Update'
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
