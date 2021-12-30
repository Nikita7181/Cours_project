<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DocumentSupplierReceipt Model
 *
 * @property \App\Model\Table\ContragentsTable&\Cake\ORM\Association\BelongsTo $Contragents
 * @property \App\Model\Table\DocumentSupplierReceiptDataTable&\Cake\ORM\Association\HasMany $DocumentSupplierReceiptData
 *
 * @method \App\Model\Entity\DocumentSupplierReceipt newEmptyEntity()
 * @method \App\Model\Entity\DocumentSupplierReceipt newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentSupplierReceipt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentSupplierReceipt get($primaryKey, $options = [])
 * @method \App\Model\Entity\DocumentSupplierReceipt findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DocumentSupplierReceipt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentSupplierReceipt[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentSupplierReceipt|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentSupplierReceipt saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentSupplierReceipt[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DocumentSupplierReceipt[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DocumentSupplierReceipt[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DocumentSupplierReceipt[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DocumentSupplierReceiptTable extends Table
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

        $this->setTable('document_supplier_receipt');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Contragents', [
            'foreignKey' => 'contragent_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('DocumentSupplierReceiptData', [
            'foreignKey' => 'document_supplier_receipt_id',
            'joinType' => 'INNER',
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
            ->scalar('document_number')
            ->maxLength('document_number', 8)
            ->requirePresence('document_number', 'create')
            ->notEmptyString('document_number');

        $validator
            ->dateTime('document_date')
            ->requirePresence('document_date', 'create')
            ->notEmptyDateTime('document_date');

        $validator
            ->requirePresence('delete_mark', 'create')
            ->notEmptyString('delete_mark');

        $validator
            ->decimal('documet_price')
            ->requirePresence('documet_price', 'create')
            ->notEmptyString('documet_price');

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
        $rules->add($rules->existsIn('contragent_id', 'Contragents'), ['errorField' => 'contragent_id']);

        return $rules;
    }
}
