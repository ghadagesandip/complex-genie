<?php echo Inflector::pluralize('dashboard')?>
<div class="users view">
<h2><?php  echo __('My Profile'); ?></h2>
	<dl>
		<dt>&nbsp;</dt>
		<dd>
			<?php 
				if($user['User']['profile_picture_id']==0){
					if($user['User']['gender']=='Male'){
						echo $this->Html->image('blank_image_male'); 		
					}else{
						echo $this->Html->image('blank_image_female'); 		
					}
					
				}else{		
					echo $this->Html->image('/files/profile-image/thumb/medium/'.$user['User']['pic']); 
				}
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['Role']['role']);?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Address'); ?></dt>
		<dd>
			<?php echo h($user['User']['email_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($user['User']['date_of_birth']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Update Profile'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><span href="<?php echo $this->Html->url(array('action'=>'changePassword'))?>" class="open-in-popup-div" >Change Password</span></li>
		<li><span href="<?php echo $this->Html->url(array('action'=>'changeProfilePicture'))?>" class="open-in-popup-div " width='85%' height='55%'>Change Profile Picture</span></li>
	</ul>
</div>



