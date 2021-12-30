<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NomenclatureTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NomenclatureTypesTable Test Case
 */
class NomenclatureTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NomenclatureTypesTable
     */
    protected $NomenclatureTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.NomenclatureTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NomenclatureTypes') ? [] : ['className' => NomenclatureTypesTable::class];
        $this->NomenclatureTypes = $this->getTableLocator()->get('NomenclatureTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->NomenclatureTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NomenclatureTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
