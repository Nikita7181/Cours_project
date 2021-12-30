<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DocumentSales Controller
 *
 * @property \App\Model\Table\DocumentSalesTable $DocumentSales
 * @method \App\Model\Entity\DocumentSale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentSalesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contragents', 'DocumentSalesData' => ['Nomenclatures' => ['Units'],],],
        ];
        $documentSales = $this->paginate($this->DocumentSales);

        $this->set(compact('documentSales'));
    }

    /**
     * View method
     *
     * @param string|null $id Document Sale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documentSale = $this->DocumentSales->get($id, [
            'contain' => ['Contragents', 'DocumentSalesData' => ['Nomenclatures' => ['Units'],],],
        ]);

        $nomenclatures_opt = $this->fetchTable('Nomenclatures')->find()->all();
        $contragents_opt = $this->fetchTable('Contragents')->find()->all();
        $nomenclatures = $this->DocumentSales->DocumentSalesData->Nomenclatures->find('list', ['limit' => 200])->all();

        $this->set(compact(['documentSale','nomenclatures','nomenclatures_opt','contragents_opt']));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentSale = $this->DocumentSales->newEmptyEntity();
        if ($this->request->is('post')) {
            $documentSale = $this->DocumentSales->patchEntity($documentSale, $this->request->getData());
            if ($this->DocumentSales->save($documentSale)) {
                $this->Flash->success(__('Документ успешно добавлен'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ошибка создания документа'));
        }
        $contragents = $this->DocumentSales->Contragents->find('list', ['limit' => 200])->all();
        $this->set(compact('documentSale', 'contragents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document Sale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentSale = $this->DocumentSales->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentSale = $this->DocumentSales->patchEntity($documentSale, $this->request->getData());
            if ($this->DocumentSales->save($documentSale)) {
                $this->Flash->success(__('Документ успешно изменен'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ошибка изменения документа'));
        }
        $contragents = $this->DocumentSales->Contragents->find('list', ['limit' => 200])->all();
        $this->set(compact('documentSale', 'contragents'));
    }



    /**
     * Delete method
     *
     * @param string|null $id Document Sales id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $documentSale = $this->DocumentSales->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //exit($documentSupplierReceipt);
            $documentSale = $this->DocumentSales->patchEntity($documentSale, ["delete_mark" => ($documentSale->delete_mark == 0) ? 1 : 0]);
            
            if ($this->DocumentSales->save($documentSale)) {
                $this->Flash->success(__( ($documentSale->delete_mark == 0) ? 'Пометка удаления снята' : 'Документ помечен на удаление'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ошибка установки пометки удаления документа'));
        }
    }
    /**
     * Delete method
     *
     * @param string|null $id Document Sale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteFromDatabase($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentSale = $this->DocumentSales->get($id);
        if ($this->DocumentSales->delete($documentSale)) {
            $this->Flash->success(__('Документ успешно удален'));
        } else {
            $this->Flash->error(__('The document sale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
