<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContragentTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContragentTypesTable Test Case
 */
class ContragentTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContragentTypesTable
     */
    protected $ContragentTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ContragentTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ContragentTypes') ? [] : ['className' => ContragentTypesTable::class];
        $this->ContragentTypes = $this->getTableLocator()->get('ContragentTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ContragentTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContragentTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
