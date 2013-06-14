<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Role $Role
 */
class User extends AppModel {

	public $displayField = 'username';
	
	public $virtualFields = array('name'=> 'CONCAT(User.first_name," ", User.last_name)');
	
	public $actsAs = array('Acl' => array('type' => 'requester'));
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'role_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'reg-expression'=>array(
				'rule' => '/^[a-z]{1,}$/i',
				'message' => 'first name with atleast one alphabet, no special char, number or white space',			
			)
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'reg-expression'=>array(
				'rule' => '/^[a-z]{1,}$/i',
				'message' => 'first name with atleast one alphabet, no special char, number or white space',			
			)
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'reg-expression'=>array(
				'rule' => '/^[^ ]{1,}$/i',
				'message' => 'white space are not allowed',			
			),
			'isUnique'=>array(
                       'rule'=>array('isUnique'),
                       'message'=>'username is already taken'
            
            ),
            
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		    'minLength'=>array(
                         'rule'=>array('minLength',5),
                         'message'=>'please enter atleast 5 characters.'
                         
            ),
            'reg-expression'=>array(
				'rule' => '/^[^ ]{1,}$/i',
				'message' => 'white space are not allowed',			
			)
              
		),
		
		'confirm_password' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Please enter confirm-password.',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					
				),
	            'confirmPassword'=>array(
	                         'rule'=>array('confirmPassword','password'),
	                         'message'=>'password and confirm-password fields are not same.'
                         
	            ),
	            'reg-expression'=>array(
					'rule' => '/^[^ ]{1,}$/i',
					'message' => 'white space are not allowed',			
			)


		),
		
		'email_address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email'=>array(
				'rule'=>'email',
				'message'=>'please enter valid email address'
			),
			'isUnique'=>array(
                       'rule'=>array('isUnique'),
                       'message'=>'username is already registered with this email address'
            
            ),
            'notempty' => array(
						'rule' => array('notempty'),
						'message' => 'please enter email address.', 
            ),
            
		),
		'date_of_birth' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'please enter date',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	);
	
	
	/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'counterCache'=>true,
			'conditions' => '',
			'fields' => array('id','role'),
			'order' => ''
		)
	);
	
	public $hasMany = array(
		'ProfilePicture'=>array(
			'dependent'=>true
		)
	); 
	
	
	public function confirmPassword() {
           if($this->data[$this->name]['confirm_password'] !== $this->data[$this->name]['password']) {
                return FALSE;
            } else {
                return true;;
            }
    }
    
    
        

	//The Associations below have been created with all possible keys, those that are not needed can be removed


	
	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}
	
	
    

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['role_id'])) {
            $groupId = $this->data['User']['role_id'];
        } else {
            $groupId = $this->field('role_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Role' => array('id' => $groupId));
        }
    }
	
    public function bindNode($user) {
	    return array('model' => 'Role', 'foreign_key' => $user['User']['role_id']);
	}

}
