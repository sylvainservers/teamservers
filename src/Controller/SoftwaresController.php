<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Softwares Controller
 *
 * @property \App\Model\Table\SoftwaresTable $Softwares
 */
class SoftwaresController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('softwares', $this->paginate($this->Softwares));
        $this->set('_serialize', ['softwares']);
    }

    /**
     * View method
     *
     * @param string|null $id Software id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $software = $this->Softwares->get($id, [
            'contain' => ['Modules']
        ]);
        $this->set('software', $software);
        $this->set('_serialize', ['software']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $software = $this->Softwares->newEntity();
        if ($this->request->is('post')) {
            $software = $this->Softwares->patchEntity($software, $this->request->data);
            if ($this->Softwares->save($software)) {
                $this->Flash->success(__('The software has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The software could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('software'));
        $this->set('_serialize', ['software']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Software id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $software = $this->Softwares->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $software = $this->Softwares->patchEntity($software, $this->request->data);
            if ($this->Softwares->save($software)) {
                $this->Flash->success(__('The software has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The software could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('software'));
        $this->set('_serialize', ['software']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Software id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $software = $this->Softwares->get($id);
        if ($this->Softwares->delete($software)) {
            $this->loadModel("Components");
            $components = $this->Components->find("all",array("conditions"=>array('relate_id'=>$id,'type'=>'softwares')));
            foreach($components as $component){
                $this->Components->delete($component);
            }
            $this->loadModel("Modules");
            $modules = $this->Modules->find("all",array("conditions"=>array('software_id'=>$id)));
            foreach($modules as $module){
                $this->Modules->delete($module);
            }
            $this->Flash->success(__('The software has been deleted.'));
        } else {
            $this->Flash->error(__('The software could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
