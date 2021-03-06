<!DOCTYPE html>
<html lang="en">
<?php 
	include_once("command/connection.php");
	if(isset($_SESSION['username']))
	{
	  header( "Location: index.php" );
	}
	?>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Dashtreme - Multipurpose Bootstrap4 Admin Template</title>
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
	<!-- Bootstrap core CSS-->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<!-- animate CSS-->
	<link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
	<!-- Icons CSS-->
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<!-- Custom Style-->
	<link href="assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

	<!-- start loader -->
	<div id="pageloader-overlay" class="visible incoming">
		<div class="loader-wrapper-outer">
			<div class="loader-wrapper-inner">
				<div class="loader"></div>
			</div>
		</div>
	</div>
	<!-- end loader -->

	<!-- Start wrapper-->
	<div id="wrapper">

		<div class="loader-wrapper">
			<div class="lds-ring">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
		<div class="card card-authentication1 mx-auto my-5">
			<div class="card-body">
				<div class="card-content p-2">
					<div class="text-center">
						<img src="assets/images/logo-icon.png" alt="logo icon">
					</div>
					<div class="card-title text-uppercase text-center py-3">Sign In</div>
					<form id="frmLogin">
						<div class="form-group">
							<label for="username" class="sr-only">Username</label>
							<div class="position-relative has-icon-right">
								<input type="text" name="username" id="username" class="form-control input-shadow"
									placeholder="Enter Username">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<div class="position-relative has-icon-right">
								<input type="password" id="password" name="password" class="form-control input-shadow"
									placeholder="Enter Password">
								<div class="form-control-position">
									<i class="icon-lock"></i>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-6">
								<div class="icheck-material-white">
									<input type="checkbox" id="user-checkbox" checked="" />
									<label for="user-checkbox">Remember me</label>
								</div>
							</div>
							<div class="form-group col-6 text-right">
								<a href="authentication-reset-password.html">Reset Password</a>
							</div>
						</div>
						<button type="submit"  class="btn btn-light btn-block mt-3">Sign In</button>
						

						

					</form>
				</div>
			</div>
			<div class="card-footer text-center py-3">
				<p class="text-warning mb-0">Do not have an account? <a href="signup.php"> Sign Up
						here</a></p>
			</div>
		</div>
		<!--Start Back To Top Button-->
		<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
		<!--End Back To Top Button-->

		<!--start color switcher-->
		<div class="right-sidebar">
			<div class="switcher-icon">
				<i class="zmdi zmdi-settings zmdi-hc-spin"></i>
			</div>
			<div class="right-sidebar-content">

				<p class="mb-0">Gaussion Texture</p>
				<hr>

				<ul class="switcher">
					<li id="theme1"></li>
					<li id="theme2"></li>
					<li id="theme3"></li>
					<li id="theme4"></li>
					<li id="theme5"></li>
					<li id="theme6"></li>
				</ul>

				<p class="mb-0">Gradient Background</p>
				<hr>

				<ul class="switcher">
					<li id="theme7"></li>
					<li id="theme8"></li>
					<li id="theme9"></li>
					<li id="theme10"></li>
					<li id="theme11"></li>
					<li id="theme12"></li>
					<li id="theme13"></li>
					<li id="theme14"></li>
					<li id="theme15"></li>
				</ul>

			</div>
		</div>
		<!--end color switcher-->

	</div>
	<!--wrapper-->

	<!-- Bootstrap core JavaScript-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- sidebar-menu js -->
	<script src="assets/js/sidebar-menu.js"></script>
	
    <!-- <script src="assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script> -->
	<!-- Custom scripts -->
	<script src="assets/js/app-script.js"></script>
	<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
	<script src="assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
	<script>
		$(document).ready(function () {
			$("#frmLogin").validate({
                    rules: {
                        username: "required",
                        password: "required",
                    },
                    messages: {
                        username: {
                            required: "Please enter a username",
                            minlength: "Your username must consist of at least 2 characters"
                        },
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                    },
                    submitHandler: function(form,e) {
                        e.preventDefault();
                        var username = $("input[name='username']").val();
                        var password = $("input[name='password']").val();
                        console.log('Form submitted');
                        $.ajax({
						url: "command/process.php",
						type: "post",
						data: {
							"username": username,
							"password": password,
							"login": true
						},
						success: function (result) {
							console.log(result)
							if (result == "success") {
								swal("Success!", "Successfully Login",
                                    "success")
								.then(() => {
									window.location.href = "index.php";
								})
							} else {
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'Login Failed',
								})
							}
						},
						error: function (jqXHR, textStatus, errorThrown) {
							console.log(textStatus, errorThrown);
						}
					});
                    }
                    
                });

			});
			


		// 	$("#frmLogin").submit(function (event) {
		// 		event.preventDefault();
		// 		var username = $('input[name=username]').val();
		// 		var password = $('input[name=password]').val();
		// 		if (!(username == "" || password == "")) {

		// 			$.ajax({
		// 				url: "process/process.php",
		// 				type: "post",
		// 				data: {
		// 					"username": username,
		// 					"password": password,
		// 					"login": true
		// 				},
		// 				success: function (result) {
		// 					console.log(result)
		// 					if (result == "success") {
		// 						Swal.fire({
		// 							icon: 'success',
		// 							title: 'Login',
		// 							text: 'Login Successful',
		// 						}).then(() => {
		// 							window.location.href = "admin";
		// 						})
		// 					} else {
		// 						Swal.fire({
		// 							icon: 'error',
		// 							title: 'Oops...',
		// 							text: 'Login Failed',
		// 						})
		// 					}
		// 				},
		// 				error: function (jqXHR, textStatus, errorThrown) {
		// 					console.log(textStatus, errorThrown);
		// 				}
		// 			});

		// 		}
		// 	});
		// });
	</script>
</body>

</html>