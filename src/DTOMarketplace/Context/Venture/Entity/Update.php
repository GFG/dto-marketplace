<?php

namespace GFG\DTOMarketplace\Context\Venture\Entity;

class Update extends Create
{
    /**
     * {@inheritdoc}
     */
    public function getHttpMethod()
    {
        return 'put';
    }
}
