<?php
/**
 * My own options
 *
 */
namespace Webkul\BlogManager\Model\Config\Source;
class Sleektheme implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'light', 'label' => __('Light')],
            ['value' => 'dark', 'label' => __('Dark')],
            ['value' => 'stitch', 'label' => __('Stitch')]
        ];
    }
}


