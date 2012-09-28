<?php
$orderdata = $this->session->userdata('cardorder');
if(isset($orderdata) && is_array($orderdata) ){

?>
<div class="containt_box">

<div class="leftcol">
<?php //print_r($userdetail); ?>
<h4 style="float: right; padding-right: 30px;"><a href="<?php echo site_url('organization/logout'); ?>">Logout</a></h4>
<div>
	<h1>Welcome, <span style="font-size: 14px; font-weight: bold;"><a href="<?php echo site_url('organization/account'); ?>"><?php echo $userdetail['fname'].' '.$userdetail['lname'] ; ?></a></span></h1>

	</div>
<div class="clear"></div>

<div><h1>Order Confirmation</h1></div>
<div class="clear"></div>

<?php //print_r($allOrgList); ?>

<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="players">
  <tr>
    <td width="215" style="text-align: right; padding-right: 12px;"><span><?php echo $orderdata['ticket']; ?> Sportzfund game cards:</span></td>
    <td>$<?php echo $orderdata['ticket']*0.40;?></td>
  </tr>
  <tr>
    <td style="text-align: right; padding-right: 12px;"><span>Printer Set-up Fee:</span></td>
    <td>$10</td>
  </tr>
  <tr>
    <td style="text-align: right; padding-right: 12px;"><span><?php if($orderdata['delivery'] == 99) {echo "Urgent";} else if ($orderdata['delivery'] == 15) {echo "Standard"; } else { echo "Premium";} ?> Delivery:</span></td>
    <td>$<?php echo $orderdata['delivery']; ?></td>
  </tr>
  <tr>
    <td style="text-align: right; padding-right: 12px;"><span>Total Cost:</span></td>
    <td> $<?php echo $orderdata['amount']; ?></td>
  </tr>
  <tr>
    <td style="text-align: right; padding-right: 12px;"><span>Your order will arrive by: </span></td>
    <td><?php if($orderdata['delivery'] == 99) {echo "2 - 3 Business days";} else if ($orderdata['delivery'] == 15) {echo "7 - 10 Business days"; } else { echo "3 - 5 Business days";} ?></td>
  </tr>
  </table>
	  </td>
    </tr>
	<tr>
      <td>Need help or to contact Sportzfund?  Feel free to contact us anytime.  We will respond within 24 hours of contact.</td>
	</tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="players" style="padding: 10px 0 0 0;">
  <tr>
    <td width="215" style="text-align: right; padding-right: 12px;"><span>Phone:</span></td>
    <td> 1-888-XXX-XXXX</td>
  </tr>
  <tr>
    <td style="text-align: right; padding-right: 12px;"><span>Email:</span></td>
    <td><a href="#">Support@sportzfund.com</a></td>
  </tr>
    </table>
	</td>
    </tr>
	<tr>
      <td>Thank you for choosing Sportzfund!  We're 100% committed to helping support your organizations fundraising's goals.  </td>
    </tr>
    <tr>
      <td><img src="<?php echo $this->config->item('theme_url'); ?>images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>
  </table>

</div>

</div>

<?php $this->session->unset_userdata('cardorder'); } else { redirect('organization/account'); }?>












