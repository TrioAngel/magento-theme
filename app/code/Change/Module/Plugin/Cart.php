<?php
/**
 * Created by PhpStorm.
 * User: gor-admin
 * Date: 7/1/21
 * Time: 9:36 PM
 */

namespace Change\Module\Plugin;


class Cart
{
    public function aroundAddProduct
    (
        \Magento\Checkout\Model\Cart $cart,
        \Closure $proceed,
        $productInfo,
        $requestInfo = null
    )
    {

        $requestInfo['qty'] = 5;
        $result = $proceed($productInfo, $requestInfo);
        return $result;
    }
}