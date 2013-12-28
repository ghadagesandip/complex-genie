<div class="profilePictures view">
<h2><?php  echo __('Profile Picture'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($profilePicture['ProfilePicture']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($profilePicture['User']['username'], array('controller' => 'users', 'action' => 'view', $profilePicture['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profile Picture'); ?></dt>
		<dd>
			<?php echo h($profilePicture['ProfilePicture']['profile_picture']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($profilePicture['ProfilePicture']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($profilePicture['ProfilePicture']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Profile Picture'), array('action' => 'edit', $profilePicture['ProfilePicture']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profile Picture'), array('action' => 'delete', $profilePicture['ProfilePicture']['id']), null, __('Are you sure you want to delete # %s?', $profilePicture['ProfilePicture']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Profile Pictures'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile Picture'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($profilePicture['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Is Active'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Email Address'); ?></th>
		<th><?php echo __('Date Of Birth'); ?></th>
		<th><?php echo __('Profile Picture Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($profilePicture['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['is_active']; ?></td>
			<td><?php echo $user['role_id']; ?></td>
			<td><?php echo $user['first_name']; ?></td>
			<td><?php echo $user['last_name']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['gender']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['email_address']; ?></td>
			<td><?php echo $user['date_of_birth']; ?></td>
			<td><?php echo $user['profile_picture_id']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
