<?php


namespace Change\Module\Model\Change;

use Change\Module\Model\ResourceModel\Change\CollectionFactory;


class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
//    /**
//     * @var \Change\Module\Model\ResourceModel\Change\CollectionFactory
//     */
//    private $changeCollectionFactory;
//
//    /**
//     * DataProvider constructor.
//     * @param $name
//     * @param $primaryFieldName
//     * @param $requestFieldName
//     * @param \Change\Module\Model\ResourceModel\Change\CollectionFactory $changeCollectionFactory
//     * @param array $meta
//     * @param array $data
//     */
//    public function __construct(
//        $name,
//        $primaryFieldName,
//        $requestFieldName,
//        \Change\Module\Model\ResourceModel\Change\CollectionFactory $changeCollectionFactory,
//        array $meta = [],
//        array $data = []
//    )
//    {
//        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
//        $this->collection = $changeCollectionFactory->create();
//    }
//
//    public function getData()
//    {
//        if (isset($this->loadedData)) {
//            return $this->loadedData;
//        }
//
//        $items = $this->collection->getItems();
//        $this->loadedData = array();
//        foreach ($items as $change) {
//            $this->loadedData[$change->getId()]['id'] = $change->getData();
//        }
//
//
//        return $this->loadedData;
//
//    }


    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $changeCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $changeCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $changeCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        /** @var Customer $customer */
        foreach ($items as $change) {
            // notre fieldset s'apelle "contact" d'ou ce tableau pour que magento puisse retrouver ses datas :
            $this->loadedData[$change->getId()]['change'] = $change->getData();
        }


        return $this->loadedData;

    }


}