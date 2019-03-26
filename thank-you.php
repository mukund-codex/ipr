<?php
	include('site-config.php');
	
	
?>

<!DOCTYPE html>
<html lang="en" ><head>
	<title>India perfect Ride</title>
	  <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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

			<style>
					.modal-dialog {
							width: 300px;
							margin: 150px auto;
					}
					.otp-input-text {
							margin: 1px 0% 8px 0%;
					}
		
				.login-colm-otp input {
						width: 16%;
						box-shadow: 0px 0px;
						border: 1px solid #ccc;
						display: inline-block;
						margin: 3px;
						border-radius: 7px;
						background: #e8e3e3;
						text-align: center;
				}
				.modal-header {
						padding: 15px;
						border-bottom: none;
				}
				.modal-body {
						position: relative;
						padding: 0px;
				}
				.modal-footer {
						padding: 15px;
						text-align: right;
						border-top: none;
				}
			</style>

</head>
<body id="video">
	<!--Main Start Code Here-->
	<?php include 'include/header.php' ?>

		<div class="container-fluid main-div" style="margin-top:10%;">
			<div class="container">
				<div class="row" id="video-id">
					<div class="col-md-12">
						<center><h1>Thank you</h1></center>
					</div>
				</div>
			</div>
		</div>

	<?php include 'include/footer.php' ?>		
	<!--Main End Code Here-->
  <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.js" type="text/javascript"></script>
  <script src="js/index.js" type="text/javascript"></script>
  <script src="slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/fancy.js"></script>
  <script>
		$('[data-fancybox]').fancybox({
			toolbar  : false,
			smallBtn : true,
			iframe : {
					css : {
							width : '400px',
							height : '250px'
						},
				preload : false
			}
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
  </script>
</body>
</html>