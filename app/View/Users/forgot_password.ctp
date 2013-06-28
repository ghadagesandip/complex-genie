<div id="render_content">
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
						$("#username_check").next("p").detach();
						$("#username_check").after('<p class="error-message">please wait  <?php echo $this->Html->image("processing.gif")?></p>');
					
				},
				success:function(data){
					if(data['fail']){
						$("#username_check").next("p").detach();
						$("#username_check").after('<p class="error-message">'+data['fail']+'</p>');
					}
					
					if(data['success']){
						//$("#username_check").next("p").detach();
						//$("#username_check").after('<p class="success-message">'+data['success']+'</p>');
						$("#render_content").load("<?php echo $this->Html->url(array('action'=>'securityCheck'))?>");
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