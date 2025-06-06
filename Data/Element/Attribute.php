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

namespace Cytracon\ProductPageBuilder\Data\Element;

class Attribute extends \Cytracon\ProductPageBuilder\Data\Element
{
    /**
     * @var \Cytracon\ProductPageBuilder\Model\Source\ProductAttribute
     */
    protected $productAttribute;

    /**
     * @param \Cytracon\Builder\Data\FormFactory                         $formFactory
     * @param \Cytracon\Builder\Helper\Data                              $dataHelper
     * @param \Cytracon\ProductPageBuilder\Model\Source\ProductAttribute $productAttribute
     * @param array                                                     $data
     */
    public function __construct(
        \Cytracon\Builder\Data\FormFactory $formFactory,
        \Cytracon\Builder\Helper\Data $dataHelper,
        \Cytracon\ProductPageBuilder\Model\Source\ProductAttribute $productAttribute,
        array $data = []
    ) {
        parent::__construct($formFactory, $dataHelper, $data);
        $this->productAttribute = $productAttribute;
    }

    /**
     * @return \Cytracon\Builder\Data\Form\Element\Fieldset
     */
    public function prepareGeneralTab()
    {
        $general = parent::prepareGeneralTab();

            $general->addChildren(
                'attribute',
                'uiSelect',
                [
                    'sortOrder'       => 10,
                    'key'             => 'attribute',
                    'templateOptions' => [
                        'label'   => __('Attribute'),
                        'options' => $this->productAttribute->toOptionArray()
                    ]
                ]
            );

            $general->addChildren(
                'show_label',
                'toggle',
                [
                    'sortOrder'       => 20,
                    'key'             => 'show_label',
                    'templateOptions' => [
                        'label' => __('Show Label')
                    ]
                ]
            );

        return $general;
    }
}
