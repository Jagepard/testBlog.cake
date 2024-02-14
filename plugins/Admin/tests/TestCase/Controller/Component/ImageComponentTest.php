<?php
declare(strict_types=1);

namespace Admin\Test\TestCase\Controller\Component;

use Admin\Controller\Component\ImageComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * Admin\Controller\Component\ImageComponent Test Case
 */
class ImageComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Admin\Controller\Component\ImageComponent
     */
    protected $Image;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Image = new ImageComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Image);

        parent::tearDown();
    }
}
