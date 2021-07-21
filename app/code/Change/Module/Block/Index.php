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
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    private $productCollectionFactory;
    /**
     * @var \Magento\Sales\Model\Order
     */
    private $order;

    /**
     * Index constructor.
     * @param ScopeConfigInterface $scopeConfig
     * @param \Change\Module\Model\ChangeFactory $changeFactory
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Sales\Model\Order $order
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Change\Module\Model\ChangeFactory $changeFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Sales\Model\Order $order,
        Template\Context $context,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->changeFactory = $changeFactory;
        $this->scopeConfig = $scopeConfig;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->order = $order;
    }

    public function getAll()
    {
        $model = $this->changeFactory->create();

        $maxItemDisplay = $this->scopeConfig->getValue('changemodule/general/max_items_display_count', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);


        $collection = $model->getCollection();
        $collection->setPageSize($maxItemDisplay);

        return $collection;
    }

    public function getProductCollection()
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('order_count');
//        $collection->addAttributeToFilter([
//            //['attribute'=>'type_id','neq'=> 'simple'],
//            ['attribute' => 'order_count', 'eq' => 0] // Color filter
//        ]);
//        echo $collection->getSelect(); die();
        return $collection;
    }

    public function getOrderCollection()
    {
        $collection = $this->order->load(21);
        return $collection->getAllItems();
    }

    public function getConfigsValues()
    {
        echo $this->scopeConfig->getValue('changemodule/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        echo ', ';
        echo $this->scopeConfig->getValue('changemodule/general/display_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

    }


}