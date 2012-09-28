<?php
$postval=array();
$pdata=$this->session->userdata('post');
if(isset($pdata) && is_array($pdata) ){
$postval=$this->session->userdata('post');
}
?>
<script type="text/javascript">


$(document).ready(function() {
	$("div#regStep2").hide();
	$("div#regStep3").hide();

	$("#moveNextPage").click(function(){
		$("div#regStep1").slideUp();
		$("div#regStep2").slideDown();
		$("a#bredRegStep1").removeClass('here');
		$("a#bredRegStep2").addClass('here');

		$("html, body").animate({ scrollTop: 0 }, "slow");


	});

	$("#regCont").click(function(){
		$("div#regStep2").slideUp();
		$("div#regStep3").slideDown();
		$("a#bredRegStep2").removeClass('here');
		$("a#bredRegStep3").addClass('here');
		$("html, body").animate({ scrollTop: 0 }, "slow");


	});

});





</script>

<div class="containt_box">
<div class="steptop_bg">
<ul>
<li><a href="#" id="bredRegStep1" class="here">Step - 1</a></li>
<li><a href="#" id="bredRegStep2">Step - 2</a></li>
<li><a href="#" id="bredRegStep3">Step - 3</a></li>
</ul>
</div>
<div class="leftcol">
<div><h1>Login</h1></div>
<div class="clear"></div>

<?php if ($this->session->userdata('message')) { ?>
	<div align="center" style="color:#990000; text-align:center;"><?php echo $this->session->userdata('message');?></div>
<?php } ?>


<form method="post" enctype="multipart/form-data" id="frmOrgLogin" name="frmOrgLogin">
<div>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
	  <td><img src="images/spacer.gif" border="0" style="height: 34px;"/></td>
	</tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4" style="margin: 10px 0;">
        <tr>
          <th><strong>Username:</strong></th>
          <td><input type="text" class="textfield" name="email" id="email"/></td>
        </tr>
        <tr>
          <th><strong>Password:</strong></th>
          <td><input type="password" class="textfield" name="password" id="password"/></td>
        </tr>
		<tr>
          <th>&nbsp;</th>
          <td><div class="italic">Forgot username or password click <a href="#">here</a> </div></td>
        </tr>
		<tr>
          <th>&nbsp;</th>
          <td><a href="#">
          	<input type="submit" name="button" id="button" value="Login">
          	<img src="images/login_btn.gif" alt="" width="94" height="49" border="0" style="float: left;"/></a></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><img src="images/spacer.gif" border="0" style="height: 34px;"/></td>
    </tr>
  </table>

</div>
</form>


</div>














