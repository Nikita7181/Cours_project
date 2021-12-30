<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * DocumentSalesData Controller
 *
 * @property \App\Model\Table\DocumentSalesDataTable $DocumentSalesData
 * @method \App\Model\Entity\DocumentSalesData[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentSalesDataController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DocumentSales', 'Nomenclatures'],
        ];
        $documentSalesData = $this->paginate($this->DocumentSalesData);

        $this->set(compact('documentSalesData'));
    }

    /**
     * View method
     *
     * @param string|null $id Document Sales Data id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documentSalesData = $this->DocumentSalesData->get($id, [
            'contain' => ['DocumentSales', 'Nomenclatures'],
        ]);

        $this->set(compact('documentSalesData'));
    }

    /**
     * View method
     *
     * @param string|null $id Document Sales Data id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ajaxGet()
    {
        $this->autoRender = false;
        $id = $this->request->getData('id');

        try {
            $documentSalesData = $this->documentSalesData->get($id, [
                'contain' => ['DocumentSales', 'Nomenclatures'],
            ]);

            $resultJ = json_encode(array('result' => 'success', 'id' => $id, 'nomenclature_id' => $documentSalesData->nomenclature_id, 'count' => $documentSalesData->count, 'price' => $documentSalesData->price, 'full_price' => $documentSalesData->full_price));

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
        $documentSalesData = $this->DocumentSalesData->newEmptyEntity();
        if ($this->request->is('post')) {
            $documentSalesData = $this->DocumentSalesData->patchEntity($documentSalesData, $this->request->getData());
            if ($this->DocumentSalesData->save($documentSalesData)) {
                $this->Flash->success(__('The document sales data has been saved.'));
                $allRows = $this->DocumentSalesData->find()->where(['document_sales_id =' => $documentSalesData->document_sales_id]);
            
                $origDocTable= $this->getTableLocator()->get('DocumentSales');
                $origDoc = $origDocTable->get($documentSalesData->document_sales_id, ['contain' => [],]);
    
                $docSum = 0;
                foreach ($allRows as $row):
                    $docSum = $docSum + $row->full_price;
                endforeach;
    
                $origDoc->document_price = $docSum;
                
                $origDocTable->save($origDoc);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document sales data could not be saved. Please, try again.'));
        }
        $documentSales = $this->DocumentSalesData->DocumentSales->find('list', ['limit' => 200])->all();
        $nomenclatures = $this->DocumentSalesData->Nomenclatures->find('list', ['limit' => 200])->all();
        $this->set(compact('documentSalesData', 'documentSales', 'nomenclatures'));
    }


    /**
     * Add method from ajax request
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function ajaxAdd()
    {
        $this->autoRender = false; //
        $documentSalesData = $this->DocumentSalesData->newEmptyEntity();

        $documentSalesData = $this->DocumentSalesData->patchEntity($documentSalesData, $this->request->getData());
        //die($documentSupplierReceiptData);
 
        if ($this->DocumentSalesData->save($documentSalesData)) {
            $allRows = $this->DocumentSalesData->find()->where(['document_sales_id =' => $documentSalesData->document_sales_id]);
            
            $origDocTable= $this->getTableLocator()->get('DocumentSales');
            $origDoc = $origDocTable->get($documentSalesData->document_sales_id, ['contain' => [],]);

            $docSum = 0;
            foreach ($allRows as $row):
                $docSum = $docSum + $row->full_price;
            endforeach;

            $origDoc->document_price = $docSum;
            
            $origDocTable->save($origDoc);
            $resultJ = json_encode(array('result' => 'success'));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        } else {
            $resultJ = json_encode(array('result' => 'error', 'errors' => $documentSalesData->getErrors()));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Document Sales Data id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentSalesData = $this->DocumentSalesData->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentSalesData = $this->DocumentSalesData->patchEntity($documentSalesData, $this->request->getData());
            if ($this->DocumentSalesData->save($documentSalesData)) {
                $this->Flash->success(__('The document sales data has been saved.'));
                $allRows = $this->DocumentSalesData->find()->where(['document_sales_id =' => $documentSalesData->document_sales_id]);
            
                $origDocTable= $this->getTableLocator()->get('DocumentSales');
                $origDoc = $origDocTable->get($documentSalesData->document_sales_id, ['contain' => [],]);
    
                $docSum = 0;
                foreach ($allRows as $row):
                    $docSum = $docSum + $row->full_price;
                endforeach;
    
                $origDoc->document_price = $docSum;
                
                $origDocTable->save($origDoc);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document sales data could not be saved. Please, try again.'));
        }
        $documentSales = $this->DocumentSalesData->DocumentSales->find('list', ['limit' => 200])->all();
        $nomenclatures = $this->DocumentSalesData->Nomenclatures->find('list', ['limit' => 200])->all();
        $this->set(compact('documentSalesData', 'documentSales', 'nomenclatures'));
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

        //print_r($id); die();
        $documentSalesData = $this->DocumentSalesData->get($id, [
            'contain' => [],
        ]);
        $documentSalesData = $this->DocumentSalesData->patchEntity($documentSalesData, $this->request->getData());
        //die($documentSupplierReceiptData);
 
        if ($this->DocumentSalesData->save($documentSalesData)) {
            $allRows = $this->DocumentSalesData->find()->where(['document_sales_id =' => $documentSalesData->document_sales_id]);
            
            $origDocTable= $this->getTableLocator()->get('DocumentSales');
            $origDoc = $origDocTable->get($documentSalesData->document_sales_id, ['contain' => [],]);

            $docSum = 0;
            foreach ($allRows as $row):
                $docSum = $docSum + $row->full_price;
            endforeach;

            $origDoc->document_price = $docSum;
            
            $origDocTable->save($origDoc);
            $resultJ = json_encode(array('result' => 'success'));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        } else {
            $resultJ = json_encode(array('result' => 'error', 'errors' => $documentSalesData->getErrors()));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Document Sales Data id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentSalesData = $this->DocumentSalesData->get($id);
        if ($this->DocumentSalesData->delete($documentSalesData)) {
            $allRows = $this->DocumentSalesData->find()->where(['document_sales_id =' => $documentSalesData->document_sales_id]);
            
            $origDocTable= $this->getTableLocator()->get('DocumentSales');
            $origDoc = $origDocTable->get($documentSalesData->document_sales_id, ['contain' => [],]);

            $docSum = 0;
            foreach ($allRows as $row):
                $docSum = $docSum + $row->full_price;
            endforeach;

            $origDoc->document_price = $docSum;
            
            $origDocTable->save($origDoc);            
            $this->Flash->success(__('The document sales data has been deleted.'));
        } else {
            $this->Flash->error(__('The document sales data could not be deleted. Please, try again.'));
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

        $documentSalesData = $this->DocumentSalesData->get($id);


        if ($this->DocumentSalesData->delete($documentSalesData)) {
            $allRows = $this->DocumentSalesData->find()->where(['document_sales_id =' => $documentSalesData->document_sales_id]);
            
            $origDocTable= $this->getTableLocator()->get('DocumentSales');
            $origDoc = $origDocTable->get($documentSalesData->document_sales_id, ['contain' => [],]);

            $docSum = 0;
            foreach ($allRows as $row):
                $docSum = $docSum + $row->full_price;
            endforeach;

            $origDoc->document_price = $docSum;
            
            $origDocTable->save($origDoc);
            $resultJ = json_encode(array('data' => ['result' => 'success', 'id' => $id]));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        } else {
            $resultJ = json_encode(array('result' => 'error', 'errors' => $documentSalesData->getErrors()));

            return $this->response->withType('application/json')->withStringBody($resultJ);
        }
    }
}
