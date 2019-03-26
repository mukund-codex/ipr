<?php

	include_once 'include/config.php';
	include_once 'include/admin-functions.php';
	$func = new AdminFunctions();
	$pageName = "Vehicle Details";
	$parentPageURL = 'vehicle_master.php';
	$pageURL = 'vehicle-add.php';

	if(!$loggedInUserDetailsArr = $func->sessionExists()){
		header("location: admin-login.php");
		exit();
	}

	if(isset($_GET['edit'])) {
		$func->checkUserPermissions('discount_coupon_update',$loggedInUserDetailsArr);
	} else {
		$func->checkUserPermissions('discount_coupon_add',$loggedInUserDetailsArr);
	}
	//include_once 'csrf.class.php';
	$csrf = new csrf();
	$token_id = $csrf->get_token_id();
	$token_value = $csrf->get_token($token_id);

	if(isset($_POST['register'])){
		if($csrf->check_valid('post')) {
			$allowed_ext = array('image/jpeg','image/jpg');
			
			$name = trim($func->escape_string($func->strip_all($_POST['coupon_code'])));
			
			//add to database
			$result = $func->addVehicleDetails($_POST);
			header("location:".$pageURL."?registersuccess");

		}
	}
	if(isset($_GET['edit'])){
		$id = $func->escape_string($func->strip_all($_GET['id']));
		$data = $func->getUniqueVehicleDetails($id);
	}
	if(isset($_POST['update'])) {
		if($csrf->check_valid('post')) {
			$allowed_ext = array('image/jpeg','image/jpg');
			$id = trim($func->escape_string($func->strip_all($_POST['id'])));
			
			//update to database
			$result = $func->updateVehicleDetails($_POST);
			header("location:".$pageURL."?updatesuccess&edit&id=".$id);
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo TITLE ?></title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/londinium-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/styles.min.css" rel="stylesheet" type="text/css">
	<link href="css/icons.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/nanoscroller.css" rel="stylesheet">
	<link href="css/emoji.css" rel="stylesheet">
	<link href="css/cover.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.1.10.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.1.10.2.min.js"></script>
	<script type="text/javascript" src="js/plugins/charts/sparkline.min.js"></script>
	<script type="text/javascript" src="js/plugins/forms/uniform.min.js"></script>
	<script type="text/javascript" src="js/plugins/forms/select2.min.js"></script>
	<script type="text/javascript" src="js/plugins/forms/inputmask.js"></script>
	<script type="text/javascript" src="js/plugins/forms/autosize.js"></script>
	<script type="text/javascript" src="js/plugins/forms/inputlimit.min.js"></script>
	<script type="text/javascript" src="js/plugins/forms/listbox.js"></script>
	<script type="text/javascript" src="js/plugins/forms/multiselect.js"></script>
	<script type="text/javascript" src="js/plugins/forms/validate.min.js"></script>
	<script type="text/javascript" src="js/plugins/forms/tags.min.js"></script>
	<script type="text/javascript" src="js/plugins/forms/switch.min.js"></script>
	<script type="text/javascript" src="js/plugins/forms/uploader/plupload.full.min.js"></script>
	<script type="text/javascript" src="js/plugins/forms/uploader/plupload.queue.min.js"></script>
	<script type="text/javascript" src="js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
	<script type="text/javascript" src="js/plugins/forms/wysihtml5/toolbar.js"></script>
	<script type="text/javascript" src="js/plugins/interface/daterangepicker.js"></script>
	<script type="text/javascript" src="js/plugins/interface/fancybox.min.js"></script>
	<script type="text/javascript" src="js/plugins/interface/moment.js"></script>
	<script type="text/javascript" src="js/plugins/interface/jgrowl.min.js"></script>
	<script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>
	<script type="text/javascript" src="js/plugins/interface/colorpicker.js"></script>
	<script type="text/javascript" src="js/plugins/interface/fullcalendar.min.js"></script>
	<script type="text/javascript" src="js/plugins/interface/timepicker.min.js"></script>
	<script type="text/javascript" src="js/plugins/interface/collapsible.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/application.js"></script>
	
	<script type="text/javascript" src="js/additional-methods.js"></script>

	<link href="css/bootstrap-datepicker.min.css" rel="stylesheet">
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/Moment.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#form").validate({
				rules: {
					coupon_code: {
						required: true
					},
					 coupon_value: {
						required: true
					},
					valid_from: {
						required: true
					},
					valid_to: {
						required: true
					},
					
					
				},
				messages: {
					coupon_code:{
						required: "Please enter coupon code"
					},
					 coupon_value:{
						required: "Please Enter coupon value"
					},
					valid_from:{
						required: "Please enter validity from"
					},
					valid_to:{
						required: "Please enter validity to"
					},
					
					
				}
			});
			jQuery.validator.addMethod("greaterThan", 
			function(value, element, params) {
				if (!/Invalid|NaN/.test(new Date(value))) {
					return new Date(value) > new Date($(params).val());
				}
				return isNaN(value) && isNaN($(params).val()) 
					|| (Number(value) > Number($(params).val())); 
			},'Must be greater than {0}.');

			
			var start_date = new Date();
			$('.valid_date').datepicker({
				format: "yyyy-mm-dd",
				startDate: start_date,
				autoclose: true,
			});
			$("#coupon_type").change(validateValue);
			validateValue();
		});
		function validateValue() {
			var percentRules = {
				coupon_value: {
					required: true,
					number: true,
					min:1,
					max: 100
				}
			};
			var amountRules = {
				coupon_value: {
					required: true,
					number: true,
					min:1,
				}
			};
			var coupon_type = $("#coupon_type").val();
			console.log(coupon_type);
			if(coupon_type=='percent') {
				removeRules(amountRules);
				addRules(percentRules);
				//$("#coupon_value").val("");
				//coupon_value
			}
			else if(coupon_type=='amount') {
				removeRules(percentRules);
				addRules(amountRules);
				// $("#coupon_value").val("");
			}
		}
		function addRules(rulesObj){
			for (var item in rulesObj){
			   $('#'+item).rules('add',rulesObj[item]);
			}
		}

		function removeRules(rulesObj){
			for (var item in rulesObj){
			   $('#'+item).rules('remove');
			}
		}
	</script>
