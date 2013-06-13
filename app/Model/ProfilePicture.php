<?php
App::uses('AppModel', 'Model');
/**
 * ProfilePicture Model
 *
 * @property User $User
 * @property User $User
 */
class ProfilePicture extends AppModel {

	
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
		'profile_picture' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'extension'=>array(
				'rule'=>array('extension',array('gif', 'jpeg', 'png', 'jpg')),
				 'message' => 'Please supply a valid image.'
			),
		),
	);
	
	
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'profile_picture_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
