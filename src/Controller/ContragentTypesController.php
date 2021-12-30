<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ContragentTypes Controller
 *
 * @property \App\Model\Table\ContragentTypesTable $ContragentTypes
 * @method \App\Model\Entity\ContragentType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContragentTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $contragentTypes = $this->paginate($this->ContragentTypes);

        $this->set(compact('contragentTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Contragent Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contragentType = $this->ContragentTypes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('contragentType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contragentType = $this->ContragentTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $contragentType = $this->ContragentTypes->patchEntity($contragentType, $this->request->getData());
            if ($this->ContragentTypes->save($contragentType)) {
                $this->Flash->success(__('The contragent type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contragent type could not be saved. Please, try again.'));
        }
        $this->set(compact('contragentType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contragent Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contragentType = $this->ContragentTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contragentType = $this->ContragentTypes->patchEntity($contragentType, $this->request->getData());
            if ($this->ContragentTypes->save($contragentType)) {
                $this->Flash->success(__('The contragent type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contragent type could not be saved. Please, try again.'));
        }
        $this->set(compact('contragentType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contragent Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contragentType = $this->ContragentTypes->get($id);
        if ($this->ContragentTypes->delete($contragentType)) {
            $this->Flash->success(__('The contragent type has been deleted.'));
        } else {
            $this->Flash->error(__('The contragent type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
