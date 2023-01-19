<?php
namespace Webkul\BlogManager\Block\Published;

use Magento\Framework\Exception\LocalizedException;

class Detail extends \Magento\Framework\View\Element\Template
{
    public \Webkul\BlogManager\Model\BlogFactory $blogFactory;
    private \Magento\Customer\Model\CustomerFactory $customerFactory;
    private \Webkul\BlogManager\Helper\Data $helper;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Webkul\BlogManager\Model\BlogFactory $blogFactory,
        \Webkul\BlogManager\Helper\Data $helper,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        array $data = []
    ) {
        $this->blogFactory = $blogFactory;
        $this->customerFactory = $customerFactory;
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    public function getBlog()
    {
        $blogId = $this->getRequest()->getParam('id');
        return $this->blogFactory->create()->load($blogId);
    }

    /**
     * @throws LocalizedException
     */
    public function getAuthor($userId): \Magento\Framework\Phrase|string
    {
        if ($userId) {
            $customer = $this->customerFactory->create()->load($userId);
            if ($customer && $customer->getId()) {
                return $customer->getName();
            }
        }
        return __('Admin');
    }

    public function getFormattedDate($date): string
    {
        return $this->helper->getFormattedDate($date);
    }
}
