<?php


namespace Change\Module\Controller\Adminhtml\Index;


use Magento\Framework\App\ResponseInterface;
use Change\Module\Model\Change as Change;

class NewAction extends \Magento\Backend\App\Action
{

//    public function execute()
//    {
//        $this->_view->loadLayout();
//        $this->_view->renderLayout();
//
//        $changeDatas = $this->getRequest()->getParam('id');
//        if(is_array($changeDatas)) {
//            $change = $this->_objectManager->create(Change::class);
//            $change->setData($changeDatas)->save();
//            $resultRedirect = $this->resultRedirectFactory->create();
//            return $resultRedirect->setPath('*/*/index');
//        }
//    }

    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $changeDatas = $this->getRequest()->getParam('change');
        if(is_array($changeDatas)) {
            $contact = $this->_objectManager->create(Change::class);
            $contact->setData($changeDatas)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }
}