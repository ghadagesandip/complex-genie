<?php
App::uses('MediaAppController', 'Media.Controller');
App::import('Vendor','qqUploadedFileXhr');
/**
 * Attachments Controller
 *
 * @property Attachment $Attachment
 */
class AttachmentsController extends MediaAppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Attachment->recursive = 0;
		$this->set('attachments', $this->Attachment->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Attachment->exists($id)) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		$options = array('conditions' => array('Attachment.' . $this->Attachment->primaryKey => $id));
		$this->set('attachment', $this->Attachment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Attachment->create();
			if ($this->Attachment->save($this->request->data)) {
				$this->Session->setFlash(__('The attachment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachment could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Attachment->exists($id)) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Attachment->save($this->request->data)) {
				$this->Session->setFlash(__('The attachment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Attachment.' . $this->Attachment->primaryKey => $id));
			$this->request->data = $this->Attachment->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Attachment->id = $id;
		if (!$this->Attachment->exists()) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Attachment->delete()) {
			$this->Session->setFlash(__('Attachment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Attachment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Attachment->recursive = 0;
		$this->set('attachments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Attachment->exists($id)) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		$options = array('conditions' => array('Attachment.' . $this->Attachment->primaryKey => $id));
		$this->set('attachment', $this->Attachment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Attachment->create();
			if ($this->Attachment->save($this->request->data)) {
				$this->Session->setFlash(__('The attachment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachment could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Attachment->exists($id)) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Attachment->save($this->request->data)) {
				$this->Session->setFlash(__('The attachment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Attachment.' . $this->Attachment->primaryKey => $id));
			$this->request->data = $this->Attachment->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Attachment->id = $id;
		if (!$this->Attachment->exists()) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Attachment->delete()) {
			$this->Session->setFlash(__('Attachment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Attachment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}



    public function ajaxAddAttachment(){
        //echo "<pre>"; print_r($this->request->data);exit;
        $file_path = WWW_ROOT.'files'.DS. 'attachments' . DS;
        $userId = AuthComponent::user('id');

        $result = array();

        $this->autoRender = false;
        $allowedExtensions = array('jpg','png','gif','jpeg','bmp');
        // max file size in bytes
        $sizeLimit = 4 * 1024 * 1024;





        if($this->Auth->loggedIn()){

            if (!file_exists($file_path.$userId)) {
                $oldmask = umask(0);
                mkdir($file_path.$userId, 0777, true);
                chmod($file_path.$userId, 0777);
                umask($oldmask);

                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                $result = $uploader->handleUpload('files'.DS.'attachments'.DS. $userId . DS);


                $saveData = array(
                    'user_id'=>$userId,
                    'attachments'=>$result['file_name']
                );
                if($this->Attachment->save($saveData)){
                    $this->FileUpload->createThumb($result['file_name'],$file_path,array('small' =>array(25,  30),'medium' =>array(75, 90),'large' =>array(167, 152)));
                    // to pass data through iframe you will need to encode all html tags
                    echo htmlspecialchars(json_encode($result), ENT_NOQUOTES); exit;
                }
            }


        }
        $result = array('status'=>'fail');
        echo htmlspecialchars(json_encode($result), ENT_NOQUOTES); exit;

    }

}
