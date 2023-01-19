<?php

namespace Packt\HelloWorld\Controller\Index;

class Collection extends
    \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $productCollection = $this->_objectManager
            ->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->addAttributeToSelect([
                'name',
                'price',
                'image',
            ])->addAttributeToFilter('name', [
                'like' => '%Sho%'
            ])->addAttributeToFilter('entity_id', [
                'in' => [159, 160, 161]
            ]);

        $output = '';
        foreach ($productCollection as $product) {
            $output .= \Zend_Debug::dump(
                $product->debug(),
                null,
                false
            );
        }
       // $output = $productCollection->getSelect()->__toString();
        $this->getResponse()->setBody($output);
    }
}
