

 $(function() {
  	 $( ".datepicker" ).datepicker({
  	 		'dateFormat' : 'yy-mm-dd',
  	 		'changeMonth'   : true,
  	 		'changeYear'   : true,
  	 		'yearRange' : '1930:2013'
  	 });
  	 
  	 // does check all checkbox on check of check single checkbox
  	 $('#check-all').on('click',function(){
  	 	if($(this).is(':checked')){
  	 		 $('.check-all').prop('checked', true);
  	 	}else{
  	 		 $('.check-all').prop('checked', false);
  	 		 
  	 	}
  	 });
  	 
  	//open link in popup div
  	$(".popup").centerPopup();

    $(".profile_pics_items").hover(function(){
       $(this).find("a").fadeIn("slow");
    },function(){
        $(this).find("a").fadeOut("slow");
    });
    createUploader();

 });

     function createUploader(){
        if($("#attAttachments").length>0){
            var uploader = new qq.FileUploader({
                // pass the dom node (ex. $(selector)[0] for jQuery users)
                element: document.getElementById('attAttachments'),
                // path to server-side upload script
                 action: base_url+'ProfilePictures/ajaxAddPic',
                //action: base_url+'media/attachments/ajaxAddAttachment',
                multiple: true,
                onComplete: function(id, fileName, responseJSON){
                    if($(".profile_pics").length){
                        var file_name = responseJSON["file_name"];
                        console.log(file_name);
                        $(".profile_pics").prepend('<li class="profile_pics_items"><img alt="" src="/complex-genie/files/profile_image/thumb/large/'+file_name+'"></li>');
                    }
                },
                onSubmit: function(id, fileName){
                    console.log('submited sent for upload');
                }
            });
        }

     }