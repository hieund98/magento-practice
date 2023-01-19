<?php
namespace Packt\HelloWorld\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected PageFactory $resultPageFactory;

    public function __construct(
        Context     $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    protected function _isAllowed(): bool
    {
        return $this->_authorization->isAllowed('Packt_HelloWorld::index');
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
