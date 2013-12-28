<?php
App::uses('AppModel', 'Model');
/**
 * Role Model
 *
 * @property User $User
 */
class Role extends AppModel {
	
 public $actsAs = array(
     'Acl' => array('type' => 'requester'),

 );



 public $displayField = 'role';



/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'role' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
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
		            'message'=>"role is already taken"

		        ),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'role_id',
			'dependent' => true,
			'conditions' => array('User.is_active'=>true),
            'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	
	public function parentNode() {
        return null;
    }

	  
    
	
}
