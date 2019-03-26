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
				<div class="col-md-12" id="login-form">
					<h2>Login with Phone Number</h2>
					<!-- <hr class="wi12"> -->
					 <form action="" method="POST" id="form-login">
					    <div class="form-group">
					      <label for="usr">Mobile no</label>
					      <input type="text" placeholder="9773048898" class="form-control" id="number" name="number">
					    </div>
					    <!-- <button type="submit" class="login-btn" id="login" name="login">Login</button> -->
					    <a type="" class="login-btn" id="login">Login</a>
					</form>
				</div>
				<div class="col-md-12 login-colm-otp"  id="otp-form" style="display: none; ">
					<p>We have you an access code via <br>
						SMS for Mobile number verifications</p>
					 <form>
					    <div class="form-group">
					      	<label for="usr" class="otp-labl">enter code here</label>					      
					      	<div class="otp-input-text">
						      	<center>
						      	<input type="text" placeholder="0" id="digit1" name="digit1" maxlength="1" class="form-control otp-input">
						      	<input type="text" placeholder="1" id="digit2" name="digit2" maxlength="1" class="form-control otp-input">
						      	<input type="text" placeholder="2" id="digit3" name="digit3" maxlength="1" class="form-control otp-input">
						      	<input type="text" placeholder="3" id="digit4" name="digit4" maxlength="1" class="form-control otp-input">
						      	</center>
					      	</div>					    
					      <!-- <a type="submit"  id="otp-login" class="login-btn">Verify</a> -->
					       	<div class="btn-form-new">
					       		<!-- <a type="submit"  id="otp-login" class="login-btn">Verify</a> -->
						      <button type="button" id="otp-verify" name="verify-otp" class="login-btn">Verify</button>
						 	</div>
						</div>
					</form>
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
  <script>
  	$(document).ready(function(){
  		$(".login-btn").click(function(){
  			$("#otp-form").show();
  			$("#login-form").hide();
  		});  		
  	});
  </script>
  
</body>
</html>