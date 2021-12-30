<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentSupplierReceiptDataTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentSupplierReceiptDataTable Test Case
 */
class DocumentSupplierReceiptDataTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentSupplierReceiptDataTable
     */
    protected $DocumentSupplierReceiptData;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DocumentSupplierReceiptData',
        'app.DocumentSupplierReceipt',
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
        $config = $this->getTableLocator()->exists('DocumentSupplierReceiptData') ? [] : ['className' => DocumentSupplierReceiptDataTable::class];
        $this->DocumentSupplierReceiptData = $this->getTableLocator()->get('DocumentSupplierReceiptData', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DocumentSupplierReceiptData);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DocumentSupplierReceiptDataTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DocumentSupplierReceiptDataTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
