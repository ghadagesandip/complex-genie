			<fieldset class="bulk-actions">
				<?php echo $this->Form->input('action.type', array(
					'between' => '<span class="select-wrapper">',
					'after' => '</span>',
					'empty' => 'Bulk Actions',
					'div' => false,
					'label' => 'Perform the action with selected',
					'options' => array(
						'active' => 'Active',
						'in-active' => 'In-active',
						'delete' => 'Delete')
				)); ?>
				<?php echo $this->Form->button('Go', array('class' => 'button')); ?>
			</fieldset>
