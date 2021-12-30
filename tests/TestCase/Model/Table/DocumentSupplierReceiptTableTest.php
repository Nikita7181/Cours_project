<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentSupplierReceiptTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentSupplierReceiptTable Test Case
 */
class DocumentSupplierReceiptTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentSupplierReceiptTable
     */
    protected $DocumentSupplierReceipt;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DocumentSupplierReceipt',
        'app.Contragents',
        'app.DocumentSupplierReceiptData',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DocumentSupplierReceipt') ? [] : ['className' => DocumentSupplierReceiptTable::class];
        $this->DocumentSupplierReceipt = $this->getTableLocator()->get('DocumentSupplierReceipt', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DocumentSupplierReceipt);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DocumentSupplierReceiptTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DocumentSupplierReceiptTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
