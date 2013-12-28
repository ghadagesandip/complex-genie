<?php
App::uses('AppController', 'Controller');
App::import('Vendor','qqUploadedFileXhr');

/**
 * ProfilePictures Controller
 *
 * @property ProfilePicture $ProfilePicture
 */
class ProfilePicturesController extends AppController {
	public $L_file_name = false;

	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProfilePicture->recursive = 0;
		$options = array(
            'conditions'=>array('ProfilePicture.user_id' => AuthComponent::user('id')),
            'order'=>array('ProfilePicture.id'=>'desc')
        );
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


    public function ajaxAddPic(){

        $file_path = WWW_ROOT.'files'.DS. 'profile_image' . DS;
        $result = array();

        $this->autoRender = false;
        $allowedExtensions = array('jpg','png','gif','jpeg','bmp');
        // max file size in bytes
        $sizeLimit = 4 * 1024 * 1024;



        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload('files'.DS.'profile_image'.DS);

        if($this->Auth->loggedIn()){
            $saveData = array(
                'user_id'=>AuthComponent::user('id'),
                'profile_picture'=>$result['file_name']
            );
            if($this->ProfilePicture->save($saveData)){
                $this->FileUpload->createThumb($result['file_name'],$file_path,array('small' =>array(25,  30),'medium' =>array(75, 90),'large' =>array(167, 152)));
                // to pass data through iframe you will need to encode all html tags
                echo htmlspecialchars(json_encode($result), ENT_NOQUOTES); exit;
            }
        }
        $result = array('status'=>'fail');
        echo htmlspecialchars(json_encode($result), ENT_NOQUOTES); exit;

    }
}
