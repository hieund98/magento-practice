<?php
namespace Packt\HelloWorld\Model;

use Magento\Framework\ObjectManagerInterface;
use Psr\Log\LoggerInterface;

class Cron
{
    /** @var LoggerInterface $logger */
    protected LoggerInterface $logger;

    /** @var ObjectManagerInterface */
    protected ObjectManagerInterface $objectManager;

    public function __construct(
        LoggerInterface $logger,
        ObjectManagerInterface $objectManager
    ) {
        $this->logger = $logger;
        $this->objectManager = $objectManager;
    }

    public function checkSubscriptions(): void
    {
        $subscription = $this->objectManager->create('Packt\HelloWorld\Model\Subscription');
        $subscription->setFirstname('Fron');
        $subscription->setLastname('RJob');
        $subscription->setEmail('gron.job@example.com');
        $subscription->setMessage('Created from cron2');
        $subscription->save();
        $this->logger->debug('Test subscription added2');
    }
}
