<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentSalesDataTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentSalesDataTable Test Case
 */
class DocumentSalesDataTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentSalesDataTable
     */
    protected $DocumentSalesData;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DocumentSalesData',
        'app.DocumentSales',
        'app.Nomenclatures',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DocumentSalesData') ? [] : ['className' => DocumentSalesDataTable::class];
        $this->DocumentSalesData = $this->getTableLocator()->get('DocumentSalesData', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DocumentSalesData);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DocumentSalesDataTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DocumentSalesDataTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
