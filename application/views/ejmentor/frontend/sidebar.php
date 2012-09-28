<div class="body_right"> 
<div class="login_box">
          
						<?php if($this->session->userdata('userid'))
				
				{
				
				
				?>
				
				
					<input type="button" onclick="location.href='<?php echo site_url("home/logout")?>'" id="button" value="LOG OUT">
				
				
				
				<?php }
				
				else
				{
				
				?>
				
				
				<!--<div class="pic_login"><img src="<?php /*echo $this->config->item('theme_url')*/?>images/pic.png" alt="" width="113" height="168"></div>-->
               	  <h1>Member Login</h1>
                    <form action="<?php echo site_url("home/login")?>" method="post" >
				  
                    <table><tr><td style="vertical-align:middle; font-weight:bold;"><label>Email:</label></td><td><input type="text" name="email" id="username"></td></tr>
                    <tr><td style="vertical-align:middle;font-weight:bold;"><label>Password:</label></td><td><input type="password" name="password" id="password"></td></tr></table>
                    <input type="submit" name="button" id="button" value="Login">
						
					</form>
					
					
					<?php } ?>
		  
		  
		  
		  
		   
 <div class="clear"></div>
</div>
               <div style="padding-top:20px;"><img src="<?php echo $this->config->item('theme_url')?>images/facebook_list.png" alt=""></div>
                <div class="login_box">
               	  <h1>Success Members</h1>
                   <div class="user"><img src="<?php echo $this->config->item('theme_url')?>images/user_01.png" alt=""> Went dv shoppin with Coordinat aughter gaga earfones.</div>
                   <div class="user"><img src="<?php echo $this->config->item('theme_url')?>images/user_02.png" alt=""> Went dv shoppin with Coordinat aughter gaga earfones.</div>
                   <div class="see_all"><a href="#">See All &raquo;</a></div>  
                  <div class="clear"></div>
                </div>
            </div>