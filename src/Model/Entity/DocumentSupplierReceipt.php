<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentSupplierReceipt Entity
 *
 * @property int $id
 * @property string $document_number
 * @property \Cake\I18n\FrozenTime $document_date
 * @property int $contragent_id
 * @property int $delete_mark
 * @property string $documet_price
 *
 * @property \App\Model\Entity\Contragent $contragent
 * @property \App\Model\Entity\DocumentSupplierReceiptData[] $document_supplier_receipt_data
 */
class DocumentSupplierReceipt extends Entity
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
        'document_number' => true,
        'document_date' => true,
        'contragent_id' => true,
        'delete_mark' => true,
        'documet_price' => true,
        'contragent' => true,
        'document_supplier_receipt_data' => true,
    ];
}
