<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	public $L_profile_image = 'profile_image';
	public $components = array(
		  'FileUpload'=>array(
		  	  'uploadDir'=>'profile_image',
		  	  'fileModel'=>'User',
		  	  'field'=>'pic'
		   )
	);
	
/**
 * beforeFilter, its is controller filter method gets executed before any action is executed 
 * @access public
 * @author Sandip Ghadge
 * @return void
 *
 */
	public function beforeFilter(){
		parent::beforeFilter();
		 $this->Auth->allow(array('login','logout','register','initDB','swapLanguage','forgotPassword','securityCheck','changePassword','resetPassword'));
	}
	
/**
 * initDB method
 * updates aco_aro tables and set roles based access to resources
 * @access public
 * @author Sandip Ghadge
 * @return void
 */
	public function initDB() {
	    $group = $this->User->Role;
	    //Allow admins to everything
	    $group->id = 1;
	    $this->Acl->allow($group, 'controllers');
	
	    //allow managers to posts and widgets
	    $group->id = 2;
	    $this->Acl->deny($group, 'controllers');
	    $this->Acl->allow($group, 'controllers/Dashboards/index');
	    $this->Acl->allow($group, 'controllers/Roles/index');
	    $this->Acl->allow($group, 'controllers/Users/index');
	    $this->Acl->allow($group, 'controllers/Users/changePassword');
	    $this->Acl->allow($group, 'controllers/Users/checkUsername');
	    $this->Acl->allow($group, 'controllers/Users/myProfile');
	    $this->Acl->allow($group, 'controllers/ProfilePictures/index');
	
	    //allow users to only add and edit on posts and widgets
	    $group->id = 3;
	    $this->Acl->deny($group, 'controllers');
	    $this->Acl->allow($group, 'controllers/Dashboards/index');
	    $this->Acl->allow($group, 'controllers/Roles/index');
	    $this->Acl->allow($group, 'controllers/Roles/view');
	    $this->Acl->allow($group, 'controllers/Users/index');
	    $this->Acl->allow($group, 'controllers/Users/changePassword');
	    $this->Acl->allow($group, 'controllers/Users/checkUsername');
	    $this->Acl->allow($group, 'controllers/Users/myProfile');
	    $this->Acl->allow($group, 'controllers/ProfilePictures/index');
	    //we add an exit to avoid an ugly "missing views" error message
	    echo "all done";
	    exit;
	}
	
	
/**
 * login method
 * @access public
 * @author Sandip Ghadge
 * @return void
 *
 */
	public function login() {
		$this->layout='login';
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('Invalid username or password, try again'));
	        }
	    }
	}
	
	
	
/**
 * logout method
 * @access public
 * @author Sandip Ghadge
 * @return void
 *
 */
	public function logout() {
	   $this->Session->destroy();
	   $this->redirect($this->Auth->logout());
	}
	

/**
 * swapLanguage method
 * change language on click of language link
 * @access public 
 * @author Sandip Ghadge
 * @return void
 *
 */	
	public function swapLanguage(){
		list($lan,$locale) = $this->request->params['pass'];
		CakeSession::write('Config.language', $lan);
    	setlocale("LC_ALL", $locale.".utf8");
    	$this->redirect($this->referer());
	}	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	
