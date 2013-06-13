<?php 
App::uses('AppHelper', 'View/Helper');
 
class PopupHelper extends AppHelper {
	
	public function link($title,$link){
		 return '<span href='.$link.' class="link-popup-div">'.$title.'</a>';			
	}
	
	
	
}