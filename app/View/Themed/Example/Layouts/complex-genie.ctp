<!DOCTYPE html>
<html>
<head>
<?php echo $this->Html->charset(); ?>
<title>
  <?php echo $title_for_layout; ?>
</title
   <?php $url=$urlvalue = Router::url('/', true); ?>
   <link rel="shortcut icon" href="<?php echo $urlvalue; ?>img/favicon.ico" >
   <link rel="icon" href="<?php echo $urlvalue; ?>img/wwise_animated_favicon.gif" type="image/gif" >
   
   <?php 
   
		echo $this->Html->css(array('standard','style'));
		
		echo $this->Html->script('jquery');
		echo $this->Html->script(array('css_browser_selector','../SpryAssets/SpryMenuBar','../SpryAssets/SpryAccordion'));
		echo $this->Html->script(array('../slider/coin-slider'));
		echo $this->Html->css('slider/coin-slider-styles');
		
		echo $this->Html->css('pop_up/demo');
		echo $this->Html->script('pop_up/script');
		
		echo $this->Html->css(array('../SpryAssets/SpryMenuBarHorizontal','../SpryAssets/SpryAccordion'));

		echo $this->Html->css('form');
		echo $this->Html->css('screen');
		
		echo $this->Html->script(array('ckeditor/ckeditor'));
 		echo $this->Html->script(array('ckfinder/ckfinder')); 
        echo $this->Html->script(array('ckeditor/config'));
		
		echo $this->Html->script(array('jquery/ui.core','jquery/ui.checkbox','jquery/jquery.bind','jquery/jquery.selectbox-0.5'));
		echo $this->Html->script(array('jquery/jquery.selectbox-0.5_style_2','jquery/jquery.selectbox-0.5_style_2','jquery/jquery.filestyle'));
        echo $this->Html->script(array('jquery/custom_jquery','jquery/jquery.tooltip','jquery/jquery.dimensions'));
		
        echo $this->Html->script(array('jquery/date','jquery/jquery.datePicker','jquery/jquery.pngFix.pack'));
		 
        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

   ?>
	<!-- Smart Search -->
	<script type="text/javascript"> 
		$(document).ready(function(){
		$(".wwise_outer p").click(function(){
			$(".wwise_inner").slideToggle("slow");
		  });
		});
	</script>
<!-- Smart Search -->

<!--Slider-->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24100845-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--end_pop_up-->



	<script type="text/javascript">
        $(function(){
                $('input').checkBox();
                $('#toggle-all').click(function(){
                $('#toggle-all').toggleClass('toggle-checked');
                $('#mainform input[type=checkbox]').checkBox('toggle');
                return false;
                });
        });
    </script>  
	
	<![if !IE 7]>

    <!--  styled select box script version 1 -->
   
    <script type="text/javascript">
    $(document).ready(function() {
  
            $('.styledselect').selectbox({ inputClass: "selectbox_styled" });
    });
    </script>


    <![endif]>

    <!--  styled select box script version 2 --> 
    
    <script type="text/javascript">
    $(document).ready(function() {
            $('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
            $('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
    });
    </script>
    
    <!--  styled select box script version 3 --> 
    
    <script type="text/javascript">
    $(document).ready(function() {
            $('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
    });
    </script>
   
    <!--  styled file upload script --> 
   
   
    
    <!-- Tooltips -->
    
    <script type="text/javascript">
    $(function() {
            $('a.info-tooltip ').tooltip({
                    track: true,
                    delay: 0,
                    fixPNG: true, 
                    showURL: false,
                    showBody: " - ",
                    top: -35,
                    left: 5
            });
    });
    </script> 
    

    
  <!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix
    
    <script type="text/javascript">
    $(document).ready(function(){
    $(document).pngFix( );
    });
    </script>
    
     -->
    
	
	
	
	
</head>



<body>
<!--/*Wrpapper*/--> 
<div id="inner_wrapper"> 

  <!--Header strat-->
  <div id="inner_main_header">
		<div class="inner_header">
			<div class="inner_logo">
				<a href="<?php echo $this->Html->url(array('controller'=>'dashboards','action'=>'index'));?>"><?php echo $this->Html->image('../images/inner_logo.jpg');?></a>
			</div>
		    <div class="username">
				<ul>
					 <li style="float:right;">
					  <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'logout')) ?>" id="logout">
						<input type="button" value="Logout" name="LOGOUT">
					  </a>
					  
					  </li>
					 <li><strong>Welcome,</strong> <?php echo AuthComponent::user('first_name').' '.AuthComponent::user('last_name')?></li>
				 </ul>
		    </div>
		</div>
  </div>
  <!--Header end-->
  
  
  <!--navigation box start-->
  <div class="navigation">
		<div class="navigation_main">
			<div class="super_admin">
			   <strong style="font-size:25px;"><?php echo $this->Session->read('user_group');?></strong>
			</div>
	  
			<!--navigation start-->
			<div class="main_naviagtion">
			   <!-- displays links for dashboars,settings,policies,mandatory procedures,sop and form and templates  -->
				<?php echo $this->element('horizontal_navigation'); ?>
			</div>
			<!--navigation end-->
		</div>
  </div>
  <!--navigation box end-->
  
  <!--main tital start-->
  <div id="tital_box">
	  <div class="tital_bar">
			<ul>
				<li style="width:192px; background-color:#c2c2c2; font-size:18px; text-indent:25px; font-weight:bold; color:#000;">Navigations</li>
				<li id="now_at" style="width:874px; font-size:20px; padding:0 0 0 15px;">Dashboard</li>
				<li>
					<ul>
						<!--<li style="font-size:12px; padding:0 10px 0 0;"><strong>You are here :</strong></li>
						<li><img src="images/icon/dashboard.png" width="17" height="14" alt="" /></li>
						<!--<li style="font-size:12px; padding:0 0 0 10px;">Dashboard</li>-->
					</ul>
				</li>
		    </ul>
	   </div>
  </div>
  <!--main tital end-->
  
 <!--MIDDLE PART START-->
<div id="middle_content_box">
    	<div class="middle_part">
        
			<!--LEFT PART START-->
        	<div class="middle_part_left">
               <?php echo $this->element('vertical_navigation'); ?>      
            </div>
			<!--LEFT PART END-->
        
   
            <!--RIGHT PART START-->
            <div class="middle_part_right" style="border:0px;">
					 
              <?php echo $this->element('bread_crumb');?>
              <?php echo $this->Session->flash(); ?>
              <?php echo $this->fetch('content'); ?>
	        </div>
       </div>
</div>     
 <!--MIDDLE PART END-->
  
  <!--footer start-->
  <div class="footer">
    <div class="center-sctn">
      <p class="copy">Copyright � 2012 WWISE Pvt Ltd.</p>
    </div>
  </div>
  <!--footer end-->
</div>

<script type="text/javascript">
 $(document).ready(function(){
	  $("#pg_action").html($("#page-heading h1").text());
	  $("#now_at").html($(".breadcrum ul li:eq(1)").text());
	  
	    if($(".breadcrum ul li:eq(1)").text()==''){
	      $("#now_at").html("Dashboard");
		 } 
	  $("#page-heading").detach();
 });

</script>
<?php  echo $this->Js->writeBuffer(); ?>


<!--/*Wrpapper*/--> 
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
</body>
</html>