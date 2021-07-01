<?php

namespace Cache\Contents\Api;


interface ProductInfoInterface
{
    /**
     * Get products by its ID
     *
     * @param int $id
     * @param string $name
     * @return ProductInfoInterface
     */
    public function getProductById($id, $name);
}