/**
 * myProfile method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function myProfile() {
		$options = array(
			'conditions' => array('User.' . $this->User->primaryKey => AuthComponent::user('id')),
			
		);
		$this->set('user', $this->User->find('first', $options));
	}
	
	
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$roles = $this->User->Role->find('list',array('order'=>'id'));
		$this->set(compact('roles'));
	}
	
	
/**
 * users can registers themself 
 * register method
 * @access public
 * @author sandip Ghadge
 * @return void
 */
	public function register() {
		$this->layout = 'login';
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['is_active'] = false;
			if ($this->User->save($this->request->data)) {
				 $id = $this->User->id;
		        $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
		        $this->Auth->login($this->request->data['User']);
		        $this->redirect('/dashboard');
				$this->Session->setFlash(__('You are registered successfully'));
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$roles = $this->User->Role->find('list',array('order'=>'id'));
		$this->set(compact('roles'));
	}
	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	 /**
	 * Returns string whether username is available,too short or already taken
	 * @param string $username, for username to be checked for availability
	 * @return string 
	 * @access public
	 * @author Sandip Gahdge
	 * 
	 */
    
    function checkUsername(){
    	
		$this->layout = 'ajax';
		$C_validaton_errors=array();
		
		if($this->request->isAjax()) {
			$this->User->set($this->request->data);    
			if($this->User->validates(array('fieldList'=>array('username')))){
				$C_validaton_errors['success'] = 'username is available';
			}else{
				$C_validaton_errors = $this->User->validationErrors;
			}
			
		echo json_encode($C_validaton_errors);
		exit;	
		
		}
		
		
	}
	
	function changePassword(){
		$this->layout= 'ajax';
		$C_validaton_errors=array();
		if($this->request->is('post')){
			$this->User->id=Authcomponent::user('id');
			$old_pass=$this->User->field('password');
			if($old_pass == AuthComponent::password($this->request->data['User']['old_password'])){
				$this->User->set($this->request->data);    
				if($this->User->validates(array('fieldList'=>array('password','confirm_password')))){
					if ($this->User->saveField('password',$this->data['User']['password'])) {
						$C_validaton_errors['no_error'] = "Password updated successfully";
					}
				}else{
					$C_validaton_errors = $this->User->validationErrors;
					
				}
			}else{
				$C_validaton_errors['old_password'] = 'you entered wrong old password ';
			}
			echo json_encode($C_validaton_errors); exit;
		}
		
	}
	
	public function forgotPassword(){
		$this->layout= 'ajax';
		$result = array();
		if($this->request->is('post')) {
			$C_username = $this->request->data['User']['username'];
			$user = $this->User->findByUsername($C_username);
			if(count($user)==0){
				$result['fail'] = 'no user account found with this email address';
			}else{
				$temporary_password = substr(md5(microtime()), -15, 12);
				$this->User->id = $user['User']['id'];
				$this->User->saveField('temporary_password', $temporary_password);
				$this->_sendPasswordRecoveryEmail($user,$temporary_password);
				$result['success'] = 'password recovery link send to your registered email address';
			}
			echo json_encode($result);exit;
		}
		
		
	}
	
	/**_sendPasswordRecoveryEmail method, 
	 * Function send the password recovery email to user
	 * @access public
	 * @author sandip ghadge	
	 * @param array $user_data
	 * @param string $temporary_password
	 */
	public  function _sendPasswordRecoveryEmail($user_data,$temporary_password){
			    $email = new CakeEmail();
                $email->config('gmail');
				//$email->reset();
                $email->template('password_recovery_email', 'default');
				$email->emailFormat('html');
				$email->viewVars(array(
                                   'temporary_password'=>$temporary_password,
                                   'user_data'=>$user_data
                                ));
				
				$from = Configure::read('FROM_EMAIL_ADDRESS');		
				$from_text = Configure::read('FROM_EMAIL_TEXT');
                $email->from(array($from => $from_text));
                $email->to($user_data['User']['email_address']);
                $email->subject('password recovery email');
                $result=$email->send();
	}
	
	public function securityCheck(){
		$this->layout= 'ajax';
		$result = array();
		if($this->request->is('post')) {
			$temporary_password = $this->request->data['User']['temporary_password']; 
			$user = $this->User->findByTemporaryPassword($temporary_password);
			if(count($user)==0){
				$result['fail'] = 'verification_fail';
			}else{
			//	$this->Auth->login($user);
				$this->Session->write('security_code',$temporary_password);
				$result['success'] = 'verified';
			}
			echo json_encode($result);exit;
		}
	}
	
   public function resetPassword(){
   	  $this->layout= 'ajax';
   	  $C_validaton_errors=array();
		if($this->request->is('post')){
				$this->User->set($this->request->data);    
				if($this->User->validates(array('fieldList'=>array('password','confirm_password')))){
					$user = $this->User->findByTemporaryPassword($this->Session->read('security_code'));
					$this->User->id = $user['User']['id'];
					if ($this->User->saveField('password',$this->data['User']['password'])) {
						$C_validaton_errors['no_error'] = "Password updated successfully";
					}
				}else{
					$C_validaton_errors = $this->User->validationErrors;
					
				}
			
			echo json_encode($C_validaton_errors); exit;
		}
		
   }
	
   public function changePasswordAdmin($user_id){
   	    $this->layout= 'ajax';
   	    if($this->request->is('post')){
				$this->User->set($this->request->data);    
				if($this->User->validates(array('fieldList'=>array('password','confirm_password')))){
					$this->User->id = $this->request->data['User']['id'];
					if ($this->User->saveField('password',$this->data['User']['password'])) {
						$C_validaton_errors['no_error'] = "Password updated successfully";
					}
				}else{
					$C_validaton_errors = $this->User->validationErrors;
					
				}
			
			echo json_encode($C_validaton_errors); exit;
		}
   	    $this->set('id',$user_id);
   }
   
   public function changeProfilePicture(){
		$this->layout= 'ajax';
		$C_validaton_errors = array();
		if($this->request->is('post')){
			$this->User->id = AuthComponent::user('id');
			if ($this->User->saveField('profile_picture_id',$this->data['profile_picture_id'])) {
				$C_validaton_errors['status'] = 'success';
			}else{
				$C_validaton_errors['status'] = 'fail';
			}
			echo json_encode($C_validaton_errors); exit;
		}
		
    	$this->paginate = array(
	        'ProfilePicture' => array(
	           'conditions'=>array('user_id'=>AuthComponent::user('id')),
	           'contain'=>false  
	        )
	    );
		$this->set('userPictures', $this->paginate('ProfilePicture'));
		
	}
	
	
	

}
