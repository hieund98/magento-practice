<?php
namespace Packt\HelloWorld\Observer;
use Magento\Framework\Event\ObserverInterface;
class RegisterVisitObserver implements ObserverInterface
{
    protected \Psr\Log\LoggerInterface $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getProduct();
        $category = $observer->getCategory();

        $this->logger->debug(print_r($product->debug(), true));
        $this->logger->debug(print_r($category->debug(), true));
    }
}
