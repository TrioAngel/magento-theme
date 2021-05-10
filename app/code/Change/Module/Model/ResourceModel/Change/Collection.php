<?php


namespace Change\Module\Model\ResourceModel\Change;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Change\Module\Model\Change', 'Change\Module\Model\ResourceModel\Change');
    }
}