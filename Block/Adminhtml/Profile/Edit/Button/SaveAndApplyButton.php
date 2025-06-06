<?php
/**
 * Cytracon
 *
 * This source file is subject to the Cytracon Software License, which is available at https://www.cytracon.com/license.
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 * If you wish to customize this module for your needs.
 * Please refer to https://www.cytracon.com for more information.
 *
 * @category  Cytracon
 * @package   Cytracon_SizeChart
 * @author    Hoang PB - hoangpb@cytracon.com
 * @copyright Copyright (C) 2020 Cytracon (https://www.cytracon.com)
 */

namespace Cytracon\ProductPageBuilder\Block\Adminhtml\Profile\Edit\Button;

class SaveAndApplyButton extends Generic
{
    /**
     * @return array
     * @codeCoverageIgnore
     */
    public function getButtonData()
    {
        $data = [];
        $isAllowed  = $this->_isAllowedAction('Cytracon_ProductPageBuilder::profile_save');
        if ($isAllowed) {
            $data = [
                'id_hard'        => 'save_apply',
                'label'          => __('Save and Apply'),
                'on_click'       => '',
                'data_attribute' => $this->getButtonAttribute([ true, ['auto_apply' => 1]])
            ];
        }
        return $data;
    }
}
