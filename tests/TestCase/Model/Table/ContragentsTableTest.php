<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContragentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContragentsTable Test Case
 */
class ContragentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContragentsTable
     */
    protected $Contragents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Contragents',
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
        $config = $this->getTableLocator()->exists('Contragents') ? [] : ['className' => ContragentsTable::class];
        $this->Contragents = $this->getTableLocator()->get('Contragents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Contragents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContragentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ContragentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
