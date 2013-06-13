		<h1>
			<?php if(AuthComponent::user('profile_picture_id')){
						echo $this->Html->image('/files/');
				  }else{
				  	if(AuthComponent::user('gender')=='Male'){
				  		echo $this->Html->image('blank_image_male.jpeg',array('width'=>30,'height'=>30));
				  	}else{
				  		echo $this->Html->image('blank_image_female.jpeg',array('width'=>30,'height'=>30));
				  	}
				  }		
			?>

			<?php echo $this->Html->link('Hi '.AuthComponent::user('name'),'/my-profile');?>
		</h1>	
		<?php echo $this->Html->link('Logout','/logout',array('class'=>'logout'));?>
		<?php echo $this->Html->link('Dashboard','/dashboard',array('class'=>'dashboard'));?>