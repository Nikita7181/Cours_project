<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DocumentSupplierReceipt Controller
 *
 * @property \App\Model\Table\DocumentSupplierReceiptTable $DocumentSupplierReceipt
 * @method \App\Model\Entity\DocumentSupplierReceipt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentSupplierReceiptController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contragents', 'DocumentSupplierReceiptData' => ['Nomenclatures' => ['Units'],],],
        ];
        $documentSupplierReceipt = $this->paginate($this->DocumentSupplierReceipt);

        $this->set(compact('documentSupplierReceipt'));
    }

    /**
     * View method
     *
     * @param string|null $id Document Supplier Receipt id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $documentSupplierReceipt = $this->DocumentSupplierReceipt->get($id, [
            'contain' => ['Contragents', 'DocumentSupplierReceiptData' => ['Nomenclatures' => ['Units'],],],
        ]);
        $nomenclatures_opt = $this->fetchTable('Nomenclatures')->find()->all();
        $contragents_opt = $this->fetchTable('Contragents')->find()->all();
        $nomenclatures = $this->DocumentSupplierReceipt->DocumentSupplierReceiptData->Nomenclatures->find('list', ['limit' => 200])->all();

        $this->set(compact(['documentSupplierReceipt','nomenclatures','nomenclatures_opt','contragents_opt']));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentSupplierReceipt = $this->DocumentSupplierReceipt->newEmptyEntity();
        if ($this->request->is('post')) {
            $documentSupplierReceipt = $this->DocumentSupplierReceipt->patchEntity($documentSupplierReceipt, $this->request->getData());
            if ($this->DocumentSupplierReceipt->save($documentSupplierReceipt)) {
                $this->Flash->success(__('The document supplier receipt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document supplier receipt could not be saved. Please, try again.'));
        }
        $contragents = $this->DocumentSupplierReceipt->Contragents->find('list', ['limit' => 200])->all();
        $this->set(compact('documentSupplierReceipt', 'contragents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document Supplier Receipt id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentSupplierReceipt = $this->DocumentSupplierReceipt->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentSupplierReceipt = $this->DocumentSupplierReceipt->patchEntity($documentSupplierReceipt, $this->request->getData());
            if ($this->DocumentSupplierReceipt->save($documentSupplierReceipt)) {
                $this->Flash->success(__('The document supplier receipt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document supplier receipt could not be saved. Please, try again.'));
        }
        $contragents = $this->DocumentSupplierReceipt->Contragents->find('list', ['limit' => 200])->all();
        $this->set(compact('documentSupplierReceipt', 'contragents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document Supplier Receipt id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $documentSupplierReceipt = $this->DocumentSupplierReceipt->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //exit($documentSupplierReceipt);
            $documentSupplierReceipt = $this->DocumentSupplierReceipt->patchEntity($documentSupplierReceipt, ["delete_mark" => ($documentSupplierReceipt->delete_mark == 0) ? 1 : 0]);
            
            if ($this->DocumentSupplierReceipt->save($documentSupplierReceipt)) {
                $this->Flash->success(__('The document supplier receipt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document supplier receipt could not be saved. Please, try again.'));
        }
    }

    public function deleteFromDatabase ($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentSupplierReceipt = $this->DocumentSupplierReceipt->get($id);
        if ($this->DocumentSupplierReceipt->delete($documentSupplierReceipt)) {
            $this->Flash->success(__('The document supplier receipt has been deleted.'));
        } else {
            $this->Flash->error(__('The document supplier receipt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);        
    }
}
