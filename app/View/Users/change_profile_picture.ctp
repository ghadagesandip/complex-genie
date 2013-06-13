 <div id="container">
 
 	<div id="current_profile_image">
 		<div id="previous_image">
 			<?php
 		
		 	if(Authcomponent::user('profile_picture_id')==0){
		 		if(Authcomponent::user('gender')=='Male'){
					echo $this->Html->image('blank_image_male'); 		
				}else{
					echo $this->Html->image('blank_image_female'); 		
				}
			}else{		
				echo $this->Html->image('/files/profile-image/thumb/medium/'.$user['User']['pic']); 
			}
		 ?>
 		</div>
 		<div id="options">
 		    <p class="button"> Keep Default</p>
 		    <p class="button"> Keep Previous</p>
 		</div>
 	</div>
 	
 	<div style="clear:both;"></div>
 	
 	<div id="all_images">
 		<ul>
 		<?php      
			// list all images
		 	foreach ($userPictures as $pic){
		 		echo "<li>".$this->Html->image('/files/profile_image/thumb/large/'.$pic['ProfilePicture']['profile_picture'],array('width'=>'200','height'=>'200'))."</li>";
		 	}
		?>	
		</ul>	
 	
	</div>
	
</div>

 
