<?php


namespace Change\Module\Controller\Adminhtml\Index;

use Change\Module\Model\Change as Change;
use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action
{
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