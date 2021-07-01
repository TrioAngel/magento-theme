<?php


namespace Change\Module\Controller\Some;


use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
        $pageResult = $this->resultFactory->create('page');
        return $pageResult;
    }
}