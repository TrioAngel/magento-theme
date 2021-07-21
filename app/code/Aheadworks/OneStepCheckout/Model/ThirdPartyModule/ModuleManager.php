<?php
namespace Aheadworks\OneStepCheckout\Model\ThirdPartyModule;

use Magento\Framework\Module\ModuleListInterface;

/**
 * Class ModuleManager
 * @package Aheadworks\OneStepCheckout\Model\ThirdPartyModule
 */
class ModuleManager
{
    const KLARNA_KP_MODULE_NAME = 'Klarna_Kp';

    /**
     * @var ModuleListInterface
     */
    private $moduleList;

    /**
     * @param ModuleListInterface $moduleList
     */
    public function __construct(
        ModuleListInterface $moduleList
    ) {
        $this->moduleList = $moduleList;
    }

    /**
     * Check is Klarna Kp module enabled
     *
     * @return bool
     */
    public function isKlarnaKpEnabled()
    {
        return $this->moduleList->has(self::KLARNA_KP_MODULE_NAME);
    }
}
