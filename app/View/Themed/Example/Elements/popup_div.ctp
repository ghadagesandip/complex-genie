
<!-- upload media from existing media popup div code starts here-->
<div id="overlay">
  <div id="popup_div" style="display:none;" >
    <div  id="render_content"></div>
     <div style=" clear: both; margin:17px; text-align: center;">
    	<span class="close_me" style=" background: none repeat scroll 0 0 red; cursor: pointer; color: white; font-weight: bolder;  padding: 6px 12px;  ">Close</span>
    	<!--<span class="close_me" id="cancel_add_new_media" style=" background: none repeat scroll 0 0 red;  cursor: pointer; color: white; font-weight: bolder;  padding: 6px 12px;  ">Cancel</span>-->
    </div>
  </div>
</div>

<style>
 .popup_div_background{background-color: #1C1C1C;  height: 100%; left: 0; position: fixed; top: 0;  width: 100%;  z-index: 200;}
 .popup_div_style{ z-index:300; padding:10px ; display:block;  background-color:white;  position:fixed; border : 1px solid black;}
 .render_div_style{z-index:400; height:90%; width: 90%;}
</style>


<script>
$(document).ready(function(){
		
		$('.open-in-popup-div').click(function(){
		
			var width  = '60%';
			var height = '50%'; 
			 
			if($(this).attr('width')){
				width = $(this).attr('width');
			}
			
			if($(this).attr('height')){
				height = $(this).attr('height');
			}

			jQuery.fn.center = function () {
			    this.addClass('popup_div_style');
			    this.css({
			        'left'  : '50%',
			        'top'   : '50%',
			        'width' : width, 
			        'height': height,
			    });
			    this.css({
			        'margin-left': -this.width() / 2 + 'px',
			        'margin-top': -this.height() / 2 + 'px'
			    });
			
			                                                
			    return this;
			}
			$("#overlay").addClass('popup_div_background');
			$("#popup_div").fadeIn().center();
			$("#render_content").addClass('render_div_style');
			$('#render_content').load($(this).attr('href'));
			$('#render_content').slimscroll({
		        'size' : '10px',
		        'height' : '100%',
		        'railVisible' : true,
		        'margin-': '30px'
			    
			    
		     });
		 
	    });
   
	    $(".close_me").click(function(){
			$("#popup_div").fadeOut();
			$("#overlay").removeClass('popup_div_background');
		});
	
});

  
</script>