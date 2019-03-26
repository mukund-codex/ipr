<!DOCTYPE>
<html>
<head>
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
<body>
	<!--Main Start Code Here-->
		<?php include 'include/header.php' ?>
			<div class="main-div">
				<div class="container-fluid">
					<div class="row fullwidth">
						<div class="col-md-12 main-baner">
							<div>
								<a href="#">
									<img src="img/banner-1.png" alt="">
								</a>
							</div>
						<div>
								<a href="#">
									<img src="img/banner-2.png" alt="">
								</a>
							</div>
							<div>
								<a href="#">
									<img src="img/banner-3.png" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="col-md-12 about-us">
						<h2>About Us</h2>
						<img src="img/line-div.png">
						<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						<br>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						
					</p>
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
    });
</script>
  
</body>
</html>