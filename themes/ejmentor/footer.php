</div>
<!--end maincontainer-->

<!--start footer-->
  <div class="clear"></div>
    <footer>
     <div class="footer">			 
          <div class="footer_left">
            <a href="<?php echo site_url("")?>" style="padding-left:0px;">Home</a>|<a href="<?php echo site_url("register/achiever")?>"> Register an  Achiever School</a>|<a href="<?php echo site_url("cms_pages/about_us")?>">About Us</a>|<a href="<?php echo site_url("register/faculty-sponsor")?>">Start a Chapter</a>|<a href="<?php echo site_url("cms_pages/faq")?>">FAQs</a>|<a href="<?php echo site_url("cms_pages/contact_us")?>">Contact Us</a>|<a href="#">Participating Schools</a>|<?php if($this->session->userdata('userid')){?><a href="<?php echo site_url("home/logout")?>">Log Out</a><?php } else { ?><a href="<?php echo site_url("")?>">Log In</a><?php } ?><br>
			© Copyright 2012-2013, All rights reserved. Privacy policy  |  Terms & conditions
       </div>
       <div class="footer_right">
       		<img src="<?php echo $this->config->item('theme_url')?>images/footer_logo.png" alt="">
       </div>
      </div>
	  
     </footer>		
<!--end footer-->

</body>
</html>
