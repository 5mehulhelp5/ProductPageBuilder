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

namespace Cytracon\ProductPageBuilder\Model;

class DefaultConfigProvider extends \Cytracon\Builder\Model\DefaultConfigProvider
{
    /**
     * @var string
     */
    protected $_builderArea = 'product';

    /**
     * @return array
     */
    public function getConfig()
    {
        $config = parent::getConfig();
        $config['profile'] = [
            'builder'     => 'Cytracon\ProductPageBuilder\Block\Builder',
            'home'        => 'https://www.cytracon.com/magento-2-single-product-page-builder.html?utm_campaign=mgzbuilder&utm_source=mgz_user&utm_medium=backend',
            'templateUrl' => 'https://www.cytracon.com/productfile/productpagebuilder/templates.php'
        ];
        return $config;
    }
}
