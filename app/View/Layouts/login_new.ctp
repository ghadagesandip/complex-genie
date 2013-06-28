<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
           
		      <?php $url=$urlvalue = Router::url('/', true); ?>
             
				<link rel="shortcut icon" href="<?php echo $urlvalue; ?>img/favicon.ico" >
				<link rel="icon" href="<?php echo $urlvalue; ?>img/wwise_animated_favicon.gif" type="image/gif" >
            
            
      
      
	<?php
                echo $this->Html->css(array('standard','style'));
                echo $this->Html->script(array('../slider/jquery','../slider/coin-slider'));
				echo$this->Html->script(array('jquery.validationEngine-en','jquery.validationEngine'));
				echo $this->Html->script(array('css_browser_selector'));
				echo $this->Html->css(array('../slider/coin-slider-styles'));
				echo $this->Html->script(array('pop_up/script'));
				echo $this->Html->css(array('pop_up/demo'));
				
				echo $this->Html->css('validationEngine.jquery');
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



<!-- include the Tools -->

<!--<script src="tabs/jquery.js"></script>-->

<script type="text/javascript">

function MM_swapImgRestore() { //v3.0

  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}

function MM_preloadImages() { //v3.0

  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();

    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)

    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}



function MM_findObj(n, d) { //v4.01

  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {

    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}

  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];

  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);

  if(!x && d.getElementById) x=d.getElementById(n); return x;

}



function MM_swapImage() { //v3.0

  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)

   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}

</script>



<!--start_pop_up-->

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

</head>


<body onload="MM_preloadImages('images/logos/eskom-hov.jpg','images/logos/unisav-hov.jpg','images/logos/mn-hov.jpg','images/logos/bme-hov.jpg','images/logos/vodacam-hov.jpg','images/logos/fosker-hov.jpg','images/logos/nunku-hov.jpg','images/logos/project-hov.jpg','images/logos/seda-hov.jpg')">

<!--/*Wrpapper*/-->

