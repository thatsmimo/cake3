<?php 
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class SitesController extends AppController

{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        $this->getEventManager()->off($this->Csrf);
        $session = $this->getRequest()->getSession();
        $session = $this->getRequest()->getSession();
        if ($session->read('User.admin') == null) {
            $this->Flash->flash('Sign in required', ['params' => ['type' => 'danger']]);
            return $this->redirect(
                ['controller' => 'users', 'action' => 'signin', 'prefix' => 'admin']
            );
        }
    }



    public function add(){
        // $site = $siteTable->find('all')
        //     ->where(['site_name' => $this->request->getData('site_name')])
        //     ->toArray();
        $title = 'Add Sites';
        if($this->request->is(['post','put'])){
            $sitesTable = TableRegistry::get('site');
            $site = $sitesTable->findBySiteName($this->request->getData('site_name'))->toArray();
            if(count($site)){
                $this->Flash->flash('Already Exists', ['params' => ['type' => 'danger']]);
                return $this->redirect(
                    ['controller' => 'sites', 'action' => 'add', 'prefix' => 'admin']
                );
            }else{
                $entity = $sitesTable->newEntity($this->request->getData());
                if ($sitesTable->save($entity)) {
                    $this->Flash->flash('Site Added', ['params' => ['type' => 'success']]);
                    return $this->redirect(
                        ['controller' => 'sites', 'action' => 'add', 'prefix' => 'admin']
                    );
                } else {
                    $this->Flash->flash('Site could not saved', ['params' => ['type' => 'danger']]);
                    return $this->redirect(
                        ['controller' => 'sites', 'action' => 'add', 'prefix' => 'admin']
                    );
                }
            }
            
        }
        $this->set(compact('title'));
    }
    

    public function list() {
        $siteTable = TableRegistry::get('site');
        $sites = $siteTable->find('all')->toArray();
        $title = 'Site Listing';
        $this->set(compact('title', 'sites'));
    }


    public function edit($id=null) {
        $siteTable = TableRegistry::get('site');
        $sites = $siteTable->get($id);
        $this->set(compact('sites','Edit'));
        if($this->request->is(['post','put'])){
            $siteTable->patchEntity($sites,$this->request->getData());
            if($siteTable->save($sites)){
                $this->Flash->flash('Successfully Edited', ['params' => ['type' => 'success']]);
                return $this->redirect(
                    ['controller' => 'sites', 'action' => 'list', 'prefix' => 'admin']
                );
            }else{
                $this->Flash->flash('cant edit', ['params' => ['type' => 'danger']]);
            }
        }
    }

    public function delete($id = null){
        $this->autoRender = false;
        $siteTable = TableRegistry::get('site');
        $sites = $siteTable->get($id);
        if($siteTable->delete($sites)){
            $data['ACK'] = 1;
        }else {
            $data['ACK'] = 0;
        }
        echo json_encode($data);
    }


}



?>
