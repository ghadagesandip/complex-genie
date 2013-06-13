<?php
App::uses('AppController', 'Controller');
/**
 * ProfilePictures Controller
 *
 * @property ProfilePicture $ProfilePicture
 */
class ProfilePicturesController extends AppController {
	public $L_file_name = false;
	public $components = array(
		  'FileUpload'=>array(
		  	  'uploadDir'=>'profile_image',
		  	  'fileModel'=>'ProfilePicture',
		  	  'field'=>'profile_picture'
		   )
	);
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProfilePicture->recursive = 0;
		$options = array('conditions'=>array('ProfilePicture.user_id' => AuthComponent::user('id')));
		$this->paginate = $options;
		$this->set('profilePictures', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProfilePicture->exists($id)) {
			throw new NotFoundException(__('Invalid profile picture'));
		}
		$options = array('conditions' => array('ProfilePicture.' . $this->ProfilePicture->primaryKey => $id));
		$this->set('profilePicture', $this->ProfilePicture->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProfilePicture->create();
			$this->L_file_name = $this->FileUpload->doFileUpload();
			if($this->L_file_name!=false){
			   $this->request->data['ProfilePicture']['profile_picture']=$this->L_file_name; 	
			}
			if ($this->ProfilePicture->save($this->request->data)) {
				$this->Session->setFlash(__('The profile picture has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				if($this->L_file_name){
					$this->ProfilePicture->removeUploadedFile($file_name,'profile_image');
				}
				$this->Session->setFlash(__('The profile picture could not be saved. Please, try again.'));
			}
		}
		$users = $this->ProfilePicture->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProfilePicture->id = $id;
		if (!$this->ProfilePicture->exists()) {
			throw new NotFoundException(__('Invalid profile picture'));
		}
		
		$file_name = $this->ProfilePicture->findById($id);
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProfilePicture->delete()) {
			$this->ProfilePicture->removeUploadedFile($file_name['ProfilePicture']['profile_picture'],'profile_image');	
			$this->Session->setFlash(__('Profile picture deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Profile picture was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
