<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::import('Vendor', 'facebook');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $helpers = array('Html', 'Form', 'Session', 'Tinymce','Search','Popup');
	/**
	 * Session - manages session
	 * Auth - manages login and logout functionality
	 * @author sandip Ghadge
	 *
	 */
	public $theme = 'Example';
	public $components = array(
        'Session','FileUpload',
        'Auth' => array(
        	'loginAction' => array( 'controller' => 'users',  'action' => 'login' ),
            'loginRedirect' => array('controller' => 'dashboard', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authError'=>'You are not authorized to access that location',
            'authenticate'=>array(
            	'Form'=>array(
            		//'fields' => array('username' => 'email_address'),
            		'scope' => array('User.is_active' =>true)
            	)
            ),
         /*   'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
         */
        )//,'Acl',
        
        
    );
    
    public function beforeFilter(){
    	//$this->Auth->allow('ajaxValidate');
    	$this->_performBulkOperation();
        $this->_initFbPhpSdk();
		
	}


    public function beforeRender() {
        $this->_setFbloginUrl();
    }


    function _setFbloginUrl(){
        $this->set('fb_login_url', $this->Facebook->getLoginUrl(array('redirect_uri' => Router::url(array('controller' => 'users', 'action' => 'login'), true))));
        $this->set('user', $this->Auth->user());
    }


    function _initFbPhpSdk(){
        $this->Facebook = new Facebook(array(
            'appId'  => '221788677969682',
            'secret' => 'd43d60766dc74e2bc2b49e1ddb6ca0a0',
        ));


    }


    function _performBulkOperation(){
        if (!empty($this->request->data['action']['type'])) {

            switch ($this->request->data['action']['type']) {
                case 'delete':
                    $this->request->data[$this->modelClass]['is_deleted'] = 0;
                    break;
                case 'active':
                    $this->request->data[$this->modelClass]['is_active'] = true;
                    break;
                case 'in-active':
                    $this->request->data[$this->modelClass]['is_active'] = false;
                    break;
            }
            if ('delete' == $this->request->data['action']['type'] && count($this->request->data[$this->modelClass])) {
                $result_arr = $this->{$this->modelClass}->transformCheckboxDataForBulkDelete($this->request->data);
                if($result_arr != false){
                    if($this->{$this->modelClass}->deleteAll($this->modelClass.'.id IN ('.implode(', ', $result_arr).')')){
                        $this->Session->setFlash(((count($this->data[$this->modelClass]))-1).' record(s) deleted');
                    }
                }
            } else {
                $rows = $this->{$this->modelClass}->transformCheckboxDataForBulkStatusUpdate($this->request->data);
                if ($rows !== false) {
                    $this->{$this->modelClass}->updateAll(array('is_active' => $this->request->data[$this->modelClass]['is_active']),array($this->modelClass.'.id' => $rows));
                    $this->Session->setFlash(((count($this->data[$this->modelClass]))-1).' record(s) status changed to '.$this->request->data['action']['type']);
                    $this->data = null;
                }
            }
        }
    }

	function ajaxValidate(){
		 $arr = array_keys($this->data[$this->modelClass]);
		 $field = $arr[0]; 
		
		 $this->{$this->modelClass}->set($this->request->data); 
		 if(!$this->{$this->modelClass}->validates(array('fieldList'=>array($field)))){
			$C_validaton_errors = $this->{$this->modelClass}->validationErrors;

		 }
		$C_validaton_errors['field'] = $field;
		echo json_encode($C_validaton_errors); exit;
	}	
    
    
}
