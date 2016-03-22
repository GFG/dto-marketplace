<?php

namespace DTOMarketplace\Context;

class Manager extends \Context\Manager
{
    /**
     * @param string $contextName
     * @param string $dataWrapperName
     * @param array $datawrapperData
     */
    public function build(
        $contextName,
        $dataWrapperName,
        array $dataWrapperData = []
    ) {
        $dataWrapper = new $dataWrapperName($dataWrapperData);
        return $this->create($contextName, $dataWrapper);
    }
}
