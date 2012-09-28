<?php
$postval=array();
$pdata=$this->session->userdata('post');
if(isset($pdata) && is_array($pdata) ){
$postval=$this->session->userdata('post');
}
?>
<script type="text/javascript">


$(document).ready(function() {
	$("div#cardorder2").hide();
	$("div#cardorder3").hide();
	$("tr.shipDiffAddress").hide();

	$("#moveNextPage").click(function(){
		$("div#cardorder1").slideUp();
		$("div#cardorder2").slideDown();

		$("html, body").animate({ scrollTop: 0 }, "slow");


	});

	$("#regCont").click(function(){
		$("div#cardorder2").slideUp();
		$("div#cardorder3").slideDown();
		$("tr.shipDiffAddress").hide();
		$("html, body").animate({ scrollTop: 0 }, "slow");


	});

	$("#correctReg").click(function() {
		$("div#cardorder2").slideUp();
		$("div#cardorder3").slideUp();
		$("div#cardorder1").slideDown();
	});

	$("input#shipDifferent").click(function(){
		$("tr.shipDiffAddress").slideDown();
	});

});





</script>

<div class="containt_box">

<div class="leftcol">
<?php //print_r($userdetail); ?>
<h4 style="float: right; padding-right: 30px;"><a href="<?php echo site_url('organization/logout'); ?>">Logout</a></h4>
<div>
	<h1>Welcome, <span style="font-size: 14px; font-weight: bold;"><?php echo $userdetail['fname'].' '.$userdetail['lname'] ; ?></span></h1>

	</div>
<div class="clear"></div>

<div><h1>Order Hard Copy Cards</h1></div>
<div class="clear"></div>

<?php //print_r($allOrgList); ?>

<form method="post" enctype="multipart/form-data" id="frmCardOrdr" name="frmCardOrdr">
<div id="cardorder1">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
      <td><h1>Fundraiser</h1></td>
    </tr>
    <tr>
      <td>Choose the fundraiser your organization would like to sign up for</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding: 12px 0 0 0;">
        <tr>
          <td>
		  <div class="styled_select2">
		  <select name="org" id="org" style="width: 352px; height: 33px;" >
		  	<?php foreach ($allOrgList as $org=>$val) { ?>
			<option value="<?php echo $val['user_id']; ?>"><?php echo ucwords($val['fname'].' '.$val['lname']); ?></option>
			<?php } ?>
			</select>
			</div>
          </td>
        </tr>
         <tr>
          <td><h1>How many tickets do you want to order?</h1></td>
        </tr>
		<tr>
      <td>Game cards cost .40 cents per ticket plus shipping and handling.  A $10 printer set-up fee will also apply on each order.  </td>
    </tr>
		<tr>
          <td><div class="styled_select2" style=" margin:15px 0;">
		  <select name="ticket" id="ticket" style="width: 352px; height: 33px;" onchange="$('#ticketprice').val(this.value*0.40); $('#reviewTicket').html(this.value); $('#totalPrice').html(parseFloat($('#ticketprice').val())); $('#price').val(this.value*0.40)">
			<?php $tic = 0; for ($tic = 0; $tic <= 100; $tic++ ) {?>
			<option value="<?php echo $tic; ?>"><?php echo $tic; ?></option>
			<?php } ?>
			</select>
			</div>
			<input type="hidden" id="ticketprice" name="ticketprice" value="">
			</td>
        </tr>
        <tr>
          <td style="padding: 20px 0 0 0;"><h1>Review Game card ticket </h1></td>
        </tr>
      </table></td>
    </tr>
	<tr>
      <td><img src="<?php echo $this->config->item('theme_url')?>images/bottom_arrow2.png" alt="" width="693" height="57" /></td>
    </tr>

	<tr>
      <td class="banner_bgbot"><p><img src="<?php echo $this->config->item('theme_url')?>images/bannerbg.jpg" alt="" width="630" height="513" border="0"/></p></td>
    </tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- <input type="checkbox" name="checkbox" value="checkbox"/>
        I confirm that the organization text and information listed on the above ticket is correct.  I assume full responsibility for any
