<?php


namespace Change\Module\Model\ResourceModel;


class Change extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('change_module_table', 'id');
    }
}