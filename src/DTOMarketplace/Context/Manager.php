<?php

namespace DTOMarketplace\Context;

use DTOMarketplace\DataWrapper;
use Context\Factory\Hydrator;

class Manager extends \Context\Manager
{
    /**
     * @var array
     */
    private $rawData;

    /**
     * @var Hydrator
     */
    private $hydrator;

    /**
     * @param string $contextName
     * @param string $dataWrapperName
     * @param array $datawrapperData
     *
     * {@inheritdoc}
     */
    public function build($contextName, $dataWrapperName, $dataWrapperData)
    {
        $dataWrapper = new $dataWrapperName($dataWrapperData);
        return parent::build($contextName, $dataWrapper);
    }
}
