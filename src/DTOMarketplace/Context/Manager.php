<?php

namespace GFG\DTOMarketplace\Context;

class Manager extends \GFG\DTOContext\Manager
{
    /**
     * @param string $contextName
     * @param string $dataWrapperName
     * @param array $dataWrapperData
     * @return mixed
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
