<?php
namespace Webkul\BlogManager\Controller\Adminhtml\Manage;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Edit extends Action
{
    protected \Magento\Framework\Registry $coreRegistry;
    protected \Webkul\BlogManager\Model\BlogFactory $blogFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context   $context,
        \Magento\Framework\Registry           $coreRegistry,
        \Webkul\BlogManager\Model\BlogFactory $blogFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->blogFactory = $blogFactory;
    }
    public function execute()
    {
        $blogId = $this->getRequest()->getParam('id');
        $blogModel = $this->blogFactory->create()->load($blogId);
        $this->coreRegistry->register('blog_data', $blogModel);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__("Edit Blog"));
        return $resultPage;
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Webkul_BlogManager::edit');
    }
}
