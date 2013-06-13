

 $(function() {
  	 $( ".datepicker" ).datepicker({
  	 		'dateFormat' : 'yy-mm-dd',
  	 		'changeMonth'   : true,
  	 		'changeYear'   : true,
  	 		'yearRange' : '1930:2013'
  	 });
  	 
  	 
  	 $('#check-all').on('click',function(){
  	 	if($(this).is(':checked')){
  	 		 $('.check-all').prop('checked', true);
  	 	}else{
  	 		 $('.check-all').prop('checked', false);
  	 		 
  	 	}
  	 });
 });