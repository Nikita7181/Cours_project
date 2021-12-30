<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NomeclatureTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NomeclatureTypesTable Test Case
 */
class NomeclatureTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NomeclatureTypesTable
     */
    protected $NomeclatureTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.NomeclatureTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NomeclatureTypes') ? [] : ['className' => NomeclatureTypesTable::class];
        $this->NomeclatureTypes = $this->getTableLocator()->get('NomeclatureTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->NomeclatureTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NomeclatureTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
