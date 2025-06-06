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

namespace Cytracon\ProductPageBuilder\Block\Product\Element;

class Sharing extends \Cytracon\ProductPageBuilder\Block\Product\Element
{
    /**
     * @return boolean
     */
    public function isEnabled()
    {
        $element = $this->getElement();
        if ($element->getEnableFacebookLike() ||
            $element->getEnableFacebookShare() ||
            $element->getEnableTwitter() ||
            $element->getEnablePinterest()
        ) {
            return parent::isEnabled();
        }
        return false;
    }
}
