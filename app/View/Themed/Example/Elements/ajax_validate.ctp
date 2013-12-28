<script>
$(function(){
		
	 //ajax validattion sriprt
  	 
  	 $(':input').blur(function(){
  	 	
	    	var url = '<?php echo $this->Html->url(array("action"=>"ajaxValidate"));?>';	
	    	var field_id = $(this).attr('id');
			var input_type = $(this).attr('type');	    	    	
			if(input_type=='password'){
				return false;
			}
	    	$.ajax({
				type :'POST',
				url  : url,
				data : $(this).serialize(),
				dataType:'json',
				success:function(data){
					//alert(JSON.stringify(data));
					$("#"+field_id).next("p").detach();
					if(data[data['field']]){
						$("#"+field_id).after('<p class="error-message">'+data[data['field']]+'</p>');
					}
				}
//				error:function(){
//					alert('error ocurred');
//				}
					
			});
			return false;
	    });
});


</script>