<div id="wrapper"> 

  <!--Header-->

  <div id="header">

    <div class="iso-head">

      <div class="center-sctn"><font class="white-clr text11">WWISE QUALITY MANAGEMENT SYSTEM</font> </div>

    </div>

    	<div class="logo">
			
			<?php echo $this->Html->image('../images/qms_logo.jpg',array('width'=>'259','height'=>'85','url'=>'http://www.wwise.co.za/'))?>
		</div>

    		<div class="login_box">
   		<div class="login_inner">

			<?php echo $this->fetch('content'); ?>
    
	    </div>

    		</div>

  </div>

  <div class="clr">&nbsp;</div>

  <!--Header-->

  <div id="banner">

    <div class="center-sctn" style="padding:0px 0 0 0;"> <!--<img src="images/slider.jpg" alt="" title="" width="1000" height="497" /> -->

    		

     <div class="coin-slider" id="coin-slider-games">

        		<div id="games"> 

                    <a href="#"><img style="display: none;" src="<?php echo $urlvalue; ?>images/slider1.jpg" alt="" border="0" /></a>

                    <a href="#"><img style="display: none;" src="<?php echo $urlvalue; ?>images/slider2.jpg" alt="" border="0" /></a>

                    <a href="#"><img style="display: none;" src="<?php echo $urlvalue; ?>images/slider3.jpg" alt="" border="0"/></a>

                    <a href="#"><img style="display: none;" src="<?php echo $urlvalue; ?>images/slider4.jpg" alt="" border="0" /></a>

                </div>

      </div>

    </div>

  </div>

  

  

		<div class="certificate"><!--Certification scroll start-->

				<div class="icon-slider cret_bg"><!--slider start-->

        			<h2 style="border-bottom:0px;"> <a class="right next fr">Left</a> <a class="left prev fr">Right</a>

          			<div class="clr">&nbsp;</div>

        			</h2>

        			<div class="scrollable" id="scrollable">

					<div style="left:0px;" class="items"><!-- root element for the items start-->

                        <!--scroll 1-->

                        <div class="crtf_inner">

                            <span>Accredited And Certified With</span>

                          <p><?php echo $this->Html->image('../images/cert/icon1.jpg',array('width'=>'101','height'=>'61','border'=>'0'));?></p>

                          <p><?php echo $this->Html->image('../images/cert/icon2.jpg',array('width'=>'101','height'=>'61','border'=>'0'));?></p>

                          <p><?php echo $this->Html->image('../images/cert/icon3.jpg',array('width'=>'101','height'=>'61','border'=>'0'));?></p>

                          <p><?php echo $this->Html->image('../images/cert/icon4.jpg',array('width'=>'101','height'=>'61','border'=>'0'));?></p>

                        </div>

                        <!--scroll 2-->

                        <div class="crtf_inner1">

                            <span>Training Under Mendi Consulting<br /> who is accredited with</span>

                          <p><?php echo $this->Html->image('../images/cert/icon5.jpg',array('width'=>'117','height'=>'61','alt'=>''));?> </p>

                          <p><?php echo $this->Html->image('../images/cert/left_bracket.jpg',array('width'=>'20','height'=>'61','alt'=>''));?></p>

                          <p><?php echo $this->Html->image('../images/cert/icon7.jpg',array('width'=>'154','height'=>'61','alt'=>''));?></p>

                          <p><?php echo $this->Html->image('../images/cert/icon8.jpg',array('width'=>'102','height'=>'61','alt'=>''));?></p>

                          <p><?php echo $this->Html->image('../images/cert/icon9.jpg',array('width'=>'42','height'=>'61','alt'=>''));?></p>

                          <p><?php echo $this->Html->image('../images/cert/icon10.jpg',array('width'=>'130','height'=>'61','alt'=>''));?></p>

                          <p><?php echo $this->Html->image('../images/cert/right_bracket.jpg',array('width'=>'20','height'=>'61','alt'=>''));?></p>

                        </div>

  					</div><!-- root element for the items end-->

					</div>

		</div><!--slider end-->

      </div><!--Certification scroll end-->





  <div id="content" class=" home-section">

    <div class="center-sctn">

      <div class="icon-slider"><!--slider start-->

        <h2><font class="fl">Our Clients</font> <a class="right next fr">Left</a> <a class="left prev fr">Right</a>

          <div class="clr">&nbsp;</div>

        </h2>

        

        <div class="scrollable" id="scrollable">



  <!-- root element for the items start-->

  <div style="left: 0px;" class="items">



    <!-- 1-5 -->

    <div>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image28','','<?php echo $urlvalue?>images/logos/eskom-hov.jpg',1)">
		<?php echo $this->Html->image('../images/logos/eskom.jpg',array('name'=>'Image28','width'=>'140','height'=>'90','border'=>'0','id'=>'Image28'))?>	
		
	 </a>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image29','','<?php echo $urlvalue?>images/logos/unisav-hov.jpg',1)">
	    
		<?php echo $this->Html->image('../images/logos/unisav.jpg',array('name'=>'Image29','width'=>'140','height'=>'90','border'=>'0','id'=>'Image29'))?>	
	  </a>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image30','','<?php echo $urlvalue?>images/logos/mn-hov.jpg',1)">
		
		<?php echo $this->Html->image('../images/logos/mn.jpg',array('name'=>'Image30','width'=>'140','height'=>'90','border'=>'0','id'=>'Image30'))?>	
	  </a>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image31','','<?php echo $urlvalue?>images/logos/bme-hov.jpg',1)">
		 
		 <?php echo $this->Html->image('../images/logos/bme.jpg',array('name'=>'Image31','width'=>'140','height'=>'90','border'=>'0','id'=>'Image31'))?>	
	  </a>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image32','','<?php echo $urlvalue?>images/logos/vodacam-hov.jpg',1)">
		
		<?php echo $this->Html->image('../images/logos/vodacam.jpg',array('name'=>'Image32','width'=>'140','height'=>'90','border'=>'0','id'=>'Image32'))?>	
	  </a> 
	
	</div>



    <!-- 5-10 -->

    <div>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image33','','<?php echo $urlvalue?>images/logos/fosker-hov.jpg',1)">
		<?php echo $this->Html->image('../images/logos/fosker.jpg',array('name'=>'Image33','width'=>'140','height'=>'90','border'=>'0','id'=>'Image33'))?>	
	  </a>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image34','','<?php echo $urlvalue?>images/logos/kpmm-hov.jpg',0)">
		<?php echo $this->Html->image('../images/logos/kpmm.jpg',array('name'=>'Image34','width'=>'140','height'=>'90','border'=>'0','id'=>'Image34'))?>	
	 </a>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image35','','<?php echo $urlvalue?>images/logos/nunku-hov.jpg',1)">
	    
		<?php echo $this->Html->image('../images/logos/nunku.jpg',array('name'=>'Image35','width'=>'140','height'=>'90','border'=>'0','id'=>'Image35'))?>	
	  </a>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image36','','<?php echo $urlvalue?>images/logos/project-hov.jpg',1)">
		
		<?php echo $this->Html->image('../images/logos/project.jpg',array('name'=>'Image36','width'=>'140','height'=>'90','border'=>'0','id'=>'Image36'))?>	
	</a>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image37','','<?php echo $urlvalue?>images/logos/bme-hov.jpg',1)">
	    
		<?php echo $this->Html->image('../images/logos/bme.jpg',array('name'=>'Image37','width'=>'140','height'=>'90','border'=>'0','id'=>'Image37'))?>	
      </a>
