<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersBoardsFixture
 */
class UsersBoardsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'board_id' => 1,
                'user_id' => 1,
                'created' => '2023-04-28 16:00:35',
                'modified' => '2023-04-28 16:00:35',
            ],
        ];
        parent::init();
    }
}
