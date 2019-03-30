<?php 

include 'includes/session.php';
$dashboard=+1;
?>
    <?php include 'includes/head.php';?>
<body class="theme-blush">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.svg" width="48" height="48" alt="Oreo"></div>
        <p>Please wait...</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay">
    
</div>
<!-- Top Bar -->
    
    <?php include 'includes/header.php';?>
<!-- Left Sidebar -->

    <?php include 'includes/sidebar.php';?>
    
    
<section class="content home">
   
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Dashboard
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
<div class="row clearfix">
                   <?php
                $query="SELECT * FROM student";
                $run=mysqli_query($conn,$query);
    
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-account-o"></i> </div>
                                <div class="content">
                                    <div class="text">Student</div>
                                    <h5 data-fresh-interval="700" data-speed="500" data-to="<?php echo mysqli_num_rows($run);?>" data-from="0" class="number count-to"></h5>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    <?php
                $query="SELECT * FROM books";
                $run=mysqli_query($conn,$query);
    
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-account-circle"></i> </div>
                                <div class="content">
                                    <div class="text">Books</div>
                                    <h5 data-fresh-interval="700" data-speed="500" data-to="<?php echo mysqli_num_rows($run);?>" data-from="0" class="number count-to"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                      <?php
                $query="SELECT * FROM author";
                $run=mysqli_query($conn,$query);
    
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-label"></i> </div>
                                <div class="content">
                                    <div class="text">Authors</div>
                                    <h5 data-fresh-interval="700" data-speed="500" data-to="<?php echo mysqli_num_rows($run);?>" data-from="0" class="number count-to"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                $query="SELECT * FROM category";
                $run=mysqli_query($conn,$query);
    
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-graduation-cap"></i> </div>
                                <div class="content">
                                    <div class="text">Categories</div>
                                    <h5 data-fresh-interval="700" data-speed="500" data-to="<?php echo mysqli_num_rows($run);?>" data-from="0" class="number count-to"></h5>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    
                </div>
            </div>
        
</section>
    
    
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script><!-- USA Map Js -->
<script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob, Count To, Sparkline Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/university/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Nov 2018 10:49:52 GMT -->
</html>