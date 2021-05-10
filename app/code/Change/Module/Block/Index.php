<?php


namespace Change\Module\Block;


use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Change\Module\Model\ChangeFactory
     */
    private $changeFactory;
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Index constructor.
     * @param ScopeConfigInterface $scopeConfig
     * @param \Change\Module\Model\ChangeFactory $changeFactory
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Change\Module\Model\ChangeFactory $changeFactory,
        Template\Context $context,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->changeFactory = $changeFactory;
        $this->scopeConfig = $scopeConfig;
    }

    public function getAll()
    {
        $model = $this->changeFactory->create();

        $maxItemDisplay = $this->scopeConfig->getValue('changemodule/general/max_items_display_count', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);


        $collection = $model->getCollection();
        $collection->setPageSize($maxItemDisplay);

        return $collection;
    }

    public function getConfigsValues()
    {
        echo $this->scopeConfig->getValue('changemodule/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        echo ', ';
        echo $this->scopeConfig->getValue('changemodule/general/display_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

    }


}