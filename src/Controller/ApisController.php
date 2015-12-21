<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Apis Controller
 *
 * @property \App\Model\Table\ApisTable $Apis
 */
class ApisController extends AppController
{
    public function servers($id=null,$soft=null,$soft_id=null){
        $this->request->allowMethod(['get']);
        $this->loadModel("Servers");
        $this->loadModel("Softwares");
        $this->loadModel("Components");
        if($id == null){
            $servers = $this->Servers->find("all");
            $results = array();
            $i = 0;
            foreach ($servers as $server){
                $results[$i]["id"] = $server->id;
                $results[$i]["hostname"] = $server->hostname;
                $results[$i]["country"] = $server->country;
                $results[$i]["ip"] = $server->ip;
                $results[$i]["project"] = $server->project;
                $i++;
            }
            echo json_encode($results);
        }else{
            if($soft == null){
                $query = $this->Servers->find('all', [
                    'conditions' => ['Servers.id' => $id]
                ]);
                if($query->count() > 0){
                    $server = $this->Servers->get($id);
                    $results = array();
                    $results["id"] = $server->id;
                    $results["hostname"] = $server->hostname;
                    $results["country"] = $server->country;
                    $results["ip"] = $server->ip;
                    $results["project"] = $server->project;
                    echo json_encode($results);
                }else{
                    echo "error! don't have servers.";
                }
            }elseif($soft == "softwares"){
                if($soft_id == null){
                    $components = $this->Components->find("all",array("conditions"=>array("Components.server_id"=>$id,"Components.type"=>"softwares")));
                    $results = array();
                    $i = 0;
                    foreach($components as $component){
                        $software = $this->Softwares->get($component->relate_id);
                        $results[$i]["id"] = $software->id;
                        $results[$i]["software"] = $software->title;
                        $i++;
                    }
                    echo json_encode($results);
                }else{
                    $components = $this->Components->find("all",array("conditions"=>array("Components.server_id"=>$id,"Components.relate_id"=>$soft_id,"Components.type"=>"softwares")));
                    if($components->count() > 0){
                        $results = array();
                        $software = $this->Softwares->get($soft_id);
                        $results["id"] = $software->id;
                        $results["software"] = $software->title;
                        echo json_encode($results);
                    }else{
                        echo "error! don't have software.";
                    }
                }
            }
        }
        exit;
    }
    
}