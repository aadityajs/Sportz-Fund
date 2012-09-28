<div  id="login_container">
    <div  id="header">

		<div id="logo"><h1><a href="/">AdmintTheme</a></h1></div>

    </div><!-- end header -->

	    <div id="login" class="section">
	    <?php
	    	$loginErr = $this->session->userdata('message');
	    	if (!empty($loginErr)) {
	    ?>
	    	<div id="fail" class="info_div"><span class="ico_cancel"><?php echo $this->session->userdata('message'); ?></span></div>
	    <?php }
	    	$this->session->unset_userdata('message');
	    ?>
	    	<form action="<?php echo site_url("admin/index/login")?>" method="post" id="admin">

			<label><strong>Username</strong></label>
			<input type="text" name="email" id="username"  size="28" class="input"/>
			<br />
			<label><strong>Password</strong></label>
			<input type="password" name="password" id="password"  size="28" class="input"/>
			<br />
			<!-- <strong>Remember Me</strong><input type="checkbox" id="remember" class="input noborder" /> -->

			<br />

			<input type="submit" name="button" id="button" class="loginbutton" class="submit" value="Log In" />

			</form>

			<a href="#" id="passwordrecoverylink">Forgot your username or password?</a>
	    </div>





</div>
