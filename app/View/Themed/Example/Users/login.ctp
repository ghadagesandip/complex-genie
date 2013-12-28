<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php 
        echo $this->Form->input('username');
        echo $this->Form->input('password');
            
    ?>
    
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>

<div class="actions">
	<ul>
		<li> <?php echo $this->Html->link('Register','/register', array('class'=>'button')); ?> </li>
		<li> <?php echo $this->Html->link('Forgot Password?',array('action'=>'forgotPassword'), array('class'=>'button popup')); ?> </li>
	</ul>

</div>

