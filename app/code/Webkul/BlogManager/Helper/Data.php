<?php
namespace Webkul\BlogManager\Helper;

use Magento\Customer\Model\Session;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    public Session $customerSession;
    protected \Magento\Framework\Stdlib\DateTime\TimezoneInterface $date;

    public function __construct(
        Session $customerSession,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $date,
        \Magento\Framework\App\Helper\Context $context
    ) {
        $this->date = $date;
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }

    public function getCustomerId(): ?int
    {
        return $this->customerSession->getCustomerId();
    }
    public function getFormattedDate($date=''): string
    {
        return $this->date->date($date)->format('d/m/y h:i A');
    }
}
