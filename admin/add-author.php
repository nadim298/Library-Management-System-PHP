<?php 
include 'includes/session.php';
$add_author=+1;
$author=+1;

?>
    <?php include 'includes/head.php';?>
    
    <!---add category-->
    <?php

if(isset($_POST['create']))
{
$author_name=$_POST['author_name'];
$sql = "INSERT INTO author (author_name)
					VALUES ('$author_name')";
if(mysqli_query($conn,$sql)){
                    $_SESSION['msg']="Succesfully Added Author";
                    header('location:all-author.php');
                }
                else
                    $_SESSION['error']="Something went wrong. Please try again";
                    header('location:all-author.php');
                
}
?>
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
                <h2>Add Author
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Add New Author</strong></h2>
                    </div>                    
                    <div class="body">
                    
                   
                        <form method="post">
                            <div class="form-group">
                            <label>Author Name</label>
                            <input class="form-control" type="text" name="author_name" onkeyup="lettersOnly(this)" autocomplete="off" required />
                            </div>
                            
                            <button type="submit" name="create" class="btn btn-info">Create </button>
                        </form>
    
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