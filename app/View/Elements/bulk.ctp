			<fieldset class="bulk-actions">
				<?php echo $this->Form->input('action.type', array(
					'between' => '<span class="select-wrapper">',
					'after' => '</span>',
					'empty' => __('Bulk Actions'),
					'div' => false,
					'label' => __('Please select and perform action'),
					'options' => array(
						'active' => __('Active'),
						'in-active' => __('In-active'),
						'delete' => __('Delete')
					)
				)); ?>
				<?php echo $this->Form->button(__('Go'), array('class' => 'button')); ?>
			</fieldset>
