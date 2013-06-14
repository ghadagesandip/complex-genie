<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Change Password'); ?></legend>
	<?php
		 echo $this->Form->input('User.old_password',array('type'=>'password')); 
		 echo $this->Form->input('User.password',array('type'=>'password')); 
		 echo $this->Form->input('User.confirm_password',array('type'=>'password'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>




<script>
    $(document).ready(function(){
    	$('#UserChangePasswordForm').submit(function() {
			var url = $(this).attr('action');
			
			$.ajax({
				type :'POST',
				url  : url,
				data : $(this).serializeArray(),
				dataType:'json',
				success:function(data){
					
					if(data['old_password']){
						$("#UserOldPassword").next("p").detach();
						$("#UserOldPassword").after('<p class="error-message">'+data['old_password']+'</p>');
					}
					if(data['password']){
						$("#UserPassword").next("p").detach();
						$("#UserPassword").after('<p class="error-message">'+data['password'][0]+'</p>');
					}
					if(data['confirm_password']){
						$("#UserConfirmPassword").next("p").detach();
						$("#UserConfirmPassword").after('<p class="error-message">'+data['confirm_password'][0]+'</p>');
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