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
            
                    <a class="nav-link btn btn-white btn-round" href="sign-up.php">STUDENT SIGN UP</a>
                    <a class="nav-link btn btn-white btn-round" href="student-sign-in.php">STUDENT SIGN IN</a>
                    <a class="nav-link btn btn-white btn-round" href="admin-sign-in.php">ADMIN SIGN IN</a>
                
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