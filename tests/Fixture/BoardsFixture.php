<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BoardsFixture
 */
class BoardsFixture extends TestFixture
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
                'owner' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-03-29 14:20:28',
                'modified' => '2023-03-29 14:20:28',
            ],
        ];
        parent::init();
    }
}
