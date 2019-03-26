<?php

	include('site-config.php');
	if(isset($_SESSION)){
		$mobile = $_SESSION['mobile'];
		if(!isset($_SESSION['video'])){
			$_SESSION['video'] = 1;
		}
		//echo $_SESSION['video'];
		$data = $func->getDetails($mobile);
		$driver_number = $data['driver_mobile'];
		
		if($_SESSION['video'] == 1){
			$videoDetail = $func->getVideoDetailsbyDisplay();
			$video = $videoDetail['video'];
		}
		
		// if(isset($_POST['reset-otp'])){
		// 	if(isset($_SESSION)){
		// 			session_destroy();
		// 	}
		// }

		if(isset($_POST['verify-otp'])){
			
			$otp1 = $_POST['digit1'];
			$otp2 = $_POST['digit2'];
			$otp3 = $_POST['digit3'];
			$otp4 = $_POST['digit4'];

			$otp = $otp1.$otp2.$otp3.$otp4;

			if(isset($_SESSION)){
				$mobile = $_SESSION['mobile'];
				$func->checkVideoOTP($mobile, $otp);
			}
		
		}
		$videoDetail = $func->getVideoDetailsbyDisplay();
		$video = $videoDetail['video'];
		//echo $video;exit;
	}
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
	  <link rel="stylesheet" type="text/css" href="css/responsive.css">  
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

		<div class="container-fluid main-div">
			<div class="container">
				<div class="row" id="video-id">
					<div class="col-md-12">
						<input type="hidden" name="mobile" id="mobile" value="<?php echo $mobile; ?>" />
						<!-- <video width="500" height="500" autoplay> -->
							<video disablepictureinpicture controlslist="nodownload" id="myVideo" controls autoplay>
						  <source src="panel/video/<?php echo $video; ?>" type="video/mp4" />
						</video>
					</div>
				</div>
			</div>
		</div>

		<div id="myModal" class="modal" role="dialog" >
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
						<h4 class="modal-title">OTP</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-12 login-colm-otp" id="otp-form" >
						<p style="text-align:center">We have sent you an access code via <br>
							SMS for Mobile number verifications</p>
							<?php
							if($_SESSION['videoOTP'] == 'Failed'){ ?>
									<center><p style="font-weight:bolder;">Please Enter OTP Again.</p></center>
						 <?php	}
							?>
							<form method="POST">
									<div class="form-group">
											<center><label for="usr" class="otp-labl">enter code here</label></center>
											<div class="otp-input-text">
												<center>
												<input type="text" placeholder="0" id="digit1" name="digit1" maxlength="1" class="form-control otp-input">
												<input type="text" placeholder="1" id="digit2" name="digit2" maxlength="1" class="form-control otp-input">
												<input type="text" placeholder="2" id="digit3" name="digit3" maxlength="1" class="form-control otp-input">
												<input type="text" placeholder="3" id="digit4" name="digit4" maxlength="1" class="form-control otp-input">
												<label id="otp-error" class="error" style="display:none;">Invalid OTP.</label>
												</center>
											</div>	
											<center>				    
												<div class="btn-form-new">
													<button type="submit" id="otp-verify" name="verify-otp" class="login-btn" style="display:none;">Verify</button>
													<button type="button" id="resend-otp" name="resend-otp" class="login-btn">Resend</button>
												</div>
											</center>
									</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="closebutton">Close</button> -->
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
  $(document).on("keyup","#digit4",function(){
			var code1 = $("#digit1").val();
			var code2 = $("#digit2").val();
			var code3 = $("#digit3").val();
			var code4 = $("#digit4").val();
			var code = code1+code2+code3+code4;
			$.ajax({
                type: "POST",
                url: "checkOTP.inc.php",
                data: {code:code,},               
                success: function(response) {
                    console.log(response);   
					if(response == 'failed'){
						$("#otp-error").show();
						$("#otp-verify").hide();
					}else{
						$("#otp-error").hide();
						$("#otp-verify").show();
					}                 
                }
            });
		});
  	$(document).ready(function(){

			<?php 
				if($_SESSION['videoOTP'] == 'Failed'){ ?>
						$("#myModal").modal('show');
			<?php	}
			?>

  		$("video").bind("contextmenu",function(){
        return false;
        });
	  //      	$('[data-fancybox]').fancybox({
			// 	toolbar  : false,
			// 	smallBtn : true,
			// 	iframe : {
			// 		 css : {
			// 		            width : '400px',
			// 		            height : '250px'
			// 		        },
			// 		preload : false
			// 	}
			// })
			 document.getElementById('myVideo').addEventListener('ended',myHandler,false);
		    function myHandler(e) {
						//alert("the video end");
						// $("#myModal").modal('show');
						$('#myModal').modal({
						    backdrop: 'static',
						    keyboard: false  // to prevent closing with Esc button (if you want this too)
						})
						myFunction();
						// var mobile = $("#mobile").val();
						// $.ajax({
						// 	type: "POST",
						// 	url: "sendOTPbyVideo.inc.php",
						// 	data: {mobile:mobile,},               
						// 	success: function(response) {
						// 		//var data = JSON.parse(response); 
						// 		console.log(response);                    
						// 	}
						// });
						
						//document.getElementById("myModal").showModal();
						//parent.$.fancybox.close();
		        
		    }
			// var vids = $("video"); 
			// $.each(vids, function(){
			//        this.controls = false; 
			// }); 
			//Loop though all Video tags and set Controls as false
			var video = document.getElementById('myVideo');
			var supposedCurrentTime = 0;
			video.addEventListener('timeupdate', function() {
			  if (!video.seeking) {
					supposedCurrentTime = video.currentTime;
			  }
			});
			// prevent user from seeking
			video.addEventListener('seeking', function() {
			  // guard agains infinite recursion:
			  // user seeks, seeking is fired, currentTime is modified, seeking is fired, current time is modified, ....
			  var delta = video.currentTime - supposedCurrentTime;
			  if (Math.abs(delta) > 0.01) {
			  	console.log("Seeking is disabled");
			    video.currentTime = supposedCurrentTime;
			  }
			});
			// delete the following event handler if rewind is not required
			video.addEventListener('ended', function() {
			  // reset state in order to allow for rewind
				supposedCurrentTime = 0;
			});
			$("video").click(function() {
			  //console.log(this); 
			  if (this.paused) {
			    this.play();
			  } else {
			    this.pause();
			  }
			});
			$('input.otp-input').on('keyup', function() {
				if ($(this).val()) {
						$(this).next().focus();
				}
		});
		$("#resend-otp").click(function(){
			console.log("resend");
			myFunction();
			alert("New OTP Sent.");
		});
		function myFunction(){
			var mobile = $("#mobile").val();
			$.ajax({
				type: "POST",
				url: "sendOTPbyVideo.inc.php",
				data: {mobile:mobile,},               
				success: function(response) {
					//var data = JSON.parse(response); 
					console.log(response);                    
				}
			});
		}
    });
</script>
</body>
</html>