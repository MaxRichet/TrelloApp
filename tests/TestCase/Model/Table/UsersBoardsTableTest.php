<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersBoardsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersBoardsTable Test Case
 */
class UsersBoardsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersBoardsTable
     */
    protected $UsersBoards;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UsersBoards',
        'app.Boards',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UsersBoards') ? [] : ['className' => UsersBoardsTable::class];
        $this->UsersBoards = $this->getTableLocator()->get('UsersBoards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UsersBoards);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersBoardsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsersBoardsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
