<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('role_id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('username');
		echo "<div id ='username_feedback'></div>";
		echo $this->Form->input('password');
		echo $this->Form->input('confirm_password',array('type'=>'password'));
		echo $this->Form->input('email_address');
		echo $this->Form->input('date_of_birth',array('label'=>'Date of Birth','class'=>'datepicker','type'=>'text'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>



<script>
	$(document).ready(function(){

        $('#UserUsername').focus(function(){
            $('#username_feedback').hide();
        });

        $('#UserUsername').blur(function(){
        	var url = '<?php echo $this->Html->url(array('action'=>'checkUsername'));?>';
			$.ajax({
				type :'POST',
				url  : url,
				data : $(this).serializeArray(),
				dataType:'json',
				success:function(data){
					$("#UserUsername").next("p").detach();
					if(data['success']){
						$("#UserUsername").after('<p class="success-message">'+data['success']+'</p>');	
					}else{
						$("#UserUsername").after('<p class="error-message">'+data['username']+'</p>');
					}
				},
				error:function(){
					alert('error ocurred');
				}
					
			});
			return false;
	
	    });

});

</script>