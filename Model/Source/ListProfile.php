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

namespace Cytracon\ProductPageBuilder\Model\Source;

class ListProfile extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * @var \Cytracon\ProductPageBuilder\Model\ResourceModel\Profile\CollectionFactory
     */
    protected $profileCollectionFactory;

    /**
     * @param \Cytracon\ProductPageBuilder\Model\ResourceModel\Profile\CollectionFactory $profileCollectionFactory
     */
    public function __construct(
        \Cytracon\ProductPageBuilder\Model\ResourceModel\Profile\CollectionFactory $profileCollectionFactory
    ) {
        $this->profileCollectionFactory = $profileCollectionFactory;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function getAllOptions()
    {
        $collection = $this->profileCollectionFactory->create();
        $options = [];

        $options[] = [
            'label' => __('None'),
            'value' => ''
        ];

        foreach ($collection as $profile) {
            $options[] = [
                'label' => $profile->getName(),
                'value' => $profile->getId()
            ];
        }

        return $options;
    }
}
