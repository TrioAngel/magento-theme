<?php
namespace Aheadworks\OneStepCheckout\Model\ThirdPartyModule\Status;

use Magento\Framework\Module\ModuleListInterface;

/**
 * Class MspReCaptcha
 * @package Aheadworks\OneStepCheckout\Model\ThirdPartyModule\Status
 */
class MspReCaptcha
{
    const MODULE_NAME = 'MSP_ReCaptcha';

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
     * Check if module enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->moduleList->has(self::MODULE_NAME);
    }
}
