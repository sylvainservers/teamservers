<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Databasesofts Controller
 *
 * @property \App\Model\Table\DatabasesoftsTable $Databasesofts
 */
class DatabasesoftsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('databasesofts', $this->paginate($this->Databasesofts));
        $this->set('_serialize', ['databasesofts']);
        
        
    }

    /**
     * View method
     *
     * @param string|null $id Databasesoft id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $databasesoft = $this->Databasesofts->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('databasesoft', $databasesoft);
        $this->set('_serialize', ['databasesoft']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $databasesoft = $this->Databasesofts->newEntity();
        if ($this->request->is('post')) {
            $databasesoft = $this->Databasesofts->patchEntity($databasesoft, $this->request->data);
            if ($this->Databasesofts->save($databasesoft)) {
                $this->Flash->success(__('The databasesoft has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The databasesoft could not be saved. Please, try again.'));
            }
        }
        $users = $this->Databasesofts->Users->find('list',['keyField' => "id",'valueField'=> 'username' ], ['limit' => 200]);
        $this->set(compact('databasesoft', 'users'));
        $this->set('_serialize', ['databasesoft']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Databasesoft id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $databasesoft = $this->Databasesofts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $databasesoft = $this->Databasesofts->patchEntity($databasesoft, $this->request->data);
            if ($this->Databasesofts->save($databasesoft)) {
                $this->Flash->success(__('The databasesoft has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The databasesoft could not be saved. Please, try again.'));
            }
        }
        $users = $this->Databasesofts->Users->find('list',['keyField' => "id",'valueField'=> 'username' ], ['limit' => 200]);
        $this->set(compact('databasesoft','users'));
        $this->set('_serialize', ['databasesoft']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Databasesoft id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $databasesoft = $this->Databasesofts->get($id);
        if ($this->Databasesofts->delete($databasesoft)) {
            $this->loadModel("Components");
            $components = $this->Components->find("all",array("conditions"=>array('relate_id'=>$id,'type'=>'databases')));
            foreach($components as $component){
                $this->Components->delete($component);
            }
            $this->Flash->success(__('The databasesoft has been deleted.'));
        } else {
            $this->Flash->error(__('The databasesoft could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