</div>



    <!-- 10-15 -->

    <div>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image38','','<?php echo $urlvalue?>images/logos/seda-hov.jpg',1)">
	    
		<?php echo $this->Html->image('../images/logos/seda.jpg',array('name'=>'Image38','width'=>'140','height'=>'90','border'=>'0','id'=>'Image38'))?>	
	  </a>

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image27','','<?php echo $urlvalue?>images/logos/unisav-hov.jpg',1)">
	  
	  <?php echo $this->Html->image('../images/logos/unisav.jpg',array('name'=>'Image27','width'=>'140','height'=>'90','border'=>'0','id'=>'Image27'))?>	
	  </a> 

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image39','','<?php echo $urlvalue?>images/logos/vodacam-hov.jpg',1)">
	  
	  <?php echo $this->Html->image('../images/logos/vodacam.jpg',array('name'=>'Image39','width'=>'140','height'=>'90','border'=>'0','id'=>'Image39'))?>	
	  </a> 

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image40','','<?php echo $urlvalue?>images/logos/mn-hov.jpg',1)">
	  
		<?php echo $this->Html->image('../images/logos/mn.jpg',array('name'=>'Image40','width'=>'140','height'=>'90','border'=>'0','id'=>'Image40'))?>	
	  </a> 

      <a href="http://wwise.co.za/clients.html" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image41','','<?php echo $urlvalue?>images/logos/eskom-hov.jpg',1)">
	  
	  <?php echo $this->Html->image('../images/logos/eskom.jpg',array('name'=>'Image41','width'=>'140','height'=>'90','border'=>'0','id'=>'Image41'))?>	
	  </a
 </div>



  </div>

</div> <!-- root element for the items end-->



      </div><!--slider end-->





    </div>

  </div>

  

  <div class="footer">

    <div class="center-sctn"> <p class="copy">Copyright � 2012 WWISE Pvt Ltd.</p> </div>

  </div>

</div>

<!--/*Wrpapper*/--> 

<!--Slider-->

<script>$(document).ready(function() {

	$('#games').coinslider({ hoverPause: true });

});

</script> 

<!--Tabs-->

<script>

// perform JavaScript after the document is scriptable.

$(function() {

    // setup ul.tabs to work as tabs for each div directly under div.panes

    $("ul.tabs").tabs("div.panes > div");

});

</script>



<!--scroll--> 

 <script>

$(function() {

  // initialize scrollable

  $(".scrollable").scrollable();

});

</script>
<?php echo $this->Js->writeBuffer(); ?>	
</body>
</html>