misspelled words, wrong numbers and punctuation errors. --></td>
    </tr>
    <tr>
      <td><img src="<?php echo $this->config->item('theme_url')?>images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>
    <tr>
      <td><a href="javascript: void(0);" id="moveNextPage"  ><img src="<?php echo $this->config->item('theme_url')?>images/next_pagebtn.gif" alt="" width="307" height="49" border="0"/></a></td>
    </tr>
    <tr>
    <td><img src="<?php echo $this->config->item('theme_url')?>images/spacer.gif" alt="" width="1" height="1" /></td>
    </tr>
  </table>
</div>


<div id="cardorder2">
<script type="text/javascript">
function maketot(){
var totalCost = parseFloat($("#shippingCost").val())+parseFloat($("#price").val())+parseInt(10);
$("#totalCost").val(totalCost);
$("#reviewTotalCost").html(totalCost);

}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
      <td><h1>Shipping and Payment: </h1></td>
    </tr>
    <tr>
      <td style="padding: 10px 0;"><span>Note:</span> The shipping cost stated below also includes the production time, packing, and shipping of the game cards to all be completed in the time identified. </td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
          <th width="34%"><input type="radio" name="ship_method" id="ship_method_standard" value="15" selected="selected" onclick="$('#shippingSelected').html(this.value); $('#shippingCost').val(this.value);maketot();"/></th>
          <td width="66%">Standard Delivery - 7 to 10 Business days ($15)</td>
        </tr>
        <tr>
          <th><input type="radio" name="ship_method" id="ship_method_prem" value="45" onclick="$('#shippingSelected').html(this.value); $('#shippingCost').val(this.value);maketot();"/></th>
          <td>Premium Delivery - 3 to 5 Business days ($45)</td>
        </tr>
        <tr>
          <th><input type="radio" name="ship_method" id="ship_method_urgent" value="99" onclick="$('#shippingSelected').html(this.value); $('#shippingCost').val(this.value);maketot();"/></th>
          <td>Urgent Delivery - 2 to 3 Business days ($99)</td>
        </tr>
      </table>
	  </td>
    </tr>
	<tr>
      <td class="bot_line">&nbsp;</td>
    </tr>
    <tr>
      <td class="text18" style="padding: 30px 0;">Review your ticket order and pricing</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
          <th width="35%">&nbsp;</th>
    <td width="35%"><span id="reviewTicket">--</span> tickets - Sportzfund Baseball</td>
	<td width="30%">$<span id="totalPrice">--</span><input type="hidden" name="price" id="price" value=""></td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td>Printer Setup Fee</td>
		  <td><span>$10</span></td>
		  </tr>
        <tr>
          <th>&nbsp;</th>
          <td>Shipping</td>
		  <td> $<span id="shippingSelected">15</span><input type="hidden" name="shippingCost" id="shippingCost" value=""></td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td>Total Cost </td>
		  <td>$<span id="reviewTotalCost">--</span><input type="hidden" name="totalCost" id="totalCost" value=""></td>
        </tr>
         <tr>
          <th style="padding: 15px 0;"><input type="checkbox" name="confTicket" id="confTicket" value="confTicket"/></th>
          <td colspan="2" style="padding: 15px 0;">I confirm the number of tickets and total price of the order </td>
		  </tr>
      </table></td>
    </tr>
	<tr>
      <td class="bot_line">&nbsp;</td>
    </tr>
	<tr>
      <td class="text18" style="padding: 30px 0;">Select Payment Method</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
          <th width="34%"><input type="radio" name="payment_method" id="ccPayment" value="ccPayment"/></th>
          <td width="66%">Credit Card - Visa/Discover/MC/AMEX</td>
        </tr>
        <tr>
          <th><input type="radio" name="payment_method" id="paypalPayment" value="paypalPayment"/></th>
          <td>PayPal payment</td>
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
      <td><input type="button" id="regCont" name="Submit2" class="continue_btn" value=""/></td>
    </tr>
    <tr>
    <td><img src="<?php echo $this->config->item('theme_url')?>images/spacer.gif" alt="" width="1" height="1" /></td>
    </tr>
  </table>
