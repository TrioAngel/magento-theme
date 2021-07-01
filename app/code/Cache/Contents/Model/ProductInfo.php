<?php
/**
 * Created by PhpStorm.
 * User: gor-admin
 * Date: 7/1/21
 * Time: 5:22 PM
 */

namespace Cache\Contents\Model;


class ProductInfo implements \Cache\Contents\Api\ProductInfoInterface
{
    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductInfo constructor.
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     */
    public function __construct
    (
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }


    /**
     * @param int $id
     * @param string $name
     * @return string
     */
    public function getProductById($id, $name)
    {
        return 'Product ' . $name . ': ' . $this->productRepository->getById($id)->getPrice();
    }
}