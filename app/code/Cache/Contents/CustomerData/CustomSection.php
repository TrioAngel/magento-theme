<?php
namespace Cache\Contents\CustomerData;
use Magento\Customer\CustomerData\SectionSourceInterface;

class CustomSection implements SectionSourceInterface
{
    public function getSectionData()
    {
        return [
            'customdata' => "first data",
            'customdata2' => "second one",
        ];
    }
}