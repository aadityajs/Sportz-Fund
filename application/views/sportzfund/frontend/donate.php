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
<div class="leftcol">
<div><h1>Make Donation</h1></div>
<div class="clear"></div>

<?php if ($this->session->userdata('message')) { ?>
	<div align="center" style="color:#990000; text-align:center;"><?php echo $this->session->userdata('message');?></div>
<?php } $this->session->unset_userdata('message'); ?>


<form method="post" enctype="multipart/form-data" id="frmDonation" name="frmDonation">



<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
	    <tr>
	      <td><h1>Donating is easy.  Just follow the simple steps below:</h1></td>
	    </tr>
	    <tr>
	      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
	        <tr>
	          <th width="34%"><strong>First Name:</strong></th>
	          <td width="66%"><input type="text" class="textfield" name="fname" value="<?php if(isset($postval['fname'])) echo $postval['fname']?>"/></td>
	        </tr>
	        <tr>
	          <th><strong>Last Name:</strong></th>
	          <td><input type="text" class="textfield" name="lname" value="<?php if(isset($postval['lname'])) echo $postval['lname']?>"/></td>
	        </tr>
	        <tr>
	          <th><strong>Address:</strong></th>
	          <td><input type="text" class="textfield" name="contactaddress" value="<?php if(isset($postval['contactaddress'])) echo $postval['contactaddress']?>"/></td>
	        </tr>
	        <tr>
	          <th><strong>City, State, Zip:</strong></th>
	          <td><input type="text" class="textfield" name="contcitystatezip" value="<?php if(isset($postval['contcitystatezip'])) echo $postval['contcitystatezip']?>"/></td>
	        </tr>
			<tr>
	          <th><strong>Phone #:</strong></th>
	          <td><input type="text" class="textfield" name="phone" value="<?php if(isset($postval['phone'])) echo $postval['phone']?>"/></td>
	        </tr>
	        <tr>
	          <th><strong>Email:</strong></th>
	          <td><input type="text" class="textfield" name="email" value="<?php if(isset($postval['email'])) echo $postval['email']?>"/></td>
	        </tr>
	        <tr>
	          <th><strong>Confirm Email:</strong></th>
	          <td><input type="text" class="textfield" name="confemail" value="<?php if(isset($postval['confemail'])) echo $postval['confemail']?>"/></td>
	        </tr>
	        <tr>
	          <th><strong>Name of person you are supporting:</strong></th>
	          <td><input type="text" class="textfield" name="supportedname" value="<?php if(isset($postval['supportedname'])) echo $postval['supportedname']?>"/></td>
	        </tr>
	      </table></td>
	    </tr>
		<tr>
	      <td class="bot_line">&nbsp;</td>
	    </tr>

	    <tr>
	      <td><strong>Note:</strong> Your transactions are 100% secure and safe.  If you prefer, you can call us at 1-888-xxx-xxxx and provide your credit card information over the phone to one of our dedicated support staff.</td>
	    </tr>
	    <tr>
	      <td><img src="<?php echo $this->config->item('theme_url'); ?>images/spacer.gif" alt="" width="1" height="23" /></td>
	    </tr>

	<tr>
      <td><h1>How much do wish to donate?</h1></td>
    </tr>

	<tr>
		<td class="styled_select"  style="margin-left: 250px;">
			<select name="donation" id="donation" style="width:165px;">
				<option value="10">$10</option>
				<option value="20">$20</option>
				<option value="30">$30</option>
				<option value="50">$50</option>
				<option value="100">$100</option>
				<option value="500">$500</option>
				<option value="1000">$1000</option>
			</select>
		</td>
	</tr>

    <tr>
      <td class="bot_line">&nbsp;</td>
    </tr>
	<tr>
      <td class="text18" style="padding: 30px 0;">Payment</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
       <!--  <tr>
          <th width="34%"><input type="radio" name="payment_method" id="ccPayment" value="ccPayment"/></th>
          <td width="66%">Credit Card - Visa/Discover/MC/AMEX</td>
        </tr> -->
        <tr>
          <th><input type="radio" name="payment_method" id="paypalPayment" value="paypalPayment"/></th>
          <td>PayPal</td>
        </tr>
        <!-- <tr>
          <th><input type="radio" name="payment_method" id="echeckPayment" value="echeckPayment"/></th>
          <td>Electronic Check - Use your bank acct information.  Safe , secure and reliable. </td>
        </tr> -->
      </table></td>
    </tr>
    <tr>
      <td><img src="<?php echo $this->config->item('theme_url')?>images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>

	<tr>
      <td><h1>Payment Details: </h1></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
          <th width="34%"><strong>Card Type:</strong></th>
          <td width="66%"><input type="text" class="textfield" name="cardType" id="cardType"/></td>
        </tr>
        <tr>
          <th><strong>Credit Card Number:</strong></th>
          <td><input type="text" class="textfield" name="cardNo" id="cardNo" value="4379828854845152"/></td>
        </tr>
        <tr>
          <th><strong>Exp Date:</strong></th>
          <td><input type="text" class="textfield" name="expMnt" id="expMnt" style="width: 150px;"/><span style="padding:0; font: normal 34px Arial, Helvetica, sans-serif; vertical-align: middle; margin: 0;"> / </span> <input type="text" class="textfield" name="expYear" id="expYear" style="width: 150px;"/>   <level>(Example 03/2012)</level></td>
        </tr>
        <tr>
          <th><strong>CVV #:</strong></th>
          <td><input type="text" class="textfield" name="cvv" id="cvv" value="962" style="width: 150px;"/> <level>3 digit # on back of card </level></td>
        </tr>

      </table></td>
    </tr>
	<tr>
      <td class="bot_line">&nbsp;</td>
    </tr>

    <tr class="billAddress">
      <td class="text18" style="padding: 30px 0;">Billing Address</td>
    </tr>
    <tr class="billAddress">
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
          <th width="34%"><strong>First Name:</strong></th>
          <td width="66%"><input type="text" class="textfield" name="bill_fname" id="bill_fname"/></td>
        </tr>
        <tr>
          <th><strong>Last Name:</strong></th>
          <td><input type="text" class="textfield" name="bill_lname" id="bill_lname"/></td>
        </tr>
        <tr>
          <th><strong>Address:</strong></th>
          <td><input type="text" class="textfield" name="bill_add" id="bill_add"/></td>
        </tr>
        <tr>
          <th><strong>City, State, Zip:</strong></th>
          <td><input type="text" class="textfield" name="bill_citystatezip" id="bill_citystatezip"/></td>
        </tr>

      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>




    <tr>
      <td>
      <input type="submit" name="makeDonation" id="makeDonation" class="yes_btn" value="Donate"/>

      <!-- <img src="<?php echo $this->config->item('theme_url'); ?>images/yes_btn.gif" alt="" width="93" height="51" border="0"/>
      <input type="hidden" name="submitReg" id="submitReg" />
      <img src="<?php echo $this->config->item('theme_url'); ?>images/nomake_btn.gif" alt="" width="269" height="51" border="0" style="margin: 0 0 0 8px;"/></td> -->
    </tr>
    <tr>
    <td><img src="<?php echo $this->config->item('theme_url'); ?>images/spacer.gif" alt="" width="1" height="1" /></td>
    </tr>
  </table>
</div>
</form>


</div>














