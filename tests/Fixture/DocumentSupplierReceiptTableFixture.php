<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentSupplierReceiptTableFixture
 */
class DocumentSupplierReceiptTableFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'document_supplier_receipt_table';
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
                'documentNumber' => 'Lorem ',
                'nomenclature_id' => 1,
                'count' => 1.5,
                'input_price' => 1.5,
                'full_price' => 1.5,
            ],
        ];
        parent::init();
    }
}
