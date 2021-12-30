<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentSalesFixture
 */
class DocumentSalesFixture extends TestFixture
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
                'document_number' => 'Lorem ',
                'document_date' => 1640261401,
                'contragent_id' => 1,
                'delete_mark' => 1,
                'document_price' => 1.5,
                'created' => 1640261401,
                'modified' => 1640261401,
            ],
        ];
        parent::init();
    }
}
