<?php
		include('site-config.php');
		//print_r($_SESSION);
		
		$data = $func->getAllBanners();		
?>

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
						<?php if($data->num_rows > 0){
								while($row = $func->fetch($data)){ 
								$file_name = str_replace('', '-', strtolower( pathinfo($row['banner_img'], PATHINFO_FILENAME)));
								$ext = pathinfo($row['banner_img'], PATHINFO_EXTENSION); 
						?>
							<div>
								<a href="#">
									<img src="img/banner/<?php echo $file_name.'_crop.'.$ext ?>" alt="">
								</a>
							</div>
						<?php } } ?>
						<!-- <div>
								<a href="#">
									<img src="img/banner-2.png" alt="">
								</a>
							</div>
							<div>
								<a href="#">
									<img src="img/banner-3.png" alt="">
								</a>
							</div> -->
						</div>
					</div>
				</div>
				<div class="container">
					<div class="col-md-12 about-us">
						<h2>About Us</h2>
						<img src="img/line-div.png">
						<?php $desc = $func->fetch($func->query("select description from ".PREFIX."gallery_content")); ?>
						<?php echo $desc['description']; ?>
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
		    autoplay:false,
		    speed: 600,
		    infinite: true,
		    cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
		    touchThreshold: 100,
		    dots: true,
		    infinite: true,
		    slidesToShow: 1,
		    slidesToScroll: 1
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