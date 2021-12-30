<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contragents Model
 *
 * @property \App\Model\Table\ContragentTypesTable&\Cake\ORM\Association\BelongsTo $ContragentTypes
 *
 * @method \App\Model\Entity\Contragent newEmptyEntity()
 * @method \App\Model\Entity\Contragent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Contragent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contragent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contragent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Contragent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contragent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contragent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contragent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contragent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contragent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contragent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contragent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ContragentsTable extends Table
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

        $this->setTable('contragents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ContragentTypes', [
            'foreignKey' => 'contragent_type_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('DocumentSupplierReceipt', [
            'foreignKey' => 'contragent_id',
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
            ->scalar('fullName')
            ->maxLength('fullName', 255)
            ->requirePresence('fullName', 'create')
            ->notEmptyString('fullName');

        $validator
            ->scalar('inn')
            ->maxLength('inn', 12)
            ->requirePresence('inn', 'create')
            ->notEmptyString('inn');

        $validator
            ->scalar('kpp')
            ->maxLength('kpp', 12)
            ->requirePresence('kpp', 'create')
            ->notEmptyString('kpp');

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
        $rules->add($rules->existsIn('contragent_type_id', 'ContragentTypes'), ['errorField' => 'contragent_type_id']);

        return $rules;
    }
}
