<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaterialsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaterialsTable Test Case
 */
class MaterialsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MaterialsTable
     */
    protected $Materials;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Materials') ? [] : ['className' => MaterialsTable::class];
        $this->Materials = $this->getTableLocator()->get('Materials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Materials);

        parent::tearDown();
    }
}
