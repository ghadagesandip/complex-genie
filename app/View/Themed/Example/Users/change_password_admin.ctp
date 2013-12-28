<div id="render_content">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Change Password'); ?></legend>
	<?php
		 echo $this->Form->input('User.id',array('type'=>'hidden','value'=>$id)); 
		 echo $this->Form->input('User.password',array('type'=>'password')); 
		 echo $this->Form->input('User.confirm_password',array('type'=>'password'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>




<script>
    $(document).ready(function(){
    	$('#UserChangePasswordAdminForm').submit(function() {
			var url = $(this).attr('action');
			
			$.ajax({
				type :'POST',
				url  : url,
				data : $(this).serializeArray(),
				dataType:'json',
				success:function(data){
					if(data['no_error']){
						$("#render_content").html('<p class="error-message"> '+ data['no_error']+'</p>');
						
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

</div>