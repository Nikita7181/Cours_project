<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contragents Controller
 *
 * @property \App\Model\Table\ContragentsTable $Contragents
 * @method \App\Model\Entity\Contragent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContragentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $contragentTypes = $this->Contragents->ContragentTypes->find('list', ['limit' => 200]);
        $this->paginate = [
            'contain' => ['ContragentTypes'],
        ];
        $contragents = $this->paginate($this->Contragents);
        

        $this->set(compact('contragents', 'contragentTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Contragent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contragentTypes = $this->Contragents->ContragentTypes->find('list', ['limit' => 200]);
        $contragent = $this->Contragents->get($id, [
            'contain' => ['ContragentTypes'],
        ]);

        

        $this->set(compact('contragent', 'contragentTypes' ));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contragent = $this->Contragents->newEmptyEntity();
        if ($this->request->is('post')) {
            $contragent = $this->Contragents->patchEntity($contragent, $this->request->getData());
            $contragent->created = date("Y-m-d h:i:s", time());
            if ($this->Contragents->save($contragent)) {
                $this->Flash->success(__('The contragent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contragent could not be saved. Please, try again.'));
        }
        $contragentTypes = $this->Contragents->ContragentTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('contragent', 'contragentTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contragent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contragent = $this->Contragents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contragent = $this->Contragents->patchEntity($contragent, $this->request->getData());
            if ($this->Contragents->save($contragent)) {
                $this->Flash->success(__('The contragent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contragent could not be saved. Please, try again.'));
        }
        $contragentTypes = $this->Contragents->ContragentTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('contragent', 'contragentTypes'));
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
        $contragent = $this->Contragents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //exit($documentSupplierReceipt);
            $contragent = $this->Contragents->patchEntity($contragent, ["delete_mark" => ($contragent->delete_mark == 0) ? 1 : 0]);
            
            if ($this->Contragents->save($contragent)) {
                $this->Flash->success(__( ($contragent->delete_mark == 0) ? 'Пометка удаления снята' : 'Документ помечен на удаление'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ошибка установки пометки удаления документа'));
        }
    }


    /**
     * Delete from Database method
     *
     * @param string|null $id Contragent id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteFromDatabase($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contragent = $this->Contragents->get($id);
        if ($this->Contragents->delete($contragent)) {
            $this->Flash->success(__('The contragent has been deleted.'));
        } else {
            $this->Flash->error(__('The contragent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
