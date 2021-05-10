<?php


namespace Change\Module\Model;


class Change extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Change\Module\Model\ResourceModel\Change');
    }
}