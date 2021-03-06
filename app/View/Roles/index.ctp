<div class="roles index">
	<h2><?php echo __('Roles'); ?></h2>
	<?php echo $this->Form->create('Role', array('action' => 'index', 'inputDefaults' => array('div' => false, 'error' => array('wrap' => 'span', 'class' => 'my-error-class')))); ?>
	<?php echo $this->element('bulk_delete'); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="checkbox"><input id="check-all" type="checkbox" ></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($roles as $idx=>$role): ?>
	<tr>
		<td class="checkbox"><input type="checkbox" class="check-all" name="data[Role][<?php echo $idx?>][id]" value="<?php echo $role['Role']['id']?>"></td>
		<td><?php echo h($role['Role']['id']); ?>&nbsp;</td>
		<td><?php echo h($role['Role']['role']); ?>&nbsp;</td>
		<td><?php echo h($role['Role']['created']); ?>&nbsp;</td>
		<td><?php echo h($role['Role']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $role['Role']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $role['Role']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $role['Role']['id']), null, __('Are you sure you want to delete # %s?', $role['Role']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Role'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
