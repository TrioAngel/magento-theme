<?php
namespace Aheadworks\OneStepCheckout\ViewModel\System;

use Magento\Directory\Helper\Data as HelperData;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class Js
 * @package Aheadworks\OneStepCheckout\ViewModel\System
 */
class Js implements ArgumentInterface
{
    /**
     * @var HelperData
     */
    private $helper;

    /**
     * @param HelperData $helper
     */
    public function __construct(
        HelperData $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * Returns the list of countries, for which region is required
     *
     * @return array|string
     */
    public function getCountriesWithStatesRequired()
    {
        return $this->helper->getCountriesWithStatesRequired(true);
    }
}
