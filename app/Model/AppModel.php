<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	
	public $actsAs = array('Containable');
	
	public function beforeValidate($options = array()){
		//for updated id field will be set
		if(isset($_SESSION['Auth'])){
			if(isset($this->data[$this->name]['id'])){
			  $this->data[$this->name]['updated_by'] = $_SESSION['Auth']['User']['id'];	
			}else{
			  $this->data[$this->name]['user_id'] = $_SESSION['Auth']['User']['id'];	
			
			}
		}
		return true;
	}
	
	function transformCheckboxDataForBulkDelete($data) {
		
		$hasData = false;
		$conditions = array();
		foreach ($data[$this->alias] as $id => $row) {
			if (is_numeric($id) && isset($row['id'])) {
				array_push($conditions,$row['id']);
				$hasData = true;
			}
		}
		
		return ($hasData) ? $conditions : $hasData;
	}
	
	function transformCheckboxDataForBulkStatusUpdate($data) {
		$hasData = false;
		$conditions = array();
			
			
			foreach ($data[$this->alias] as $id => $row) {
				if (is_numeric($id) && isset($row['id'])) {
					array_push($conditions,$row['id']);
					$hasData = true;
				}
			}
		
		return ($hasData) ? $conditions : $hasData;
	}
	
	
	function removeUploadedFile($file_name,$media_type){
		$rm_dir = WWW_ROOT.'files/'.$media_type.'/';
		if(file_exists($rm_dir.$file_name)){
		  unlink($rm_dir.$file_name);	
		  
		  if(file_exists($rm_dir.'thumb/small/'.$file_name))
		  unlink($rm_dir.'thumb/small/'.$file_name);
		  
		  if(file_exists($rm_dir.'thumb/medium/'.$file_name))
		  unlink($rm_dir.'thumb/medium/'.$file_name);
		  
		  if(file_exists($rm_dir.'thumb/large/'.$file_name))
		  unlink($rm_dir.'thumb/large/'.$file_name);
		}	    
		return true;	
	}
	
	
	
}
