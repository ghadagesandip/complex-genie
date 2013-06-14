<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('forgot Password'); ?></legend>
	<?php
		 echo $this->Form->input('username',array('id'=>'username_check')); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>



<script>
    $(document).ready(function(){
    	$('#UserForgotPasswordForm').submit(function() {
			var url = $(this).attr('action');
			$.ajax({
				type :'POST',
				url  : url,
				data : $(this).serializeArray(),
				dataType:'json',
				beforeSend:function(){
					if($("#username_check").is(":empty")){
						$("#username_check").next("p").detach();
						$("#username_check").after('<p class="error-message">Please enter username</p>');
					}
				}
				success:function(data){
					if(data['fail']){
						$("#username_check").next("p").detach();
						$("#username_check").after('<p class="error-message">'+data['fail']+'</p>');
					}
					
					if(data['success']){
						$("#username_check").next("p").detach();
						$("#username_check").after('<p class="success-message">'+data['success']+'</p>');
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