<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">

    <link rel="stylesheet" href="<?php echo $this->config->item('theme_url')?>css/base.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo $this->config->item('theme_url')?>css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo $this->config->item('theme_url')?>css/global.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo $this->config->item('theme_url')?>css/jquery.timepicker.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('theme_url')?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<!--<link rel="stylesheet" href="<?php echo $this->config->item('theme_url')?>css/admin_ style.css" type="text/css" media="all">-->
     <!--[if lt IE 9]>
        <script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
        <script type="text/javascript" src="js/html5.js"></script>
    <![endif]-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>-->

	<script>
		!window.jQuery && document.write('<script src="<?php echo $this->config->item('theme_url')?>js/jquery-1.8.0.min.js"><\/script>');
	</script>
<!--<script src="<?php echo $this->config->item('theme_url')?>js/jquery-1.8.0.min.js"></script>-->
<script src="<?php echo $this->config->item('theme_url')?>js/slides.min.jquery.js"></script>
<script src="<?php echo $this->config->item('theme_url')?>js/jquery.validate.js"></script>
<script src="<?php echo $this->config->item('theme_url')?>js/jquery.maskedinput.js"></script>
<script src="<?php echo $this->config->item('theme_url')?>js/ui.core.js"></script>
<script src="<?php echo $this->config->item('theme_url')?>js/jquery.alphanumeric.pack.js"></script>
<script src="<?php echo $this->config->item('theme_url')?>js/jquery.timepicker.min.js"></script>
<script src="<?php echo $this->config->item('theme_url')?>js/jquery.timepicker.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('theme_url')?>tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('theme_url')?>fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('theme_url')?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script>
	$(function(){
		$('#slides').slides({
			preload: true,
			preloadImage: '<?php echo $this->config->item('theme_url')?>img/loading.gif',
			play: 5000,
			pause: 2500,
			hoverPause: true,
			animationStart: function(current){
				$('.caption').animate({
					bottom:-35
				},100);
				if (window.console && console.log) {
					// example return of current slide number
					console.log('animationStart on slide: ', current);
				};
			},
			animationComplete: function(current){
				$('.caption').animate({
					bottom:0
				},200);
				if (window.console && console.log) {
					// example return of current slide number
					console.log('animationComplete on slide: ', current);
				};
			},
			slidesLoaded: function() {
				$('.caption').animate({
					bottom:0
				},200);
			}
		});
	});
