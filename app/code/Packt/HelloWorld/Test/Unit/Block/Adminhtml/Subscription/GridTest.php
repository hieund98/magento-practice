<?php
namespace Packt\HelloWorld\Test\Unit\Block\Adminhtml\Subscription;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Packt\HelloWorld\Block\Adminhtml\Subscription\Grid;

use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{
    /**
     * @var Grid
     */
    protected Grid $block;
    protected function setUp() : void
    {
        $this->block  = (new ObjectManager($this))->getObject(Grid::class);
    }
    protected function tearDown() : void
    {
        $this->block = null;
    }
    public function testDecorateStatus()
    {
        $this->assertContains('grid-severity-minor', $this->block->decorateStatus('pending'));
        $this->assertContains('grid-severity-notice', $this->block->
        decorateStatus('approved'));
        $this->assertContains('grid-severity-critical', $this->block->decorateStatus('declined'));

        $this->assertContains('grid-severity-critical', $this->block->decorateStatus(6));
        $this->assertContains('grid-severity-critical', $this->block->decorateStatus(null));
    }
}
