<?php $url = Router::url('/', true); ?>
<table width="700" border="0" align="left" cellpadding="0" cellspacing="0" style="border:1px solid #ccc; font-family:Verdana, Arial, Geneva, sans-serif; color:#333; font-size:12px;">
  <tr>
      <td height="110" bgcolor="#198df0">
        <img src="<?php echo $url; ?>img/header_picture.png"  alt="" /> Project Name
      </td>
  </tr>
  <tr>
    <td align="left" valign="top" style="border-right:1px solid #ccc;">
       <table width="100%" border="0" cellpadding="5" cellspacing="0">
	      <tr>
	        <td height="25" colspan="3" style="background-color:#eeeded; font-size:13px; font-weight:bold;">
    	          Password Recovery Email
	        </td>
	      </tr>
	      <tr>
	        <td height="25" colspan="3">
    	          Hi <?php echo $user_data['User']['first_name']?>,<br/>
	              security code is : <?php echo $temporary_password?>
	        </td>
	      </tr>
       </table>
     </td>
  </tr>
</table>