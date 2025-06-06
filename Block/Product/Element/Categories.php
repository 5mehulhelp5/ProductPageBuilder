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

class Categories extends \Cytracon\ProductPageBuilder\Block\Product\Element
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Category\TreeFactory
     */
    protected $_categoryTreeFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context          $context
     * @param \Magento\Framework\App\Http\Context                       $httpContext
     * @param \Magento\Framework\Pricing\PriceCurrencyInterface         $priceCurrency
     * @param \Magento\Framework\Registry                               $registry
     * @param \Magento\Catalog\Model\ResourceModel\Category\TreeFactory $categoryTreeFactory
     * @param array                                                     $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\ResourceModel\Category\TreeFactory $categoryTreeFactory,
        array $data = []
    ) {
        parent::__construct($context, $httpContext, $priceCurrency, $registry, $data);
        $this->_categoryTreeFactory = $categoryTreeFactory;
    }

    /**
     * @return \Magento\Catalog\Model\ResourceModel\Category\Collection
     */
    public function getCollection()
    {
        $parent  = $this->_storeManager->getStore()->getRootCategoryId();
        $product = $this->getProduct();
        $tree    = $this->_categoryTreeFactory->create();
        //$nodes   = $tree->loadNode($parent)->loadChildren(0)->getChildren();
        $tree->addCollectionData(null, false, $parent, false, false);
        $collection = $tree->getCollection();
        $collection->addIsActiveFilter();
        $collection->joinField(
            'product_id',
            'catalog_category_product',
            'product_id',
            'category_id = entity_id',
            null
        )->addFieldToFilter(
            'product_id',
            (int)$product->getEntityId()
        );
        return $collection;
    }
}