</div>

<div id="cardorder3">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
      <td><h1>Billing: </h1></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
          <th width="34%"><strong>Card Type:</strong></th>
          <td width="66%">
          	<input type="radio" class="" name="cardType" id="cardTypeVisa" value="Visa"/> Visa
          	<input type="radio" class="" name="cardType" id="cardTypeMasterCard " value="MasterCard"/> Master Card
          	<input type="radio" class="" name="cardType" id="cardTypeDiscover" value="Discover"/> Discover
          </td>
        </tr>
        <tr>
          <th><strong>Credit Card Number:</strong></th>
          <td><input type="text" class="textfield" name="cardNo" id="cardNo"/></td>
        </tr>
        <tr>
          <th><strong>Exp Date:</strong></th>
          <td><input type="text" class="textfield" name="expMnt" id="expMnt" style="width: 150px;"/><span style="padding:0; font: normal 34px Arial, Helvetica, sans-serif; vertical-align: middle; margin: 0;"> / </span> <input type="text" class="textfield" name="expYear" id="expYear" style="width: 150px;"/>   <level>(Example 03/2012)</level></td>
        </tr>
        <tr>
          <th><strong>CVV #:</strong></th>
          <td><input type="text" class="textfield" name="cvv" id="cvv" style="width: 150px;"/> <level>3 digit # on back of card </level></td>
        </tr>

      </table></td>
    </tr>
	<tr>
      <td class="bot_line">&nbsp;</td>
    </tr>
    <tr>
      <td class="text18" style="padding: 30px 0;">Shipping</td>
    </tr>
	<tr>
      <td><input type="checkbox" name="shipDifferent" id="shipDifferent" value="checkbox"/> Click the checkbox if the cards are to be shipped to an address that is different from the primary <a href="#">contact</a>.</td>
    </tr>
	<tr>
      <td class="bot_line">&nbsp;</td>
    </tr>

	<tr class="shipDiffAddress">
      <td class="text18" style="padding: 30px 0;">Billing Address</td>
    </tr>
    <tr class="shipDiffAddress">
      <td><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
          <th width="34%"><strong>First Name:</strong></th>
          <td width="66%"><input type="text" class="textfield" name="ship_fname" id="ship_fname"/></td>
        </tr>
        <tr>
          <th><strong>Last Name:</strong></th>
          <td><input type="text" class="textfield" name="ship_lname" id="ship_lname"/></td>
        </tr>
        <tr>
          <th><strong>Address:</strong></th>
          <td><input type="text" class="textfield" name="ship_add" id="ship_add"/></td>
        </tr>
        <tr>
          <th><strong>City, State, Zip:</strong></th>
          <td><input type="text" class="textfield" name="ship_citystatezip" id="ship_citystatezip"/></td>
        </tr>
		<tr>
          <th><strong>Phone #:</strong></th>
          <td><input type="text" class="textfield" name="ship_ph" id="ship_ph"/></td>
        </tr>
        <tr>
          <th><strong>Email:</strong></th>
          <td><input type="text" class="textfield" name="ship_email" id="ship_email"/></td>
        </tr>
        <tr>
          <th><strong>Confirm Email:</strong></th>
          <td><input type="text" class="textfield" name="ship_confemail" id="ship_confemail"/></td>
        </tr>

      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><img src="<?php echo $this->config->item('theme_url')?>images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>
    <tr>
      <td>
      	<input type="submit" name="submitCardOrder" class="place_order_btn" value="submitCardOrder"/>
      	<input type="button" id="correctReg" name="Submit" class="make_btn" value="NO, make corrections "/>
      </td>
    </tr>
    <tr>
    <td><img src="<?php echo $this->config->item('theme_url')?>images/spacer.gif" alt="" width="1" height="1" /></td>
    </tr>
  </table>
</div>

</form>

</div>














