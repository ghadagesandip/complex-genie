			<fieldset class="bulk-actions" >
				<?php echo $this->Form->input('action.type', array(
					'between' => '<span class="select-wrapper">',
					'after' => '</span>',
					'div' => false,
					'label' => 'Perform the action with selected',
					'options' => array('delete' => 'Delete')
				)); ?>
				<?php echo $this->Form->button('Go', array('class' => 'button')); ?>
			</fieldset>