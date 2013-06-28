<div class="users index">

	<h2><?php echo __('Users'); ?></h2>
	
	<?php echo $this->Form->create('User', array('action' => 'index', 'inputDefaults' => array('div' => false, 'error' => array('wrap' => 'span', 'class' => 'my-error-class')))); ?>
	
		<?php echo $this->element('bulk'); ?>

		<table cellpadding="0" cellspacing="0">

			<tr>
					<th class="checkbox"><input id="check-all" type="checkbox" ></th>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php // echo $this->Paginator->sort('pic'); ?></th>
					<th><?php echo $this->Paginator->sort('is_active'); ?></th>
					<th><?php echo $this->Paginator->sort('role_id'); ?></th>
					<th><?php echo $this->Paginator->sort('first_name'); ?></th>
					<th><?php echo $this->Paginator->sort('last_name'); ?></th>
					<th><?php echo $this->Paginator->sort('username'); ?></th>
					<th><?php echo $this->Paginator->sort('email_address'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			
			<?php foreach ($users as $idx=>$user): ?>
				<tr>
					<td><input type="checkbox" class="check-all" name="data[User][<?php echo $idx?>][id]" value="<?php echo $user['User']['id']?>"></td>
					<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
					<td><?php // echo $this->Html->image('/files/profile_image/thumb/small/'.$user['User']['pic']); ?>&nbsp;</td>
					<td><?php 
						if($user['User']['is_active']){
							echo $this->Html->image('active.png');
						}else{
							echo $this->Html->image('in-active.png');
						} ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($user['Role']['role'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
					</td>
					
					<td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['email_address']); ?>&nbsp;</td>
					<td class="actions">
						<span href="<?php echo $this->Html->url(array('action'=>'changePasswordAdmin',$user['User']['id']))?>" width='85%' height='65%' class="button open-in-popup-div" >Change Password</span>
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
						<?php if(AuthComponent::user('id')!=$user['User']['id']){ echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id']));}else{"";} ?>
					</td>
				</tr>
		<?php endforeach; ?>
		</table>
	</form>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
