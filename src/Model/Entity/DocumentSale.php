<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentSale Entity
 *
 * @property int $id
 * @property string $document_number
 * @property \Cake\I18n\FrozenTime $document_date
 * @property int $contragent_id
 * @property int $delete_mark
 * @property string $document_price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Contragent $contragent
 * @property \App\Model\Entity\DocumentSalesData[] $document_sales_data
 */
class DocumentSale extends Entity
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
        'document_price' => true,
        'created' => true,
        'modified' => true,
        'contragent' => true,
        'document_sales' =>true,
    ];
}
