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
</head>
<body id="video">
	<!--Main Start Code Here-->
	<?php include 'include/header.php' ?>

		<div class="container-fluid main-div">
			<div class="container">
				<div class="row" id="video-id">
					<div class="col-md-12">
						<!-- <video width="500" height="500" autoplay> -->
							<video disablepictureinpicture controlslist="nodownload" controls autoplay id="myVideo">
						  <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4" />
						</video>
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
  	$(document).ready(function(){
  		$("video").bind("contextmenu",function(){
        return false;
        });
	     $('.main-baner').slick({
	     	draggable: true,
		    arrows: true,
		    fade: true,
		    autoplay:true,
		    speed: 600,
		    infinite: true,
		    cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
		    touchThreshold: 100,
		    dots: true,
		    infinite: true,
		    slidesToShow: 1,
		    slidesToScroll: 1,
	      responsive: [
	        {
	          breakpoint: 1024,
	          settings: {
	            slidesToShow: 3,
	            slidesToScroll: 1,
	            infinite: true,
	            dots: true
	          }
	        },
	        {
	          breakpoint: 801,
	          settings: {
	            slidesToShow: 2,
	            slidesToScroll: 1
	          }
	        },
	        {
	          breakpoint: 601,
	          settings: {
	            slidesToShow: 2,
	            slidesToScroll: 1
	          }
	        },
	        {
	          breakpoint: 480,
	          settings: {
	            slidesToShow: 1,
	            slidesToScroll: 1
	          }
	        }
	       ]
	    });
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
			})
			 document.getElementById('myVideo').addEventListener('ended',myHandler,false);
		    function myHandler(e) {
		        alert("the video end");
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
    });
</script>
</body>
</html>