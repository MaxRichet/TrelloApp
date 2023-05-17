<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesFixture
 */
class CategoriesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'color' => 'Lorem',
                'created' => '2023-03-29 14:23:15',
                'modified' => '2023-03-29 14:23:15',
            ],
        ];
        parent::init();
    }
}