</script>
	<script type="text/javascript">
		$(document).ready(function() {


			$("#faculty_nominee").change(function() {


		var nominee = $('#faculty_nominee').val();


     	//alert(nominee);
		if(nominee=='1')
		{


       	   $('#nominee').show('');
		}
		else
		{


		  $('#nominee').hide('');
		}
    }),


			$("#achiever").validate({
				submitHandler:function(form) {
					SubmittingForm();
				},
				rules: {

				    // simple rule, converted to {required:true}
					fname: "required",
					agree: "required",
					lname: "required",
					address: "required",
					best_time: "required",
					phone_no:"required",
					school_state: "required",
					school_name: "required",
					school_add: "required",
					school_city: "required",
					school_zip: "required",
					school_phone:"required",


					how_did: "required",
					email: {				// compound rule
						required: true,
						email: true
					},
					remail: {				// compound rule
						required: true,
						email: true,
						equalTo: "#textfield3"
					},

					//fac_nominee: {



					//required: true,



				//	},


					school_back: {
						required: true
					}
				},



						messages: {
						fname: "<br><font color='red'>Please enter your First Name</font>",
						lname: "<br><font color='red'>Please enter your Last Name</font>",

			phone_no: "<br><font color='red'>Please enter your Phone Number</font>",
			address: "<br><font color='red'>Please enter Address</font>",
			best_time: "<br><font color='red'>Please enter Best time to call</font>",
			how_did: "<br><font color='red'>Please enter How did you know</font>",
			email: "<br><font color='red'>Please enter your email</font>",
			remail: "<br><font color='red'>Please re type the same email address</font>",
			school_back: "<br><font color='red'>Please enter Some backgroud </font>",
	        agree:"<span style='float:right'><font color='red' text-align: 'right;'>Please agree with terms</font></span>",
			school_name: "<br><font color='red'>Please enter your school</font>",
			school_phone: "<br><font color='red'>Please enter your Phone Number</font>",
			school_add: "<br><font color='red'>Please enter Address</font>",
			school_state: "<br><font color='red'>Please enter the state</font>",
			school_city: "<br><font color='red'>Please enter the city</font>",
			school_zip: "<br><font color='red'>Please enter the zip code</font>",


		}


			});


			$("#textfield6").mask("(999) 999-9999999? x99999");
			$('#textfield7').timepicker();
			$("#phone_no").mask("(999) 999-9999999? x99999");



		$("#password_reset").validate({
				submitHandler:function(form) {
					SubmittingForm();
				},
				rules: {

				    // simple rule, converted to {required:true}
					password: "required",

					retype_pass: {				// compound rule
						required: true,

						equalTo: "#password"
					},

				},



						messages: {
						password: "<br><font color='red'>Please enter password</font>",
						retype_pass: "<br><font color='red'>Please enter same password</font>",


		}


			});


					$("#change_email").validate({
				submitHandler:function(form) {
					SubmittingForm();
				},
				rules: {



					pass: {
					required: true,
					equalTo: "#check_pass"

					},
					email: {				// compound rule
						required: true,
						email: true,

					},
					old_email: {				// compound rule
						required: true,
						email: true,
						equalTo: "#check_mail"

					},


				},



						messages: {
						email: "<br><font color='red'>Please enter a valid email</font>",
						old_email: "<br><font color='red'>Please enter your current email id</font>",
						pass: "<br><font color='red'>Please enter your current Password</font>",


		}


			});



					$("#edit_phone").validate({
				submitHandler:function(form) {
					SubmittingForm();
				},
				rules: {




					phone_no: {				// compound rule
						required: true,


					},

				},



						messages: {
						phone_no: "<br><font color='red'>Please enter your phone no</font>",



		}




			});


				$("#edit_add").validate({
				submitHandler:function(form) {
					SubmittingForm();
				},
				rules: {




					address: {				// compound rule
						required: true,


					},
					city: {				// compound rule
						required: true,


					},
					state: {				// compound rule
						required: true,


					},
					street: {				// compound rule
						required: true,


					},
					zip_code: {				// compound rule
						required: true,


					},

				},



						messages: {
						address: "<br><font color='red'>Please enter your Address</font>",
						city: "<br><font color='red'>Please enter your City</font>",
						state: "<br><font color='red'>Please enter your State</font>",
						street: "<br><font color='red'>Please enter your Street</font>",
						zip_code: "<br><font color='red'>Please enter your Zip code</font>",



		}




			});


						$("#add_achiver").validate({
				submitHandler:function(form) {
					SubmittingForm();
				},
				rules: {




					achfname: {				// compound rule
						required: true,


					},

					achlname: {				// compound rule
						required: true,


					},


					achemail: {				// compound rule
						required: true,
						email: true
					},
					achcemail: {				// compound rule
						required: true,
						email: true,
						equalTo: "#achemail"
					},
					check: {				// compound rule
						required: true,
					},

				},



						messages: {
						achfname: "<br><font color='red'>Please enter Achiever Firstname</font>",
						achlname: "<br><font color='red'>Please enter Achiever Lastname</font>",
						achemail: "<br><font color='red'>Please enter a valid Achiever email</font>",
						achcemail: "<br><font color='red'>Please re type the same email address</font>",
						check: "<br><font color='red'>You need to agree to terms and conditions</font><br>"


		}




			});

			$("#contact").validate({
				submitHandler:function(form) {
					SubmittingForm();
				},
				rules: {

				    // simple rule, converted to {required:true}
					name: "required",
					phone_no:"required",
					content: "required",

					email: {				// compound rule
						required: true,
						email: true
					},
					cemail: {				// compound rule
						required: true,
						email: true,
						equalTo: "#textfield2"
					},

				},



						messages: {
						name: "<br><font color='red'>Please enter your Name</font>",
						phone_no: "<br><font color='red'>Please enter your Phone Number</font>",
						email: "<br><font color='red'>Please enter your email</font>",
						cemail: "<br><font color='red'>Please re type the same email address</font>",
						content: "<br><font color='red'>Please enter your subject </font>",

		}


			});

					$("#pass_word").validate({
				submitHandler:function(form) {
					SubmittingForm();
				},
				rules: {




					password: {				// compound rule
						required: true,


					},

				},



						messages: {
						password: "<br><font color='red'>Please enter your new password</font>",



		}




			});

				$("#reactivation").validate({
				submitHandler:function(form) {
					SubmittingForm();
				},
				rules: {




					reason1: {				// compound rule
						required: true,


					},

					reason2: {				// compound rule
						required: true,


					},

				},



						messages: {
						reason1: "<br><font color='red'>Please enter the reason for suspending your a/c.</font>",
						reason2: "<br><font color='red'>Please enter the reason for reactivation.</font>",



		}




			});






		});
		jQuery.validator.addMethod(
			"selectNone",
			function(value, element) {
				if (element.value == "none")
				{
					return false;
				}
				else return true;
			},
			"Please select an option."
		);






	</script>






</head>

<body>
<!--start maincontainer-->
	<div id="maincontainer">