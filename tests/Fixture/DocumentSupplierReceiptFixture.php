<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentSupplierReceiptFixture
 */
class DocumentSupplierReceiptFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'document_supplier_receipt';
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
                'document_date' => 1637586763,
                'contragent_id' => 1,
                'delete_mark' => 1,
                'documet_price' => 1.5,
            ],
        ];
        parent::init();
    }
}
