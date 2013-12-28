<div id="render_content">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter code send to you in email'); ?></legend>
        <?php 
       		 echo $this->Form->input('temporary_password',array('label'=>'Security code'));
   		?>
    
    </fieldset>
<?php echo $this->Form->end(__('submit')); ?>



<script>
    $(document).ready(function(){
    	$('#UserSecurityCheckForm').submit(function() {
			var url = $(this).attr('action');
			if($("#UserTemporaryPassword").val().length==0){
				$("#UserTemporaryPassword").next("p").detach();
				$("#UserTemporaryPassword").after('<p class="error-message">Please enter code</p>');
				return false;
			}
			$.ajax({
				type :'POST',
				url  : url,
				data : $(this).serializeArray(),
				dataType:'json',
				beforeSend:function(){
						$("#UserTemporaryPassword").next("p").detach();
						$("#UserTemporaryPassword").after('<p class="error-message">please wait  <?php echo $this->Html->image("processing.gif")?></p>');
					
				},
				success:function(data){
					if(data['fail']){
						$("#UserTemporaryPassword").next("p").detach();
						$("#UserTemporaryPassword").after('<p class="error-message">'+data['fail']+'</p>');
					}
					
					if(data['success']){
						$("#render_content").load("<?php echo $this->Html->url(array('action'=>'resetPassword'))?>");
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