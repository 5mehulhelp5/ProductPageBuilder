<?php
/**
 * Cytracon
 *
 * This source file is subject to the Cytracon Software License, which is available at https://www.cytracon.com/license
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 * If you wish to customize this module for your needs.
 * Please refer to https://www.cytracon.com for more information.
 *
 * @category  Cytracon
 * @package   Cytracon_ProductPageBuilder
 * @copyright Copyright (C) 2019 Cytracon (https://www.cytracon.com)
 */

namespace Cytracon\ProductPageBuilder\Block\Adminhtml;

class TopMenu extends \Cytracon\Core\Block\Adminhtml\TopMenu
{
    /**
     * Init menu items
     *
     * @return array
     */
    public function intLinks()
    {
        $links = [
            [
                [
                    'title'    => __('Add New Profile'),
                    'link'     => $this->getUrl('productpagebuilder/profile/new'),
                    'resource' => 'Cytracon_ProductPageBuilder::profile_save'
                ],
                [
                    'title'    => __('Manage Profiles'),
                    'link'     => $this->getUrl('productpagebuilder/profile'),
                    'resource' => 'Cytracon_ProductPageBuilder::profile'
                ],
                [
                    'title'    => __('Settings'),
                    'link'     => $this->getUrl('adminhtml/system_config/edit/section/productpagebuilder'),
                    'resource' => 'Cytracon_ProductPageBuilder::settings'
                ]
            ],
            [
                'class' => 'separator'
            ],
            [
                'title'  => __('User Guide'),
                'link'   => 'https://cytracon.com/pub/media/productfile/singleproductpagebuilder-v1.0.0-user_guides.pdf',
                'target' => '_blank'
            ],
            [
                'title'  => __('Change Log'),
                'link'   => 'https://www.cytracon.com/magento-2-single-product-page-builder.html#release_notes',
                'target' => '_blank'
            ],
            [
                'title'  => __('Get Support'),
                'link'   => $this->getSupportLink(),
                'target' => '_blank'
            ]
        ];
        return $links;
    }
}
