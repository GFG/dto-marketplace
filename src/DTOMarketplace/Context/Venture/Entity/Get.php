<?php

namespace GFG\DTOMarketplace\Context\Venture\Entity;

use GFG\DTOMarketplace\Context\Base;

class Get extends Base
{
    /**
     * {@inheritdoc}
     */
    public function getHttpMethod()
    {
        return 'get';
    }

    /**
     * {@inheritdoc}
     */
    public function exportContextData()
    {
        return $this->prepareExport(['id' => $this->getDataWrapper()->getId()]);
    }
}
