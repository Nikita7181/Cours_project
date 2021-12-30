<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Nomenclatures Controller
 *
 * @property \App\Model\Table\NomenclaturesTable $Nomenclatures
 * @method \App\Model\Entity\Nomenclature[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NomenclaturesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['NomenclatureTypes', 'Units'],
        ];
        $nomenclatures = $this->paginate($this->Nomenclatures);

        $this->set(compact('nomenclatures'));
    }

    /**
     * View method
     *
     * @param string|null $id Nomenclature id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nomenclature = $this->Nomenclatures->get($id, [
            'contain' => ['NomenclatureTypes', 'Units'],
        ]);

        $this->set(compact('nomenclature'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nomenclature = $this->Nomenclatures->newEmptyEntity();
        if ($this->request->is('post')) {
            $nomenclature = $this->Nomenclatures->patchEntity($nomenclature, $this->request->getData());
            if ($this->Nomenclatures->save($nomenclature)) {
                $this->Flash->success(__('The nomenclature has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nomenclature could not be saved. Please, try again.'));
        }
        $nomenclatureTypes = $this->Nomenclatures->NomenclatureTypes->find('list', ['limit' => 200])->all();
        $units = $this->Nomenclatures->Units->find('list', ['limit' => 200])->all();
        $this->set(compact('nomenclature', 'nomenclatureTypes', 'units'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nomenclature id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nomenclature = $this->Nomenclatures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nomenclature = $this->Nomenclatures->patchEntity($nomenclature, $this->request->getData());
            if ($this->Nomenclatures->save($nomenclature)) {
                $this->Flash->success(__('The nomenclature has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nomenclature could not be saved. Please, try again.'));
        }
        $nomenclatureTypes = $this->Nomenclatures->NomenclatureTypes->find('list', ['limit' => 200])->all();
        $units = $this->Nomenclatures->Units->find('list', ['limit' => 200])->all();
        $this->set(compact('nomenclature', 'nomenclatureTypes', 'units'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nomenclature id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nomenclature = $this->Nomenclatures->get($id);
        if ($this->Nomenclatures->delete($nomenclature)) {
            $this->Flash->success(__('The nomenclature has been deleted.'));
        } else {
            $this->Flash->error(__('The nomenclature could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
