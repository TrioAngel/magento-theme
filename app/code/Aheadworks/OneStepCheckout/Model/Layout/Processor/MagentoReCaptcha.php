<?php
namespace Aheadworks\OneStepCheckout\Model\Layout\Processor;

use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;
use Aheadworks\OneStepCheckout\Model\ThirdPartyModule\Status\MagentoReCaptcha as magentoReCaptchaStatus;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Stdlib\ArrayManager;

/**
 * Class MagentoReCaptcha
 * @package Aheadworks\OneStepCheckout\Model\Layout\Processor
 */
class MagentoReCaptcha implements LayoutProcessorInterface
{
    /**
     * @var MagentoReCaptcha
     */
    private $magentoReCaptchaStatus;

    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @var ArrayManager
     */
    private $arrayManager;

    /**
     * @param magentoReCaptchaStatus $magentoReCaptchaStatus
     * @param ObjectManagerInterface $objectManager
     * @param ArrayManager $arrayManager
     */
    public function __construct(
        magentoReCaptchaStatus $magentoReCaptchaStatus,
        ObjectManagerInterface $objectManager,
        ArrayManager $arrayManager
    ) {
        $this->magentoReCaptchaStatus = $magentoReCaptchaStatus;
        $this->objectManager = $objectManager;
        $this->arrayManager = $arrayManager;
    }

    /**
     * {@inheritdoc}
     */
    public function process($jsLayout)
    {
        if ($this->magentoReCaptchaStatus->isEnabled()) {
            $paths = [
                'components/checkout/children/authentication/children/recaptcha' =>
                    'components/checkout/children/authentication/children/recaptcha',
                'components/checkout/children/email/children/recaptcha' =>
                    'components/checkout/children/steps/children/shipping-step/children/shippingAddress/children/'
                    . 'customer-email/children/recaptcha'
            ];
            $nativeJsLayout = $this->getMagentoReCaptchaLayoutProcessor()->process([]);

            foreach ($paths as $pathToOur => $pathFromNative) {
                $ourLayout = $this->arrayManager->get($pathToOur, $jsLayout);
                $nativeLayout = $this->arrayManager->get($pathFromNative, $nativeJsLayout);
                if ($ourLayout && $nativeLayout) {
                    $jsLayout = $this->arrayManager->merge($pathToOur, $jsLayout, $nativeLayout);
                } elseif ($ourLayout && !$nativeLayout) {
                    $jsLayout = $this->arrayManager->remove($pathToOur, $jsLayout);
                }
            }
        }

        return $jsLayout;
    }

    /**
     * Retrieve Checkout ReCaptcha layout processor
     *
     * @return \MSP\ReCaptcha\Block\LayoutProcessor\Checkout\Onepage
     */
    private function getMagentoReCaptchaLayoutProcessor()
    {
        return $this->objectManager->get(\Magento\ReCaptchaCheckout\Block\LayoutProcessor\Checkout\Onepage::class);
    }
}
