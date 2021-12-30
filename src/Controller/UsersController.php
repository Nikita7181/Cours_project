<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
 
	public function beforeFilter(\Cake\Event\EventInterface $event)
	{
		parent::beforeFilter($event);

		$this->Authentication->allowUnauthenticated(['login', 'add']);
	}

	/**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
			$user->username = $user->email;
			
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Пользователь успешно соранен!'));

                return $this->redirect(['action' => 'index']);
            }
			
            $this->Flash->error(__('Ошибка при добавлении пользователя! Попробуйте позднее!'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Пользователь успешно соранен!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ошибка при изменении пользователя! Попробуйте позднее!'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Пользователь удален.'));
        } else {
            $this->Flash->error(__('Пользователь не может быть удален! Попробуйте позже!'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	
	public function login()
	{
	
		$this->request->allowMethod(['get', 'post']);
		$result = $this->Authentication->getResult();

		if ($result->isValid()) {
			
			// $target = $this->request->getQuery('redirect', [
			// 	'controller' => 'Dashboard',
			// 	'action' => 'index',
			// ]);
			
			$target = $this->Authentication->getLoginRedirect() ?? '/dashboard';

			return $this->redirect($target);
		} 
		if ($this->request->is('post') && !$result->isValid()) {
			$this->Flash->error(__('Неверное имя пользователя или пароль'));
		}
	
	}
	
	public function logout()
	{
		$this->Authentication->logout();
		return $this->redirect(['controller' => 'Users', 'action' => 'login']);
	}
}
