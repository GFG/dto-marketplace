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

    /**
     * @param array $rawData
     * @return Manager
     */
    public function setRawData($rawData)
    {
        $this->rawData = $rawData;
        return $this;
    }

    /**
     * @return array
     */
    public function getRawData()
    {
        return $this->rawData;
    }

    /**
     * undocumented function
     *
     * @return Manager
     */
    public function setHydrator(Hydrator $hydrator)
    {
        $this->hydrator = $hydrator;
        return $this;
    }

    /**
     * @return Hydrator
     */
    public function getHydrator()
    {
        if (!$this->hydrator) {
            $this->setHydrator(new Hydrator);
        }

        return $this->hydrator;
    }
}
