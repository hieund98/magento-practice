<?php
namespace Packt\HelloWorld\Controller\Index;

class Event extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Framework\View\Result\PageFactory */
    protected \Magento\Framework\View\Result\PageFactory $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory
                                              $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $parameters = [
            'product' => $this->_objectManager->create('Magento\Catalog\Model\Product')->load(50),
            'category' => $this->_objectManager->create('Magento\Catalog\Model\Category')->load(10),
        ];

        $this->_eventManager->dispatch('helloworld_register_visit', $parameters);
        return $this->resultPageFactory->create();
    }
}
