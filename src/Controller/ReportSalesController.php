<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Units Controller
 *
 * @property \App\Model\Table\UnitsTable $Units
 * @method \App\Model\Entity\Unit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportSalesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //$units = $this->paginate($this->Units);

        $documentsSales = $this->fetchTable('DocumentSalesData')->find('all',['contain' => 'DocumentSales'])->where(['delete_mark =' => 0])->all();

        $this->set(compact('documentsSales'));
    }

}