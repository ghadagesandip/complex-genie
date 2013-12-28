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
		 	<p id="save_this"></p>
 			<p id="default_img" src=""> Keep Default</p>
 		    <p id="previou_img" src=""> Keep Previous</p>
 		</div>
 	</div>
 	
 	<div id="all_images">
 		<ul>
 		<?php      
			// list all images
		 	foreach ($userPictures as $pic){
		 		echo "<li id=".$pic['ProfilePicture']['id'].">".$this->Html->image('/files/profile_image/thumb/large/'.$pic['ProfilePicture']['profile_picture'],array('width'=>'200','height'=>'200'))."<p><a>Set Profile Pic</a></p></li>";
		 	}
		?>	
		</ul>	
 	
	</div>
	
</div>

 
<script>
	$(function(){
	         
		$("#all_images ul li").on('mouseenter',function(){
			$(this).find("p").css({'display':'block'});	
			$(this).find("p").find("a:first").click(function(){
				var src = $(this).parents("li").find('img').attr('src');
				var id  = $(this).parents("li").attr('id');
				$("#previous_image").find("img").attr("src",src);
				var url = '<?php echo $this->Html->url(array('action'=>'changeProfilePicture'))?>';
							
				$.ajax({
					type :'POST',
					url  : url,
					data : {'profile_picture_id':id},
					dataType:'json',
					success:function(data){
						if(data['status']){
							//alert(data['status']);
						}
					},
					error:function(){
						alert('error ocurred');
					}
						
				});
				return false;
			});
		}).on('mouseleave',function(){
			$(this).find("p").css({'display':'none'});	
		});
		
	})
	
	
</script>