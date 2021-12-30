<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentSupplierReceiptData Entity
 *
 * @property int $id
 * @property int $document_supplier_receipt_id
 * @property int $nomenclature_id
 * @property int $count
 * @property string $price
 * @property string $full_price
 *
 * @property \App\Model\Entity\DocumentSupplierReceipt $document_supplier_receipt
 * @property \App\Model\Entity\Nomenclature $nomenclature
 */
class DocumentSupplierReceiptData extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'document_supplier_receipt_id' => true,
        'nomenclature_id' => true,
        'count' => true,
        'price' => true,
        'full_price' => true,
        'document_supplier_receipt' => true,
        'nomenclature' => true,
    ];
}
