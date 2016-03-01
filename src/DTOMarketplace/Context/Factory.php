<?php

namespace DtoMarketplace\Context;

use Context\DataWrapper;
use Context;
use Context\Validator;

class Factory implements \Context\Factory\FactoryInterface
{
    //product
    const VENTURE_CREATE_PRODUCT_ON_PARTNER                 = 1;
    const VENTURE_UPDATE_PRODUCT_ON_PARTNER                 = 2;
    const VENTURE_UPDATE_STOCK_ON_PARTNER                   = 3;
    const VENTURE_UPDATE_PRICE_ON_PARTNER                   = 4;
    const VENTURE_DELETE_PRODUCT_ON_PARTNER                 = 5;

    const PARTNER_CREATE_PRODUCT_FROM_VENTURE               = 6;
    const PARTNER_UPDATE_PRODUCT_FROM_VENTURE               = 7;
    const PARTNER_UPDATE_STOCK_FROM_VENTURE                 = 8;
    const PARTNER_UPDATE_PRICE_FROM_VENTURE                 = 9;
    const PARTNER_CONFIRM_PRODUCT_CREATION_ON_VENTURE       = 10;

    //order
    const PARTNER_CREATE_ORDER_ON_VENTURE                   = 11;
    const PARTNER_CONFIRM_PAYMENT_ON_VENTURE                = 12;
    const PARTNER_CANCEL_ORDER_ON_VENTURE                   = 13;
    const PARTNER_BIND_VENTURE_ORDER                        = 14;

    const VENTURE_CREATE_ORDER_FROM_PARTNER                 = 15;
    const VENTURE_CONFIRM_PAYMENT_FROM_PARTNER              = 16;
    const VENTURE_CONFIRM_ORDER_ON_PARTNER                  = 17;
    const VENTURE_CANCEL_ORDER_FROM_PARTNER                 = 18;

    //post payment
    const VENTURE_SEND_SHIPPED_TO_PARTNER                   = 19;
    const VENTURE_SEND_DELIVERED_TO_PARTNER                 = 20;
    const VENTURE_SEND_FAILEDDELIVERY_TO_PARTNER            = 21;
    const VENTURE_SEND_CANCELED_TO_PARTNER                  = 22;

    const PARTNER_SET_STATUS_TO_SHIPPED_FROM_VENTURE        = 23;
    const PARTNER_SET_STATUS_TO_FAILEDDELIVERY_FROM_VENTURE = 24;
    const PARTNER_SET_STATUS_TO_DELIVERED_FROM_VENTURE      = 25;
    const PARTNER_SET_STATUS_TO_CANCELED_FROM_VENTURE       = 26;
    
    /**
     * @var array
     */
    private static $mappedContext = [
        //product
        self::VENTURE_CREATE_PRODUCT_ON_PARTNER  => 'DTOMarketplace\Context\Venture\Product\Create',
        self::VENTURE_UPDATE_PRODUCT_ON_PARTNER  => 'DTOMarketplace\Context\Venture\Product\Update',
        self::VENTURE_UPDATE_STOCK_ON_PARTNER    => 'DTOMarketplace\Context\Venture\Product\UpdateStock',
        self::VENTURE_UPDATE_PRICE_ON_PARTNER    => 'DTOMarketplace\Context\Venture\Product\UpdatePrice',
        self::VENTURE_DELETE_PRODUCT_ON_PARTNER  => 'DTOMarketplace\Context\Venture\Product\Delete',

        self::PARTNER_CREATE_PRODUCT_FROM_VENTURE         => 'DTOMarketplace\Context\Partner\Product\Create',
        self::PARTNER_UPDATE_PRODUCT_FROM_VENTURE         => 'DTOMarketplace\Context\Partner\Product\Update',
        self::PARTNER_UPDATE_STOCK_FROM_VENTURE           => 'DTOMarketplace\Context\Partner\Product\UpdateStock',
        self::PARTNER_UPDATE_PRICE_FROM_VENTURE           => 'DTOMarketplace\Context\Partner\Product\UpdatePrice',
        self::PARTNER_CONFIRM_PRODUCT_CREATION_ON_VENTURE => 'DTOMarketplace\Context\Partner\Product\ConfirmCreate',

        //order
         self::PARTNER_CREATE_ORDER_ON_VENTURE    => 'DTOMarketplace\Context\Partner\Order\Create',
         self::PARTNER_CONFIRM_PAYMENT_ON_VENTURE => 'DTOMarketplace\Context\Partner\Order\ConfirmPayment',
         self::PARTNER_CANCEL_ORDER_ON_VENTURE    => 'DTOMarketplace\Context\Partner\Order\Cancel',
         self::PARTNER_BIND_VENTURE_ORDER         => 'DTOMarketplace\Context\Partner\Order\BindVentureOrder',

         self::VENTURE_CREATE_ORDER_FROM_PARTNER    => 'DTOMarketplace\Context\Venture\Order\Create',
         self::VENTURE_CONFIRM_PAYMENT_FROM_PARTNER => 'DTOMarketplace\Context\Venture\Order\ConfirmPayment',
         self::VENTURE_CONFIRM_ORDER_ON_PARTNER     => 'DTOMarketplace\Context\Venture\Order\ConfirmOrder',

        //post payment
         self::VENTURE_SEND_SHIPPED_TO_PARTNER        => 'DTOMarketplace\Context\Venture\PostPayment\Shipped',
         self::VENTURE_SEND_DELIVERED_TO_PARTNER      => 'DTOMarketplace\Context\Venture\PostPayment\Delivered',
         self::VENTURE_SEND_FAILEDDELIVERY_TO_PARTNER => 'DTOMarketplace\Context\Venture\PostPayment\FailedDelivery',
         self::VENTURE_SEND_CANCELED_TO_PARTNER       => 'DTOMarketplace\Context\Venture\PostPayment\Canceled',

         self::PARTNER_SET_STATUS_TO_SHIPPED_FROM_VENTURE        => 'DTOMarketplace\Context\Partner\PostPayment\Shipped',
         self::PARTNER_SET_STATUS_TO_DELIVERED_FROM_VENTURE      => 'DTOMarketplace\Context\Partner\PostPayment\Delivered',
         self::PARTNER_SET_STATUS_TO_FAILEDDELIVERY_FROM_VENTURE => 'DTOMarketplace\Context\Partner\PostPayment\FailedDelivery',
         self::PARTNER_SET_STATUS_TO_CANCELED_FROM_VENTURE       => 'DTOMarketplace\Context\Partner\PostPayment\Canceled',
     ];

    /**
     * Return the mapped context class
     *
     * @param mixed $context
     * @return string
     */
    public function getMappedContext($context)
    {
        $this->checkMappedContext($context);
        return self::$mappedContext[$context];
    }

    /**
     * {@inheritdoc}
     */
    public function build(
        $contextName,
        DataWrapper\DataWrapperInterface $dataWrapper
    ) {
        $contextClass = $this->getMappedContext($contextName);
        return new $contextClass($dataWrapper);
    }

    /**
     * {@inheritdoc}
     */
    public function overwrite($contextName, $contextClassName)
    {
        $this->checkMappedContext($contextName);
        self::$mappedContext[$contextName] = $contextClassName;
        return $this;
    }

    /**
     * Test a mapped context
     *
     * @param mixed $contextName
     * @return void
     */
    protected function checkMappedContext($contextName)
    {
        if (!array_key_exists($contextName, self::$mappedContext)) {
            throw new \InvalidArgumentException("invalid context name {$contextName}");
        }
    }
}
