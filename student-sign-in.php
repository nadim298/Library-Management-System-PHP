<!-- sign in -->
		<?php
	include 'includes/db.php';
	ob_start();
	session_start();
	if(!$conn){
		echo ("Error connection: ".mysqli_connect_error());
	}
	if(isset($_POST['login'])){
        
			$email=$_POST['email'];
			$password=md5($_POST['password']);
			
            $query="SELECT * FROM student WHERE email='$email' AND password='$password'";
            $run=mysqli_query($conn,$query);
            if(mysqli_num_rows($run)>0){
							$row=mysqli_fetch_array($run);
								$student_id=$row['id'];
								$status=$row['status'];
                if($status==1){
                    $_SESSION['student_id']=$student_id;
				header('location:student-dashboard/index.php');
                }
                else{
                    echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";
                }
                
				
			}
			else{
				echo '<script language="javascript">';
                        echo 'alert("Invalid details!")';
                        echo '</script>';
                header("Refresh:0");
			}
            
        }
            
?>
		<!-- sign in -->
<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/university/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Nov 2018 10:50:21 GMT -->
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Oreo University Admin ::</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/authentication.css">
    <link rel="stylesheet" href="assets/css/color_skins.css">
    
    
        <script>
function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
}
            function numbersOnly(input) {
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}
            
            function ppd() {
  var password = $("#password").val();
  var confirm_password = $("#confirm").val();

  if (password != confirm_password) {
    $("#confirm").css('border-color', "#c80000");
    $("#textboxid").css({
      "background-color": "#fee2e2"
    });
  }
}
</script> 
</head>

<body class="theme-blush authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
        
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" title="Follow us on Twitter" href="javascript:void(0);" target="_blank">
                        <i class="zmdi zmdi-twitter"></i>
                        <p class="d-lg-none d-xl-none">Twitter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="Like us on Facebook" href="javascript:void(0);" target="_blank">
                        <i class="zmdi zmdi-facebook"></i>
                        <p class="d-lg-none d-xl-none">Facebook</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="Follow us on Instagram" href="javascript:void(0);" target="_blank">                        
                        <i class="zmdi zmdi-instagram"></i>
                        <p class="d-lg-none d-xl-none">Instagram</p>
                    </a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link btn btn-white btn-round" href="sign-up.php">STUDENT SIGN UP</a>
                    <a class="nav-link btn btn-white btn-round" href="admin-sign-in.php">Admin SIGN IN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(assets/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="post">
                    <div class="header">
                        <div class="logo-container">
                            <img src="assets/images/logo.svg" alt="">
                        </div>
                        <h5>Student Log In</h5>
                    </div>
                    <div class="content">                                                
                        <div class="input-group input-lg">
                            <input type="text" class="form-control" name="email" placeholder="Email Address" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group input-lg">
                            <input type="password" name="password" placeholder="Password" class="form-control" required />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" name="login" class="btn btn-danger" id="submit">Login </button>
                        <h5><a href="forgot-password.html" class="link">Forgot Password?</a></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#" target="_blank">Contact Us</a></li>
                    <li><a href="#" target="_blank">About Us</a></li>
                    <li><a href="javascript:void(0);">FAQ</a></li>
                </ul>
            </nav>
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>,
                <span>Designed by <a href="#" target="_blank">###</a></span>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
//=============================================================================
$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/university/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Nov 2018 10:50:24 GMT -->
</html>