<?php
namespace Aheadworks\OneStepCheckout\Model\Address\Form\Customization;

use Aheadworks\OneStepCheckout\Model\Address\Form\Customization\Config\Reader;
use Magento\Framework\Config\CacheInterface;
use Magento\Framework\Config\Data as ConfigData;

/**
 * Class Config
 * @package Aheadworks\OneStepCheckout\Model\Address\Form\Customization
 */
class Config extends ConfigData
{
    /**
     * @param Reader $reader
     * @param CacheInterface $cache
     * @param string $cacheId
     * phpcs:disable Generic.CodeAnalysis.UselessOverridingMethod.Found
     */
    public function __construct(
        Reader $reader,
        CacheInterface $cache,
        $cacheId = 'osc_attribute_customization'
    ) {
        parent::__construct($reader, $cache, $cacheId);
    }
}
