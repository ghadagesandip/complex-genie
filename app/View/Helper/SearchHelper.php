<?php 
App::uses('AppHelper', 'View/Helper');
 
class SearchHelper extends AppHelper {
	
	public function filterList($field_list_arr) {
        // Use the HTML helper to output
        // formatted data:
    
        $link ='<tr>';
		foreach ($field_list_arr as $field){
			$link .= "<td>";
			if($field ==''){
				
			}else{
				$link .="<input class='searchField' type='text' name=data[User][".$field."]/>";
			}
			$link .= "</td>";	
		}
        $link .="</tr>";

        return $link;
    }
	
}