</head>
<body class="sidebar-wide">
	<?php include 'include/navbar.php' ?>

	<div class="page-container">

		<?php include 'include/sidebar.php' ?>

		<div class="page-content">

		<div class="breadcrumb-line">
			<div class="page-ttle hidden-xs" style="float:left;">
<?php
				if(isset($_GET['edit'])){ ?>
					<?php echo 'Edit '.$pageName; ?>
<?php			} else { ?>
					<?php echo 'Add New '.$pageName; ?>
<?php			} ?>
			</div>
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="<?php echo $parentPageURL; ?>"><?php echo $pageName; ?></a></li>
				<li class="active">
<?php
				if(isset($_GET['edit'])){ ?>
					<?php echo 'Edit '.$pageName; ?>
<?php			} else { ?>
					<?php echo 'Add New '.$pageName; ?>
<?php			} ?>
				</li>
			</ul>
		</div>

		<a href="<?php echo $parentPageURL; ?>" class="label label-primary">Back to <?php echo $pageName; ?></a><br/><br/>
<?php
		if(isset($_GET['registersuccess'])){ ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<i class="icon-checkmark3"></i> <?php echo $pageName; ?> successfully added.
			</div><br/>
<?php	} ?>
	
<?php
		if(isset($_GET['registerfail'])){ ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<i class="icon-close"></i> <strong><?php echo $pageName; ?> not added.</strong> <?php echo $func->escape_string($func->strip_all($_GET['msg'])); ?>.
			</div><br/>
<?php	} ?>

<?php
		if(isset($_GET['updatesuccess'])){ ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<i class="icon-checkmark3"></i> <?php echo $pageName; ?> successfully updated.
			</div><br/>
<?php	} ?>
	
