<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * NomenclatureTypes Controller
 *
 * @property \App\Model\Table\NomenclatureTypesTable $NomenclatureTypes
 * @method \App\Model\Entity\NomenclatureType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NomenclatureTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $nomenclatureTypes = $this->paginate($this->NomenclatureTypes);

        $this->set(compact('nomenclatureTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Nomenclature Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nomenclatureType = $this->NomenclatureTypes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('nomenclatureType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nomenclatureType = $this->NomenclatureTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $nomenclatureType = $this->NomenclatureTypes->patchEntity($nomenclatureType, $this->request->getData());
            if ($this->NomenclatureTypes->save($nomenclatureType)) {
                $this->Flash->success(__('The nomenclature type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nomenclature type could not be saved. Please, try again.'));
        }
        $this->set(compact('nomenclatureType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nomenclature Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nomenclatureType = $this->NomenclatureTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nomenclatureType = $this->NomenclatureTypes->patchEntity($nomenclatureType, $this->request->getData());
            if ($this->NomenclatureTypes->save($nomenclatureType)) {
                $this->Flash->success(__('The nomenclature type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nomenclature type could not be saved. Please, try again.'));
        }
        $this->set(compact('nomenclatureType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nomenclature Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nomenclatureType = $this->NomenclatureTypes->get($id);
        if ($this->NomenclatureTypes->delete($nomenclatureType)) {
            $this->Flash->success(__('The nomenclature type has been deleted.'));
        } else {
            $this->Flash->error(__('The nomenclature type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
