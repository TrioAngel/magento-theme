<?php


namespace Change\Module\Controller\Adminhtml\Index;


use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Backend\App\Action
{

    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }

//    public function execute()
//    {
//        $pageResult = $this->resultFactory->create('page');
//        $pageResult->getConfig()->getTitle()->prepend((__('Change Module Admin Grid')));
//        return $pageResult;
//    }
}