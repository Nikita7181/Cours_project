<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * DocumentSupplierReceiptData Controller
 *
 * @property \App\Model\Table\DocumentSupplierReceiptDataTable $DocumentSupplierReceiptData
 * @method \App\Model\Entity\DocumentSupplierReceiptData[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentSupplierReceiptDataController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DocumentSupplierReceipt', 'Nomenclatures'],
        ];
        $documentSupplierReceiptData = $this->paginate($this->DocumentSupplierReceiptData);

        $this->set(compact('documentSupplierReceiptData'));
    }

    /**
     * View method
     *
     * @param string|null $id Document Supplier Receipt Data id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->get($id, [
            'contain' => ['DocumentSupplierReceipt', 'Nomenclatures'],
        ]);

        $this->set(compact('documentSupplierReceiptData'));
    }


    /**
     * View method
     *
     * @param string|null $id Document Supplier Receipt Data id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ajaxGet()
    {
        $this->autoRender = false;
        $id = $this->request->getData('id');

        try {
            $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->get($id, [
                'contain' => ['DocumentSupplierReceipt', 'Nomenclatures'],
            ]);

            $resultJ = json_encode(array('result' => 'success', 'id' => $id, 'nomenclature_id' => $documentSupplierReceiptData->nomenclature_id, 'count' => $documentSupplierReceiptData->count, 'price' => $documentSupplierReceiptData->price, 'full_price' => $documentSupplierReceiptData->full_price));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        }
        catch (Exception $e)
        {
            $resultJ = json_encode(array('result' => 'error', 'errors' => $e->getMessage()));

            return $this->response->withType('application/json')->withStringBody($resultJ);

        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->newEmptyEntity();
        if ($this->request->is('post')) {
            $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->patchEntity($documentSupplierReceiptData, $this->request->getData());
            if ($this->DocumentSupplierReceiptData->save($documentSupplierReceiptData)) {
                $this->Flash->success(__('The document supplier receipt data has been saved.'));

                $allRows = $this->DocumentSupplierReceiptData->find()->where(['document_supplier_receipt_id =' => $documentSupplierReceiptData->document_supplier_receipt_id]);
            
                //$allRows = $this->DocumentSupplierReceiptData->find('all', ['condition' => ['document_supplier_receipt_id =' => $documentSupplierReceiptData->document_supplier_receipt_id]]);
                $origDocTable= $this->getTableLocator()->get('DocumentSupplierReceipt');
                $origDoc = $origDocTable->get($documentSupplierReceiptData->document_supplier_receipt_id, ['contain' => [],]);

                $docSum = 0;
                foreach ($allRows as $row):
                    $docSum = $docSum + $row->full_price;
                endforeach;
                //$origDoc = $this->fetchTable('DocumentSupplierReceipt')->get($documentSupplierReceiptData->document_supplier_receipt_id, [
                //     'contain' => [],
                // ]) ;
                $origDoc->documet_price = $docSum;
                
                $origDocTable->save($origDoc);




                

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document supplier receipt data could not be saved. Please, try again.'));
        }
        $documentSupplierReceipt = $this->DocumentSupplierReceiptData->DocumentSupplierReceipt->find('list', ['limit' => 200])->all();
        $nomenclatures = $this->DocumentSupplierReceiptData->Nomenclatures->find('list', ['limit' => 200])->all();
        $this->set(compact('documentSupplierReceiptData', 'documentSupplierReceipt', 'nomenclatures'));
    }

    /**
     * Add method from ajax request
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function ajaxAdd()
    {
        $this->autoRender = false; //
        $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->newEmptyEntity();

        $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->patchEntity($documentSupplierReceiptData, $this->request->getData());
        //die($documentSupplierReceiptData);
 
        if ($this->DocumentSupplierReceiptData->save($documentSupplierReceiptData)) {

            $allRows = $this->DocumentSupplierReceiptData->find()->where(['document_supplier_receipt_id =' => $documentSupplierReceiptData->document_supplier_receipt_id]);
            
            $origDocTable= $this->getTableLocator()->get('DocumentSupplierReceipt');
            $origDoc = $origDocTable->get($documentSupplierReceiptData->document_supplier_receipt_id, ['contain' => [],]);

            $docSum = 0;
            foreach ($allRows as $row):
                $docSum = $docSum + $row->full_price;
            endforeach;

            $origDoc->documet_price = $docSum;
            
            $origDocTable->save($origDoc);

          

            $resultJ = json_encode(array('result' => 'success'));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        } else {
            $resultJ = json_encode(array('result' => 'error', 'errors' => $documentSupplierReceiptData->getErrors()));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Document Supplier Receipt Data id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->patchEntity($documentSupplierReceiptData, $this->request->getData());
            if ($this->DocumentSupplierReceiptData->save($documentSupplierReceiptData)) {
                $this->Flash->success(__('The document supplier receipt data has been saved.'));
                $allRows = $this->DocumentSupplierReceiptData->find()->where(['document_supplier_receipt_id =' => $documentSupplierReceiptData->document_supplier_receipt_id]);
            
                $origDocTable= $this->getTableLocator()->get('DocumentSupplierReceipt');
                $origDoc = $origDocTable->get($documentSupplierReceiptData->document_supplier_receipt_id, ['contain' => [],]);
    
                $docSum = 0;
                foreach ($allRows as $row):
                    $docSum = $docSum + $row->full_price;
                endforeach;
    
                $origDoc->documet_price = $docSum;
                
                $origDocTable->save($origDoc);
                return $this->redirect(['controller' => 'DocumentSupplierReceipt', 'action' => 'view',$documentSupplierReceiptData->document_supplier_receipt_id]);
            }
            $this->Flash->error(__('The document supplier receipt data could not be saved. Please, try again.'));
        }
        $documentSupplierReceipt = $this->DocumentSupplierReceiptData->DocumentSupplierReceipt->find('list', ['limit' => 200])->all();
        $nomenclatures = $this->DocumentSupplierReceiptData->Nomenclatures->find('list', ['limit' => 200])->all();
        $this->set(compact('documentSupplierReceiptData', 'documentSupplierReceipt', 'nomenclatures'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Document Supplier Receipt Data id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ajaxEdit()
    {
        $this->autoRender = false;
        $id = $this->request->getData('id');
        $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->get($id, [
            'contain' => [],
        ]);
        $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->patchEntity($documentSupplierReceiptData, $this->request->getData());
        //die($documentSupplierReceiptData);
 
        if ($this->DocumentSupplierReceiptData->save($documentSupplierReceiptData)) {
            $allRows = $this->DocumentSupplierReceiptData->find()->where(['document_supplier_receipt_id =' => $documentSupplierReceiptData->document_supplier_receipt_id]);
            
            $origDocTable= $this->getTableLocator()->get('DocumentSupplierReceipt');
            $origDoc = $origDocTable->get($documentSupplierReceiptData->document_supplier_receipt_id, ['contain' => [],]);

            $docSum = 0;
            foreach ($allRows as $row):
                $docSum = $docSum + $row->full_price;
            endforeach;

            $origDoc->documet_price = $docSum;
            
            $origDocTable->save($origDoc);
            $resultJ = json_encode(array('result' => 'success'));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        } else {
            $resultJ = json_encode(array('result' => 'error', 'errors' => $documentSupplierReceiptData->getErrors()));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        }
    }


    /**
     * Delete method
     *
     * @param string|null $id Document Supplier Receipt Data id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->get($id);
        if ($this->DocumentSupplierReceiptData->delete($documentSupplierReceiptData)) {
            $allRows = $this->DocumentSupplierReceiptData->find()->where(['document_supplier_receipt_id =' => $documentSupplierReceiptData->document_supplier_receipt_id]);
            
            $origDocTable= $this->getTableLocator()->get('DocumentSupplierReceipt');
            $origDoc = $origDocTable->get($documentSupplierReceiptData->document_supplier_receipt_id, ['contain' => [],]);

            $docSum = 0;
            foreach ($allRows as $row):
                $docSum = $docSum + $row->full_price;
            endforeach;

            $origDoc->documet_price = $docSum;
            
            $origDocTable->save($origDoc);            
            $this->Flash->success(__('The document supplier receipt data has been deleted.'));
        } else {
            $this->Flash->error(__('The document supplier receipt data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Document Supplier Receipt Data id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ajaxDelete()
    {
        $this->autoRender = false;
        $id = $this->request->getData('id');

        $documentSupplierReceiptData = $this->DocumentSupplierReceiptData->get($id);


        if ($this->DocumentSupplierReceiptData->delete($documentSupplierReceiptData)) {
            $allRows = $this->DocumentSupplierReceiptData->find()->where(['document_supplier_receipt_id =' => $documentSupplierReceiptData->document_supplier_receipt_id]);
            
            $origDocTable= $this->getTableLocator()->get('DocumentSupplierReceipt');
            $origDoc = $origDocTable->get($documentSupplierReceiptData->document_supplier_receipt_id, ['contain' => [],]);

            $docSum = 0;
            foreach ($allRows as $row):
                $docSum = $docSum + $row->full_price;
            endforeach;

            $origDoc->documet_price = $docSum;
            
            $origDocTable->save($origDoc);
            $resultJ = json_encode(array('data' => ['result' => 'success', 'id' => $id]));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        } else {
            $resultJ = json_encode(array('result' => 'error', 'errors' => $documentSupplierReceiptData->getErrors()));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        }
    }
}
