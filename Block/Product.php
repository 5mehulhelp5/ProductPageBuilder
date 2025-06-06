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

namespace Cytracon\ProductPageBuilder\Block;

class Product extends \Magento\Framework\View\Element\Template
{
    /**
     * @var string
     */
    protected $_template = 'Cytracon_ProductPageBuilder::product.phtml';

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Cytracon\Builder\Helper\Data
     */
    protected $builderHelper;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry                      $registry
     * @param \Cytracon\Builder\Helper\Data                     $builderHelper
     * @param array                                            $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Cytracon\Builder\Helper\Data $builderHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_coreRegistry = $registry;
        $this->builderHelper = $builderHelper;
    }

    /**
     * @return null|\Cytracon\ProductPageBuilder\Model\Profile
     */
    public function getCurrentProfile()
    {
        return $this->_coreRegistry->registry('productpagebuilder_profile');
    }

    /**
     * @return string
     */
    public function toHtml()
    {
        if (!$this->getCurrentProfile()) {
            return;
        }
        return parent::toHtml();
    }

    /**
     * @return string
     */
    public function getProfileHtml()
    {
        $profile = $this->getCurrentProfile();
        $block = $this->builderHelper->prepareProfileBlock(
            \Cytracon\Builder\Block\Profile::class,
            $profile->getProfile()
        );
        $block->setData(
            'custom_classes',
            'mgz-productpagebuilder' . $profile->getId() . ' ' . $block->getCustomClasses()
        );
        return $block->toHtml();
    }
}
