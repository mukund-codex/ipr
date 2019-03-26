<?php 

			include('site-config.php');
			
			$_SESSION['status'] = 'initiate';
		//	$_SESSION['video'] ;
			if(isset($_POST['login'])){
				$mobile = $func->escape_string($func->strip_all($_POST['number']));

				$_SESSION['mobile']	= $mobile;			
				$func->callsms($mobile);
			}
			
			if(isset($_POST['verify-otp'])){
				
					$otp1 = $_POST['digit1'];
					$otp2 = $_POST['digit2'];
					$otp3 = $_POST['digit3'];
					$otp4 = $_POST['digit4'];

					$otp = $otp1.$otp2.$otp3.$otp4;

					if(isset($_SESSION)){
						$mobile = $_SESSION['mobile'];
						$func->checkOTP($mobile, $otp);
					}
			}

			if(isset($_POST['resend-otp'])){
				if(isset($_SESSION)){
					$mobile = $_SESSION['mobile'];	
					$func->callsms($mobile);
				}
			}

			if(isset($_POST['code_submit'])){
				$vehicle_code = $func->escape_string($func->strip_all($_POST['vehicle_code']));
				 if(isset($_SESSION)){
					 	$mobile = $_SESSION['mobile'];
						$func->updateVechicleCode($mobile, $vehicle_code);
				 }
			}

?>

<!DOCTYPE>
<html>
<head>
	<title>India perfect Ride</title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <link rel="shortcut icon" href="img/favicon.png" type="image/png" />
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
      <link rel="stylesheet" href="css/fancy.css">
      <link rel="stylesheet" href="css/animate.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="slick/slick.css">
      <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
      <link rel="stylesheet" ty pe="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!--Main Start Code Here-->
	<div class="wrapper" id="login">		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12" id="login-form" <?php if(isset($_SESSION) && $_SESSION['status'] == 'initiate'){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?>>
					<h2>Login with Phone Number</h2>
					<!-- <hr class="wi12"> -->
					 <form action="" method="POST" id="form-login">
					    <div class="form-group">
					      <label for="usr">Mobile no</label>
					      <input type="text" placeholder="9773048898" class="form-control" id="number" name="number">
					    </div>
					    <button type="submit" class="login-btn" id="login" name="login">Login</button>
					    <!-- <a type="" class="login-btn" id="login">Login</a> -->
					</form>
				</div>
				<div class="col-md-12 login-colm-otp" id="otp-form" <?php if(isset($_SESSION) && $_SESSION['status'] == 'sent'){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?>>
				 
					<p>We have sent you an access code via <br>
					SMS for Mobile number verifications</p>
					 <form method="POST">
					    <div class="form-group">
					      	<!-- <label for="usr" class="otp-labl">enter code here</label>					       -->
					      	<div class="otp-input-text">
						      	<center>
						      	<input type="text" placeholder="0" id="digit1" name="digit1" maxlength="1" class="form-control otp-input">
						      	<input type="text" placeholder="1" id="digit2" name="digit2" maxlength="1" class="form-control otp-input">
						      	<input type="text" placeholder="2" id="digit3" name="digit3" maxlength="1" class="form-control otp-input">
						      	<input type="text" placeholder="3" id="digit4" name="digit4" maxlength="1" class="form-control otp-input">
								  <label id="otp-error" class="error" style="display:none;">Invalid OTP.</label>
						      	</center>
								
					      	</div>					    
					       	<div class="btn-form-new">
						      <button type="submit" id="otp-verify" name="verify-otp" class="login-btn" style="display:none;">Verify</button>
									<button type="submit" id="resend-otp" name="resend-otp" class="login-btn">Resend</button>
						 	</div>
						</div>
					</form>
				</div>

				<div class="col-md-12 vehicle-otp"  id="vehicle-otp" <?php if(isset($_SESSION) && $_SESSION['status'] == 'Verified'){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?>>
					<p>OTP Successfully Verified</p>
					 <form method="POST">
					    <div class="form-group">
							<div class="form-group">
					      <label for="usr">Code</label>
					      <input type="text" placeholder="Code" class="form-control" id="vehicle_code" name="vehicle_code">
						  <label display_for="vehicle_code" id="vehicle_error" class="error" style="display:none;">Wrong Code.</label>
					    </div>
					    <button type="submit" class="login-btn" id="code_submit" name="code_submit" style="display:none;">Submit</button>
						 	</div>
						</div>
					</form>
				</div>

				<div class="col-md-12 failed" id="failed" style="display:none;">
					<p>OTP Not Verified<br>
					Please try again</p>
				</div>

			</div>
		</div>
	</div>
	<!--Main End Code Here-->
  <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.js" type="text/javascript"></script>
  <script src="js/index.js" type="text/javascript"></script>
  <script src="slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/fancy.js"></script>
  <script src="js/jquery.validate.js" type="text/javascript"></script>
  <script>
    $("#form-login").validate({
      rules: {
		number: {
			required: true,
			number:true,
			maxlength:10,
			minlength:10
			}		
        },
      });
  $(document).on("keyup","#digit4",function(){
			var code1 = $("#digit1").val();
			var code2 = $("#digit2").val();
			var code3 = $("#digit3").val();
			var code4 = $("#digit4").val();
			var code = code1+code2+code3+code4;
			$.ajax({
                type: "POST",
                url: "checkOTP.inc.php",
                data: {code:code},               
                success: function(response) {
                    console.log(response);   
					if(response == 'failed' || response == 'blank'){
						$("#otp-error").show();
						$("#otp-verify").hide();
					}else{
						$("#otp-error").hide();
						$("#otp-verify").show();
					}                 
                }
            });
		});
  $(document).on("keyup","#vehicle_code",function(){
			var code = $("#vehicle_code").val();
			$.ajax({
                type: "POST",
                url: "checkVehicleCode.inc.php",
                data: {code:code,},               
                success: function(response) {
                    console.log(response);   
					if(response == 'failed'){
						$("#vehicle_error").show();
						$("#code_submit").hide();
					}else{
						$("#vehicle_error").hide();
						$("#code_submit").show();
					}                 
                }
            });
		});
  	$(document).ready(function(){
  		$(".login-btn").click(function(){
					// $("#vehicle-otp").show();
  				// $("#otp-form").hide();
  		});  		

			$("#code_submit").click(function(){
				parent.$.fancybox.close();
				window.open("video.php");
			});

			
  	});

		$('input.otp-input').on('keyup', function() {
				if ($(this).val()) {
						$(this).next().focus();
				}
		});

		
  </script>
  
</body>
</html>