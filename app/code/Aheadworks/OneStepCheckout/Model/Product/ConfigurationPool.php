<?php
namespace Aheadworks\OneStepCheckout\Model\Product;

use Magento\Framework\Exception\LocalizedException;

/**
 * Class ConfigurationPool
 * @package Aheadworks\OneStepCheckout\Model\Product
 */
class ConfigurationPool
{
    /**
     * @var ConfigurationFactory
     */
    private $configurationFactory;

    /**
     * @var array
     */
    private $configurations = [];

    /**
     * @var ConfigurationInterface[]
     */
    private $configurationInstances = [];

    /**
     * @param ConfigurationFactory $configurationFactory
     * @param array $configurations
     */
    public function __construct(
        ConfigurationFactory $configurationFactory,
        $configurations = []
    ) {
        $this->configurationFactory = $configurationFactory;
        $this->configurations = $configurations;
    }

    /**
     * Get configuration instance
     *
     * @param string $productType
     * @return ConfigurationInterface
     * @throws \Exception
     */
    public function getConfiguration($productType)
    {
        if (!isset($this->configurationInstances[$productType])) {
            if (!isset($this->configurations[$productType])) {
                throw new LocalizedException(sprintf('Unknown configuration: %s requested', $productType));
            }
            $configurationInstance = $this->configurationFactory->create($this->configurations[$productType]);
            if (!$configurationInstance instanceof ConfigurationInterface) {
                throw new LocalizedException(
                    sprintf('Configuration instance %s does not implement required interface.', $productType)
                );
            }
            $this->configurationInstances[$productType] = $configurationInstance;
        }
        return $this->configurationInstances[$productType];
    }

    /**
     * Check if configuration for product type exists
     *
     * @param string $productType
     * @return bool
     */
    public function hasConfiguration($productType)
    {
        return isset($this->configurations[$productType]);
    }
}
