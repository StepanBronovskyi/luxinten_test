<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 01.09.2020
 * Time: 13:05
 */

namespace Luxinten\TechnicalTaskUnit\Plugin\Product;

use Magento\Catalog\Model\ResourceModel\Product,
    Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class ValidateUrl
{
    const PRODUCT_URL_SUFFIX = '-1';

    public $productCollectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->productCollectionFactory = $collectionFactory;
    }

    public function beforeSave(Product $subject, $object)
    {
        $urlKey = $object->getData('url_key');

        $productCollection = $this->productCollectionFactory->create();
        $productCollection->addAttributeToFilter('url_key', $urlKey);
        $productCollection->addAttributeToFilter('entity_id', [
            'neq' => $object->getEntityId()
        ]);
        $productItem = $productCollection->getFirstItem();

        if (!empty($productItem->getData())) {
            $object->setData('url_key', $urlKey . self::PRODUCT_URL_SUFFIX);
        }

        return [$object];
    }
}