<?php
		if(isset($_GET['updatefail'])){ ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<i class="icon-close"></i> <strong><?php echo $pageName; ?> not updated.</strong> <?php echo $func->escape_string($func->strip_all($_GET['msg'])); ?>.
			</div><br/>
<?php	} ?>
			<form role="form" action="" method="post" id="form" enctype="multipart/form-data">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-library"></i>Vehicle Details</h6>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<h4>Owner Details</h4>
							<div class="row">
								<div class="col-sm-4">
									<label>Owner Name <span style="color:red">*</span></label>
									<input type="text" class="form-control" required="required" name="owner_name" id="" value="<?php if(isset($_GET['edit'])){ echo $data['owner_name']; }?>"/>
								</div>
								<div class="col-sm-4">
									<label>Owner Email <span style="color:red">*</span></label>
									<input type="text" class="form-control" required="required" name="owner_email" id="owner_email" value="<?php if(isset($_GET['edit'])){ echo $data['owner_email']; }?>"/>
								</div>
								<div class="col-sm-4">
									<label>Owner Number</label>
									<input type="text" class="form-control" name="owner_number" id="owner_number" value="<?php if(isset($_GET['edit'])){ echo $data['owner_mobile']; }?>"/>
								</div>
								
							</div>
							<br>
							<h4>Driver Details</h4>
							<div class="row">
								<div class="col-sm-4">
									<label>Driver Name <span style="color:red">*</span></label>
									<input type="text" class="form-control" required="required" name="driver_name" id="" value="<?php if(isset($_GET['edit'])){ echo $data['driver_name']; }?>"/>
								</div>
								<div class="col-sm-4">
									<label>Driver Email <span style="color:red">*</span></label>
									<input type="text" class="form-control" required="required" name="driver_email" id="driver_email" value="<?php if(isset($_GET['edit'])){ echo $data['driver_email']; }?>"/>
								</div>
								<div class="col-sm-4">
									<label>Driver Number</label>
									<input type="text" class="form-control" name="driver_number" id="driver_number" value="<?php if(isset($_GET['edit'])){ echo $data['driver_mobile']; }?>"/>
								</div>
								
							</div>
							<br>
							<h4>Vehicle Details</h4>
							<div class="row">
								<div class="col-sm-4">
									<label>Vehicle Number <span style="color:red">*</span></label>
									<input type="text" class="form-control" required="required" name="vehicle_number" id="vehicle_number" value="<?php if(isset($_GET['edit'])){ echo $data['vehicle_number']; }?>"/>
								</div>
								<div class="col-sm-4">
									<label>Vehicle Code <span style="color:red">*</span></label>
									<input type="text" class="form-control" required="required" name="vehicle_code" id="vehicle_code" value="<?php if(isset($_GET['edit'])){ echo $data['vehicle_code']; }?>"/>
								</div>
								<div class="col-sm-4">
									<label>Active</label>
									<select class="form-control" name="active" id="active">
										<option value="">Select Active</option>
										<option value="Yes" <?php if(isset($_GET['edit']) && $data['active'] == 'Yes'){ echo 'selected'; }?>>Yes</option>
										<option value="No"<?php if(isset($_GET['edit']) && $data['active'] == 'No'){ echo 'selected'; }?>>No</option>
									</select>
									<!-- <input type="text" class="form-control" name="vehicle_code" id="active" value="<?php if(isset($_GET['edit'])){ echo $data['vehicle_code']; }?>"/> -->
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions text-right">
				<input type="hidden" name="<?php echo $token_id; ?>" value="<?php echo $token_value; ?>" />
<?php
			if(isset($_GET['edit'])){ ?>
					<input type="hidden" class="form-control" name="id" id="" required="required" value="<?php echo $data['id'] ?>"/>
					<button type="submit" name="update" class="btn btn-warning"><i class="icon-pencil"></i>Update <?php echo $pageName; ?></button>
<?php		} else { ?>
					<button type="submit" name="register" class="btn btn-danger"><i class="icon-signup"></i>Add <?php echo $pageName; ?></button>
<?php		} ?>
				</div>
			</form>

<?php 	include "include/footer.php"; ?>
    
		</div>
	</div>

</body>
</html>>