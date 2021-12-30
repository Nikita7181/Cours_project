<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DocumentSalesData Model
 *
 * @property \App\Model\Table\DocumentSalesTable&\Cake\ORM\Association\BelongsTo $DocumentSales
 * @property \App\Model\Table\NomenclaturesTable&\Cake\ORM\Association\BelongsTo $Nomenclatures
 *
 * @method \App\Model\Entity\DocumentSalesData newEmptyEntity()
 * @method \App\Model\Entity\DocumentSalesData newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentSalesData[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentSalesData get($primaryKey, $options = [])
 * @method \App\Model\Entity\DocumentSalesData findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DocumentSalesData patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentSalesData[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentSalesData|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentSalesData saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentSalesData[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DocumentSalesData[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DocumentSalesData[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DocumentSalesData[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DocumentSalesDataTable extends Table
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

        $this->setTable('document_sales_data');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('DocumentSales', [
            'foreignKey' => 'document_sales_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Nomenclatures', [
            'foreignKey' => 'nomenclature_id',
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
            ->integer('count')
            ->requirePresence('count', 'create')
            ->notEmptyString('count');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->decimal('full_price')
            ->requirePresence('full_price', 'create')
            ->notEmptyString('full_price');

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
        $rules->add($rules->existsIn('document_sales_id', 'DocumentSales'), ['errorField' => 'document_sales_id']);
        $rules->add($rules->existsIn('nomenclature_id', 'Nomenclatures'), ['errorField' => 'nomenclature_id']);

        return $rules;
    }
}
