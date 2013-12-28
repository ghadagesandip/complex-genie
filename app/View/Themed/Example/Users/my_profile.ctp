<?php // echo "<pre>"; print_r($currentuser);?>
<div class="users view">
<h2><?php  echo __('My Profile'); ?></h2>
	<dl>
		<dt>&nbsp;</dt>
		<dd>
			<?php 
				if($currentuser['User']['profile_picture_id']==0){
					if($currentuser['User']['gender']=='Male'){
						echo $this->Html->image('blank_image_male'); 		
					}else{
						echo $this->Html->image('blank_image_female'); 		
					}
					
				}else{		
					echo $this->Html->image('/files/profile_image/thumb/medium/'.$currentuser['ProfilePicture']['profile_picture']);
				}
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($currentuser['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($currentuser['Role']['role']);?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($currentuser['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($currentuser['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($currentuser['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Address'); ?></dt>
		<dd>
			<?php echo h($currentuser['User']['email_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($currentuser['User']['date_of_birth']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($currentuser['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($currentuser['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Update Profile'), array('action' => 'edit', $currentuser['User']['id'])); ?> </li>
		<li><a href="<?php echo $this->Html->url(array('action'=>'changePassword'))?>" class="button popup" >Change Password</a></li>
		<li><a href="<?php echo $this->Html->url(array('action'=>'changeProfilePicture'))?>" class="button popup" width='65%' height='65%'>Change Profile Picture</a></li>
	</ul>
</div>



