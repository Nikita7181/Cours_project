<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nomenclature Entity
 *
 * @property int $id
 * @property string $name
 * @property string $full_name
 * @property int $nomclature_type_id
 * @property int $unit_id
 *
 * @property \App\Model\Entity\NomenclatureType $nomenclature_type
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\DocumentSupplierReceiptData[] $document_supplier_receipt_data
 */
class Nomenclature extends Entity
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
        'name' => true,
        'full_name' => true,
        'nomclature_type_id' => true,
        'unit_id' => true,
        'nomenclature_type' => true,
        'unit' => true,
        'document_supplier_receipt_data' => true,
    ];
}
