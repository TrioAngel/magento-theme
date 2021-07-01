<?php
/**
 * Created by PhpStorm.
 * User: gor-admin
 * Date: 5/14/21
 * Time: 9:04 PM
 */

namespace Change\Module\Model\Json;

use Magento\Framework\View\Asset\PreProcessor\Chain;



class PreProcessor extends \Magento\Translation\Model\Json\PreProcessor
{
    public function process(Chain $chain)
    {
        if ($this->isDictionaryPath($chain->getTargetAssetPath())) {
            $context = $chain->getAsset()->getContext();

            $themePath = '*/*';
            $areaCode = \Magento\Backend\App\Area\FrontNameResolver::AREA_CODE;

            if ($context instanceof FallbackContext) {
                $themePath = $context->getThemePath();
                $areaCode = $context->getAreaCode();
                $this->translate->setLocale($context->getLocale());
            }

            $area = $this->areaList->getArea($areaCode);
            $area->load(\Magento\Framework\App\Area::PART_DESIGN);
            $area->load(\Magento\Framework\App\Area::PART_TRANSLATE);

            $chain->setContent(json_encode($this->dataProvider->getData($themePath)));
            $chain->setContentType('json');
        }
    }
}