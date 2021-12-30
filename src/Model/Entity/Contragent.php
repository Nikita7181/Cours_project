<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contragent Entity
 *
 * @property int $id
 * @property string $name
 * @property string $fullName
 * @property string $inn
 * @property string $kpp
 * @property int $contragent_type_id
 * @property int $delete_mark
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \App\Model\Entity\ContragentType $contragent_type
 * 
 */
class Contragent extends Entity
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
        'fullName' => true,
        'inn' => true,
        'kpp' => true,
        'contragent_type_id' => true,
        'contragent_type' => true,
        'delete_mark' => true,
        'created' => true,
        'modified' => true,
    ];
}
