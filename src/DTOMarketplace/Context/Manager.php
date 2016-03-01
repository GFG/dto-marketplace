<?php

namespace DTOMarketplace\Context;

use DTOMarketplace\DataWrapper;

class Manager extends \Context\Manager
{
    /**
     * @param integer $contextName
     * @param string $dataWrapperName
     * @param array $datawrapperData
     *
     * {@inheritdoc}
     */
    public function build($contextName, $dataWrapperName, $dataWrapperData)
    {
        $dataWrapper = new $dataWrapperName($dataWrapperData);
        return $this->build($contextName, $dataWrapper);
    }
}
