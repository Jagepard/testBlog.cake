<?php
declare(strict_types=1);

namespace Admin\Test\TestCase\View\Helper;

use Admin\View\Helper\SlugHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * Admin\View\Helper\SlugHelper Test Case
 */
class SlugHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Admin\View\Helper\SlugHelper
     */
    protected $Slug;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Slug = new SlugHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Slug);

        parent::tearDown();
    }
}
