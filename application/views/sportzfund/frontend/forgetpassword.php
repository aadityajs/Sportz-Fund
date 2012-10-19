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


function check()
{
				if($('#email').val()=="")
                {
                    alert("Please Enter Email!!");
                   $('#email').focus();
                    return false;
                }
}


</script>

<div class="containt_box">

<div class="leftcol">
<div><h1>Forget Password</h1></div>
<div class="clear"></div>
<?php if ($this->session->userdata('message')) { ?>
	<div class="msg"><?php echo $this->session->userdata('message');?></div>
<?php $this->session->unset_userdata('message'); } ?>


<form method="post" enctype="multipart/form-data" id="frmOrgLogin" name="frmOrgLogin" onsubmit="return check()">
<div>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
	  <td><img src="images/spacer.gif" border="0" style="height: 34px;"/></td>
	</tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4" style="margin: 10px 0;">
        <tr>
          <th><strong>Email:</strong></th>
          <td><input type="text" class="textfield" name="email" id="email"/></td>
        </tr>
        
		
		<tr>
          <th>&nbsp;</th>
          <td><a href="#">
          	<input type="submit" name="submit2" id="button" value="Send" class="yes_btn">
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














