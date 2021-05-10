<?php


namespace Change\Module\Controller\Adminhtml\Index;


//use Magento\Framework\App\ResponseInterface;
//use Change\Module\Model\Change as Change;
//
//class Delete extends \Magento\Backend\App\Action
//{
//
//    public function execute()
//    {
//        $id = $this->getRequest()->getParam('id');
//
//        if (!($change = $this->_objectManager->create(Change::class)->load($id))) {
//            $this->messageManager->addError(__('Unable to proceed. Please, try again.'));
//            $resultRedirect = $this->resultRedirectFactory->create();
//            return $resultRedirect->setPath('*/*/index', array('_current' => true));
//        }
//        try{
//            $change->delete();
//            $this->messageManager->addSuccess(__('Your change has been deleted !'));
//        } catch (Exception $e) {
//            $this->messageManager->addError(__('Error while trying to delete change: '));
//            $resultRedirect = $this->resultRedirectFactory->create();
//            return $resultRedirect->setPath('*/*/index', array('_current' => true));
//        }
//
//        $resultRedirect = $this->resultRedirectFactory->create();
//        return $resultRedirect->setPath('*/*/index', array('_current' => true));
//    }
//}


use Change\Module\Model\Change as Change;
use Magento\Backend\App\Action;

class Delete extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        if (!($change = $this->_objectManager->create(Change::class)->load($id))) {
            $this->messageManager->addError(__('Unable to proceed. Please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }
        try{
            $change->delete();
            $this->messageManager->addSuccess(__('Your contact has been deleted !'));
        } catch (Exception $e) {
            $this->messageManager->addError(__('Error while trying to delete contact: '));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}