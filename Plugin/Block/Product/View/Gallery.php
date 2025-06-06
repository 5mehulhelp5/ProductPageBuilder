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

namespace Cytracon\ProductPageBuilder\Plugin\Block\Product\View;

class Gallery
{
    /**
     * @param \Magento\Catalog\Block\Product\View\Gallery $subject
     * @param callable $proceed
     * @param $name
     * @param $module
     * @return mixed
     */
    public function aroundGetVar(
        \Magento\Catalog\Block\Product\View\Gallery $subject,
        callable $proceed,
        $name,
        $module = null
    ) {
        if ($element = $subject->getProductPageBuilderElement()) {
            if (!$element->getUseDefaultThemeSettings()) {
                $path = str_replace('/', '_', $name);
                if ($element->hasData($path)) {
                    return $element->getData($path);
                }
            }
        }

        $result = $proceed($name, $module);

        return $result;
    }
}
