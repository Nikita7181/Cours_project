<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContragentsFixture
 */
class ContragentsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'fullName' => 'Lorem ipsum dolor sit amet',
                'inn' => 'Lorem ipsu',
                'kpp' => 'Lorem ipsu',
                'contragent_type_id' => 1,
            ],
        ];
        parent::init();
    }
}
