<?php
namespace Aheadworks\OneStepCheckout\Plugin\Order;

use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderExtensionInterface;
use Magento\Sales\Api\Data\OrderSearchResultInterface;

/**
 * Class OrderRepositoryPlugin
 * @package Aheadworks\OneStepCheckout\Plugin\Order
 */
class OrderRepositoryPlugin
{
    /**
     * @var OrderExtensionFactory
     */
    private $orderExtensionFactory;

    /**
     * @param OrderExtensionFactory $orderExtensionFactory
     */
    public function __construct(
        OrderExtensionFactory $orderExtensionFactory
    ) {
        $this->orderExtensionFactory = $orderExtensionFactory;
    }

    /**
     * Add extension attributes to order
     *
     * @param OrderRepositoryInterface $subject
     * @param OrderInterface $order
     * @return OrderInterface
     */
    public function afterGet(OrderRepositoryInterface $subject, OrderInterface $order)
    {
        $this->setExtensionAttributes($order);
        return $order;
    }

    /**
     * Add extension attributes to orders list
     *
     * @param OrderRepositoryInterface $subject
     * @param OrderSearchResultInterface $searchResult
     * @return OrderSearchResultInterface
     */
    public function afterGetList(OrderRepositoryInterface $subject, $searchResult)
    {
        foreach ($searchResult->getItems() as $order) {
            $this->setExtensionAttributes($order);
        }
        return $searchResult;
    }

    /**
     * Set extension attributes to order entity
     *
     * @param OrderInterface $order
     */
    private function setExtensionAttributes(OrderInterface $order)
    {
        /** @var OrderExtensionInterface $extensionAttributes */
        $extensionAttributes = $order->getExtensionAttributes();
        if ($extensionAttributes === null) {
            $extensionAttributes = $this->orderExtensionFactory->create();
        }

        $extensionAttributes->setAwDeliveryDate($order->getAwDeliveryDate());
        $extensionAttributes->setAwDeliveryDateFrom($order->getAwDeliveryDateFrom());
        $extensionAttributes->setAwDeliveryDateTo($order->getAwDeliveryDateTo());
        $extensionAttributes->setAwOrderNote($order->getAwOrderNote());

        $order->setExtensionAttributes($extensionAttributes);
    }
}
