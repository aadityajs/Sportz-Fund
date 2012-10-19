<?php //print_r($usertesti);exit;?>

<div class="containt_right">
<div><h1>What Donar says</h1></div>
<div class="clear"></div>
<div><p><img src="<?php echo $this->config->item('theme_url'); ?>images/comma.gif" alt="" width="21" height="19" /><?php if(isset($usertesti)){ echo stripslashes($usertesti['msg']); } ?><img src="images/comma1.gif" alt="" width="21" height="19" /></p></div>
<div class="clear"></div>
<div style="width: 217px; float:none; margin: 30px auto;"><span style="font-style: italic; float: left;"><?php if(isset($usertesti)){ echo $usertesti['user_name'];} ?><br/><span style="color: #686868; font-size: 12px; font-style: italic;"><!--Royal Lepage--></span></span><span style="margin: 0 0 0 10px;"><img src="<?php echo $this->config->item('theme_url'); ?>images/pic4.png" alt="" width="72" height="70" border="0"/></span></div>
</div>
