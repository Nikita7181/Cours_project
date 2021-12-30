<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentSalesDataFixture
 */
class DocumentSalesDataFixture extends TestFixture
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
                'document_sales_id' => 1,
                'nomenclature_id' => 1,
                'count' => 1,
                'price' => 1.5,
                'full_price' => 1.5,
                'created' => 1640261410,
                'modified' => 1640261410,
            ],
        ];
        parent::init();
    }
}
