<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NomenclaturesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NomenclaturesTable Test Case
 */
class NomenclaturesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NomenclaturesTable
     */
    protected $Nomenclatures;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Nomenclatures',
        'app.NomenclatureTypes',
        'app.Units',
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
        $config = $this->getTableLocator()->exists('Nomenclatures') ? [] : ['className' => NomenclaturesTable::class];
        $this->Nomenclatures = $this->getTableLocator()->get('Nomenclatures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Nomenclatures);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NomenclaturesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\NomenclaturesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
