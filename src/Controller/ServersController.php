<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Servers Controller
 *
 * @property \App\Model\Table\ServersTable $Servers
 */
class ServersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('servers', $this->paginate($this->Servers));
        $this->set('_serialize', ['servers']);
    }

    /**
     * View method
     *
     * @param string|null $id Server id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $server = $this->Servers->get($id, [
            'contain' => ['Components']
        ]);
        $this->set('server', $server);
        $this->set('_serialize', ['server']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel("Components");
        $server = $this->Servers->newEntity();
        if ($this->request->is('post')) {
            $server_add["title"] = $this->request->data["title"];
            $server_add["ip"] = $this->request->data["ip"];
            $server_add["hostname"] = $this->request->data["hostname"];
            $server_add["country"] = $this->request->data["country"];
            $server_add["project"] = $this->request->data["project"];
            $server_add["status"] = $this->request->data["status"];
            $server_add["memory"] = $this->request->data["memory"];
            $server_add["disk_capacity"] = $this->request->data["disk_capacity"];
            $server_add["cpu"] = $this->request->data["cpu"];
            $server_add["create"] = date("Y-m-d H:i:s");
            $server = $this->Servers->patchEntity($server, $server_add);
            $server_result = $this->Servers->save($server);
            if ($server_result) {
                $database_adds = $this->request->data["software_id"];
                foreach($database_adds as $database_add){
                    if($database_add != ''){
                    $softwares = $this->Components->newEntity();
                    $software_add["server_id"] = $server_result->id;
                    $software_add["relate_id"] = $database_add;
                    $software_add["type"] = "softwares";
                    $softwares = $this->Components->patchEntity($softwares, $software_add);
                    $this->Components->save($softwares);
                    }
                }
                $database_adds = $this->request->data["databasesoft_id"];
                foreach($database_adds as $database_add){
                    if($database_add != ''){
                    $softwares = $this->Components->newEntity();
                    $software_add["server_id"] = $server_result->id;
                    $software_add["relate_id"] = $database_add;
                    $software_add["type"] = "databases";
                    $softwares = $this->Components->patchEntity($softwares, $software_add);
                    $this->Components->save($softwares);
                    }
                }
                $database_adds = $this->request->data["user_id"];
                foreach($database_adds as $database_add){
                    if($database_add != ''){
                    $softwares = $this->Components->newEntity();
                    $software_add["server_id"] = $server_result->id;
                    $software_add["relate_id"] = $database_add;
                    $software_add["type"] = "users";
                    $softwares = $this->Components->patchEntity($softwares, $software_add);
                    $this->Components->save($softwares);
                    }
                }
                $this->Flash->success(__('The server has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The server could not be saved. Please, try again.'));
            }
        }
        $this->loadModel("Softwares");
        $this->loadModel("Databasesofts");
        $this->loadModel("Users");
        $databasesofts = $this->Databasesofts->find('list', ['limit' => 200]);
        $users = $this->Users->find('list', ['keyField' => "id",'valueField'=> 'username' ]); 
        $softwares = $this->Softwares->find('list', ['limit' => 200]);
        $this->set(compact('databasesofts', 'users','softwares'));
        $this->set(compact('server'));
        $this->set('_serialize', ['server']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Server id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $server = $this->Servers->get($id, [
            'contain' => ['Components']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $server = $this->Servers->patchEntity($server, $this->request->data);
            $server_result = $this->Servers->save($server);
            if ($server_result) {
                $this->loadModel("Components");
                $database_adds = $this->request->data["software_id"];
                foreach($database_adds as $database_add){
                    if($database_add != ''){
                    $softwares = $this->Components->newEntity();
                    $software_add["server_id"] = $server_result->id;
                    $software_add["relate_id"] = $database_add;
                    $software_add["type"] = "softwares";
                    $softwares = $this->Components->patchEntity($softwares, $software_add);
                    $this->Components->save($softwares);
                    }
                }
                $database_adds = $this->request->data["databasesoft_id"];
                foreach($database_adds as $database_add){
                    if($database_add != ''){
                    $softwares = $this->Components->newEntity();
                    $software_add["server_id"] = $server_result->id;
                    $software_add["relate_id"] = $database_add;
                    $software_add["type"] = "databases";
                    $softwares = $this->Components->patchEntity($softwares, $software_add);
                    $this->Components->save($softwares);
                    }
                }
                $database_adds = $this->request->data["user_id"];
                foreach($database_adds as $database_add){
                    if($database_add != ''){
                    $softwares = $this->Components->newEntity();
                    $software_add["server_id"] = $server_result->id;
                    $software_add["relate_id"] = $database_add;
                    $software_add["type"] = "users";
                    $softwares = $this->Components->patchEntity($softwares, $software_add);
                    $this->Components->save($softwares);
                    }
                }
                $this->Flash->success(__('The server has been saved.'));
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The server could not be saved. Please, try again.'));
            }
        }
        $server = $this->Servers->get($id, [
            'contain' => ['Components']
        ]);
        $this->loadModel("Softwares");
        $this->loadModel("Databasesofts");
        $this->loadModel("Users");
        $databasesofts = $this->Databasesofts->find('list', ['limit' => 200]);
        $users = $this->Users->find('list', ['keyField' => "id",'valueField'=> 'username' ]); 
        $softwares = $this->Softwares->find('list', ['limit' => 200]);
        $this->set(compact('databasesofts', 'users','softwares'));
        
        $this->set(compact('server'));
        $this->set('_serialize', ['server']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Server id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $server = $this->Servers->get($id);
        if ($this->Servers->delete($server)) {
            $this->Flash->success(__('The server has been deleted.'));
        } else {
            $this->Flash->error(__('The server could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function showrelatebyid($relate_id=null,$type=null){
        if($type == "softwares"){
            $this->loadModel("Softwares");
            $data = $this->Softwares->get($relate_id, ["conditions"=>["Softwares.id"=>$relate_id]]);
            $data = $data["title"];
        }else if($type == "databases"){
            $this->loadModel("Databasesofts");
            $data = $this->Databasesofts->get($relate_id, ["conditions"=>["Databasesofts.id"=>$relate_id]]);
            $data = $data["title"];
        }else{
            $this->loadModel("Users");
            $data = $this->Users->get($relate_id, ["conditions"=>["Users.id"=>$relate_id]]);
            $data = $data["username"];
        }
        $this->response->body($data);
        
        return $this->response;
    }
    public function deletecomponent($id=null,$server_id=null){
        $this->loadModel("Components");
        $component = $this->Components->get($id);
        if ($this->Components->delete($component)) {
            $this->Flash->success(__('The component has been deleted.'));
        } else {
            $this->Flash->error(__('The component could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'edit',$server_id]);
    }
}
