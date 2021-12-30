<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentSalesData Entity
 *
 * @property int $id
 * @property int $document_sales_id
 * @property int $nomenclature_id
 * @property int $count
 * @property string $price
 * @property string $full_price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\DocumentSale $document_sale
 * @property \App\Model\Entity\Nomenclature $nomenclature
 */
class DocumentSalesData extends Entity
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
        'document_sales_id' => true,
        'nomenclature_id' => true,
        'count' => true,
        'price' => true,
        'full_price' => true,
        'created' => true,
        'modified' => true,
        'document_sale' => true,
        'nomenclature' => true,
        'document_sale' => true,
    ];
}
