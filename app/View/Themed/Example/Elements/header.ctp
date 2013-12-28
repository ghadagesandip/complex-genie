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
			<?php echo $this->Html->link('Hi '.AuthComponent::user('name').', '.ucfirst(AuthComponent::user('Role.role')),'/my-profile');?>
		</h1>

		<?php echo $this->Html->link('Arebic', array('controller'=>'users','action'=>'swapLanguage','arb','ar_AR'));?>		
		<?php echo $this->Html->link('English','/change-language/eng/en_EN');?>
		<?php echo $this->Html->link('Marathi','/change-language/mar/mr_MR');?>
		<?php echo $this->Html->link('Logout','/logout',array('class'=>'logout'));?>
		<?php echo $this->Html->link('Dashboard','/dashboard',array('class'=>'dashboard'));?>

        <?php
        /*
            if($user)
                echo 'Welcome ' . $user['username'];
            else {
                echo $this->Html->link('Facebook Login', $fb_login_url) . ' | ';
                echo $this->Html->link('Logout', array('controller' => 'user', 'action' => 'logout'));
            }
        */
        ?>
