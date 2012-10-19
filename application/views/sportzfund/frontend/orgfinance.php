<div class="leftcol">
<h4 style="float: right; padding-right: 30px;"><a href="<?php echo site_url('organization/logout'); ?>">Logout</a></h4>
<div>
	<h1>Welcome, <span style="font-size: 14px; font-weight: bold;"><?php echo $userdetail['fname'].' '.$userdetail['lname'] ; ?></span></h1>

	</div>
<div class="clear"></div>

<div><h1>Financial and Account Status</h1>
</div>
<div class="clear"></div>
<div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
    <tr>
      <td><h1>Sales:</h1></td>
    </tr>
	<tr>
      <td class="text18" style="padding: 20px 0 10px 0;">Campaign Profits </td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="players">
  <tr>
    <td width="170" style="text-align: right; padding-right: 12px;"><span><?php echo $userdetail['fname']; ?> Current Period Sales:</span></td>
    <td><?php 
	//print_r($sale[0]['dn']);
		echo '$'; echo number_format($sale['0']['dn'],2);
		
	?></td>
  </tr>
  <tr>
    <td style="text-align: right; padding-right: 12px;"><span>Sportzfund Fee:</span></td>
    <td>Nil</td>
  </tr>
  <tr>
    <td style="text-align: right; padding-right: 12px;"><span><?php echo $userdetail['fname']; ?> Profit:</span></td>
    <td>Nil</td>
  </tr>
  <tr>
    <td style="text-align: right; padding-right: 12px;"><span><?php echo $userdetail['fname']; ?> Lifetime Sales:</span></td>
    <td> $<?php echo  number_format($lifetimesale[0]['ls']);?> </td>
  </tr>
  </table>
	  </td>
    </tr>
	<tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="donator">
  <tr>
    <td width="25%"><span>Donor </span></td>
    <td width="15%"><span>Donation amount</span></td>
    <td width="25%"><span>Organization </span></td>
    <td width="15%"><span>Date Sold</span></td>
    <td width="20%"><span>Payment</span></td>
  </tr>
  <?php
  foreach($donation as $don)
  {
  ?>
  <tr>
    <td><?php echo $don['fname'];?></td>
    <td>$<?php echo $don['donation'];?></td>
    <td> <?php echo $don['orgname'];?></td>
    <td><?php echo substr($don['date'],0,10);?></td>
    <td><?php if($don['payment']=='paypalPayment'){echo 'Paypal';} ?> </td>
  </tr>
  <?php } ?>
 <!-- <tr>
    <td>Nick Saban </td>
    <td>$10 </td>
    <td> Mike Wilson</td>
    <td> 3/5/2012</td>
    <td>Paypal </td>
  </tr>
  <tr>
    <td>Brady Hoke</td>
    <td> $20</td>
    <td>Ralph Miller </td>
    <td>3/8/2012</td>
    <td>Cash </td>
  </tr>
  <tr>
    <td>Bobby Petrino</td>
    <td>$30</td>
    <td>Tom Smith </td>
    <td> 3/8/2012</td>
    <td>Check </td>
  </tr>-->
</table>
</td>
    </tr>
    <tr>
      <td class="bot_line" style="padding: 8px 0;">&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="players" style="padding: 10px 0;">
  <tr>
    <td width="170"><h1 style="padding: 0; line-height: 18px;">Winners:</h1></td>
    <td>9/2 – Baseball Sportzfund winner $50 to 5TG8-JGM9, Korey Gardner.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>9/5 – Baseball Sportzfund winner $50 to 7HL3-MMY3, Sean Reading.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>10/4 – FootballSportzfund winner $100 to 98JN-KML8, Shawn Rambler.</td>
  </tr>
  </table></td>
    </tr>

    <tr>
      <td><img src="<?php echo $this->config->item('theme_url')?>images/spacer.gif" alt="" width="1" height="23" /></td>
    </tr>
  </table>
</div>
</div>











