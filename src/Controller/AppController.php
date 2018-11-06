<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        //$this->loadComponent('Csrf');
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        
        
        $this->loadModel('Users');    
        $session = $this->request->session();
        if (!isset($this->request->getParam['prefix'])) {
            if (!$session->read('User.admin')) {
                
                // return $this->redirect(['controller'=>'users','action'=>'signin','prefix'=>'admin']);

            }else {
                $userDetails = $this->Users->findById($session->read('User.admin'))
                                    ->first()
                                    ->toArray();   
                $this->set(compact('userDetails')) ;                                 
            }
        }else {
            
        }
        $this->loadComponent('Flash');

        
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }


    function beforeRender(Event $event){
        parent::beforeFilter($event);
        $settingsTable = TableRegistry::get('Settings');
        $setting = $settingsTable->get(1);
        
        $this->set(compact('get','post','setting'));
    }

}
