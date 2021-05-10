<?php


namespace Change\Module\Block\Adminhtml\Index\Edit;

use Magento\Search\Controller\RegistryConstants;


class GenericButton
{
//    /**
//     * Url Builder
//     *
//     * @var \Magento\Framework\UrlInterface
//     */
//    protected $urlBuilder;
//
//    /**
//     * Registry
//     *
//     * @var \Magento\Framework\Registry
//     */
//    protected $registry;
//
//    /**
//     * Constructor
//     *
//     * @param \Magento\Backend\Block\Widget\Context $context
//     * @param \Magento\Framework\Registry $registry
//     */
//    public function __construct(
//        \Magento\Backend\Block\Widget\Context $context,
//        \Magento\Framework\Registry $registry
//    ) {
//        $this->urlBuilder = $context->getUrlBuilder();
//        $this->registry = $registry;
//    }
//
//    /**
//     * Return the synonyms group Id.
//     *
//     * @return int|null
//     */
//    public function getId()
//    {
//        $change = $this->registry->registry('id');
//        return $change ? $change->getId() : null;
//    }
//
//    /**
//     * Generate url by route and parameters
//     *
//     * @param   string $route
//     * @param   array $params
//     * @return  string
//     */
//    public function getUrl($route = '', $params = [])
//    {
//        return $this->urlBuilder->getUrl($route, $params);
//    }

    /**
     * Url Builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * Registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    /**
     * Return the synonyms group Id.
     *
     * @return int|null
     */
    public function getId()
    {
        $change = $this->registry->registry('change');
        return $change ? $change->getId() : null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }

}