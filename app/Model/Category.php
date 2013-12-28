<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Subcategory $Subcategory
 */
class Category extends AppModel {

	public  $displayField  = 'category_name';
/**
 * Validation rules
 *
 * @var array
 */

	public $validate = array(
		'category_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
		'Subcategory' => array(
			'className' => 'Subcategory',
			'foreignKey' => 'category_id',
			'dependent' => true,

		)
	);

}
