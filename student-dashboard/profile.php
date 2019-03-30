<?php 
include 'includes/session.php';
$profile=$profile+1;
?>
<?php include 'includes/head.php';?>

<?php

if(isset($_POST["update"])){
    $name=$_POST["name"];
    
    $mobile=$_POST["mobile"];
    $image=$_FILES['image']['name'];
    $image_tmp=$_FILES['image']['tmp_name'];
    
    if(!empty($_FILES['image']['name'])){
        $sql = "UPDATE `student` SET `name` = '$name', `mobile` = '$mobile', `image` = '$image' WHERE `student`.`id` = $session_student_id";        
        if (mysqli_query($conn, $sql)) {
						$path="../media/student_images/$image";
						if(move_uploaded_file($image_tmp,$path)){
							copy($path,"$path");
                            echo '<script language="javascript">';
                        echo 'alert("Updated")';
                        echo '</script>'; 
                        header("Refresh:0");
						}
					}
                else
                {
                    echo '<script language="javascript">';
                        echo 'alert("Failed!")';
                        echo '</script>'; 
                        header("Refresh:0");
                }
    }
    else
    {
        $sql = "UPDATE `student` SET `name` = '$name', `mobile` = '$mobile' WHERE `student`.`id` = $session_student_id";
        if (mysqli_query($conn, $sql)) {
                            echo '<script language="javascript">';
                        echo 'alert("Updated")';
                        echo '</script>'; 
                        header("Refresh:0");
						}
					
                else
                {
                    echo '<script language="javascript">';
                        echo 'alert("Failed!")';
                        echo '</script>'; 
                        header("Refresh:0");
                }
    }
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
                <h2>Profile
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong></strong></h2>
                    </div>                    
                    <div class="body">
                    <div class="">
                       <h5>Email: <?php echo $_SESSION['email'];?></h5>
                       <h5>Registration Date: <?php echo $_SESSION['registration_date'];?></h5>
                        
                <form class="form" method="post" enctype="multipart/form-data">
                    <div class="header">
                    
                    </div>
                    <div class="content col-md-6">      
                       Name:                                          
                        <div class="input-group ">
                            <input type="text" class="form-control" name="name" onkeyup="lettersOnly(this)" value="<?php echo $_SESSION['name']?>" >
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        Mobile:
                        <div class="input-group">
                            <input type="text" class="form-control" name="mobile" onkeyup="numbersOnly(this)" value="<?php echo $_SESSION['mobile']?>">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                         Profile Photo:<img class="img-fluid img-thumbnail" src="../media/student_images/<?php echo htmlentities($_SESSION['image']);?>" alt="">
                        <div class="input-group ">
                            <input type="file" class="form-control" name="image">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                            <div class="footer text-center">
                        <button type="submit" name="update" class="btn btn-danger" id="submit">Update </button>                       
                    </div>            
                    </div>
                    
                    
                </form>
                        
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