<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nomenclatures Model
 *
 * @property \App\Model\Table\NomenclatureTypesTable&\Cake\ORM\Association\BelongsTo $NomenclatureTypes
 * @property \App\Model\Table\UnitsTable&\Cake\ORM\Association\BelongsTo $Units
 * @property \App\Model\Table\DocumentSupplierReceiptDataTable&\Cake\ORM\Association\HasMany $DocumentSupplierReceiptData
 *
 * @method \App\Model\Entity\Nomenclature newEmptyEntity()
 * @method \App\Model\Entity\Nomenclature newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Nomenclature[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nomenclature get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nomenclature findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Nomenclature patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nomenclature[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nomenclature|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nomenclature saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nomenclature[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nomenclature[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nomenclature[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nomenclature[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class NomenclaturesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('nomenclatures');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('NomenclatureTypes', [
            'foreignKey' => 'nomclature_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('DocumentSupplierReceiptData', [
            'foreignKey' => 'nomenclature_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 512)
            ->requirePresence('full_name', 'create')
            ->notEmptyString('full_name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('nomclature_type_id', 'NomenclatureTypes'), ['errorField' => 'nomclature_type_id']);
        $rules->add($rules->existsIn('unit_id', 'Units'), ['errorField' => 'unit_id']);

        return $rules;
    }
}
