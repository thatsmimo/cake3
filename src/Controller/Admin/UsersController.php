<?php 
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;


class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        $this->getEventManager()->off($this->Csrf);
        $session = $this->getRequest()->getSession();
    }

    public function signin()
    {
        if($this->getRequest()->getSession()->read('User.admin')){
            return $this->redirect(
                ['controller'=>'users','action'=>'home','prefix'=>'admin']
            );
        }
        $this->viewBuilder()->layout(false);
        if ($this->request->is('post')) {

            $user = $this->Users->find()
                ->where(['username'=>$this->request->data['username']])
                ->first()
                ->toArray();

            if (!$user) {

                $this->Flash->flash('Invalid username', ['params' => ['type' => 'danger']]);

            } else {
                if (md5($this->request->data['password']) == $user['password'] && $user['role'] == 1) {

                    $this->Flash->flash('Successfully logged in', ['params' => ['type' => 'success']]);
                    $this->getRequest()->getSession()->write('User.admin',$user['id']);
                    return $this->redirect(['controller'=>'users','action'=>'home','prefix'=>'admin']);

                } else {

                    $this->Flash->flash('Worng password', ['params' => ['type' => 'danger']]);

                }
            } 
        }
    }


    public function signout(){
        $session = $this->getRequest()->getSession();
        $session->delete('User.admin');
        $this->Flash->flash('Successfully logged out', ['params' => ['type' => 'success']]);
        return $this->redirect(['controller'=>'users','action'=>'signin','prefix'=>'admin']);

    }

    public function home(){
        $session = $this->getRequest()->getSession();
        if($session->read('User.admin') == null){
            $this->Flash->flash('Sign in required',['params'=>['type' => 'danger']]);
            return $this->redirect(
                ['controller'=>'users','action'=>'signin','prefix'=>'admin']
            );
        }
        $title = 'Home';
        $this->set(compact('title'));
        // echo $this->request->session()->read('Auth.Admin');
        // exit;
    }

    public function settings(){
        $title = 'Settings';
        $session = $this->getRequest()->getSession();
        if($session->read('User.admin') == null){
            $this->Flash->flash('Sign in required',['params'=>['type' => 'danger']]);
            return $this->redirect(
                ['controller'=>'users','action'=>'signin','prefix'=>'admin']
            );
        }

        $settingsTable = TableRegistry::get('Settings');
        $setting = $settingsTable->get(1);
        $this->set(compact('setting'));
        if($this->request->is(['post','put'])){
            $target_dir = WWW_ROOT ."img/";
            $data = $this->request->getData();

            if($_FILES['logo']['name'] != ''){
                $fileName = date('Y-m-d h:I:s') . basename($_FILES["logo"]["name"]);
                $target_file = $target_dir . $fileName ;
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                    $data['logo'] = $fileName;
                } else {
                    $this->Flash->flash('Unable to upload', ['params' => ['type' => 'danger']]);
                    $this->redirect(
                        ['controller' => 'users', 'action' => 'settings', 'prefix' => 'admin']
                    );
                }
            } else {
                $data['logo'] = $setting['logo'];
            }

            if ($_FILES['favicon']['name'] != '') {
                
                $fileName = date('Y-m-d h:I:s') . basename($_FILES["favicon"]["name"]);
                $target_file = $target_dir . $fileName ;
                if (move_uploaded_file($_FILES["favicon"]["tmp_name"], $target_file)) {
                    $data['favicon'] = $fileName;
                } else {
                    $this->Flash->flash('Unable to upload', ['params' => ['type' => 'danger']]);
                    $this->redirect(
                        ['controller' => 'users', 'action' => 'settings', 'prefix' => 'admin']
                    );
                }
            } else {
                $data['favicon'] = $setting['favicon'];
            }
            
            
            $settingsTable = TableRegistry::get('Settings');
            $setting = $settingsTable->get(1);
            $settingsTable->patchEntity($setting, $data);
            if ($settingsTable->save($setting)) {
                $this->Flash->flash('Saved', ['params' => ['type' => 'success']]);
            }else{
                $this->Flash->flash('Unable to save', ['params' => ['type' => 'danger']]);
            }

        }


        $this->set(compact('title'));
    }

    public function logout() {
        $url = $this->Auth->logout();
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->redirectUrl());

    }



}
?>