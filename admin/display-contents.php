<?php 
include 'includes/session.php';
$display_contents=+1;

?>
    <?php include 'includes/head.php';?>
    
    <!---add category-->
    <?php

if(isset($_POST['update']))
{
                                $fb=$_POST['fb'];
								$twitter=$_POST['twitter'];
								$linkedin=$_POST['linkedin'];
								$address=$_POST['address'];
								$email=$_POST['email'];
								$mobile=$_POST['mobile'];
$sql = "UPDATE `display_content` SET `fb` = '$fb', `twitter` = '$twitter', `linkedin` = '$linkedin', `address` = '$address', `email` = '$email', `mobile` = '$mobile' WHERE `display_content`.`id` = 1";
if(mysqli_query($conn,$sql)){
                    echo '<script language="javascript">';
                        echo 'alert("Updated")';
                        echo '</script>'; 
                        header("Refresh:0");
                }
                else
                {
                    echo '<script language="javascript">';
                        echo 'alert("Failed")';
                        echo '</script>'; 
                        header("Refresh:0");
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
                
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Edit Display Contents</strong></h2>
                    </div>                    
                    <div class="body">
                    <?php
                $query="SELECT * FROM display_content where id=1";
						$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$fb=$row['fb'];
								$twitter=$row['twitter'];
								$linkedin=$row['linkedin'];
								$address=$row['address'];
								$email=$row['email'];
								$mobile=$row['mobile'];
                            }
                        }
                ?>
                   
                        <form method="post">
                            <div class="form-group">
                            <label>Facebook Link:</label>
                            <input class="form-control" type="text" name="fb" value="<?php echo "$fb";?>" autocomplete="off" />
                            </div>
                            <div class="form-group">
                            <label>Twitter Link:</label>
                            <input class="form-control" type="text" name="twitter" value="<?php echo "$twitter";?>" autocomplete="off" />
                            </div>
                            <div class="form-group">
                            <label>Linkedin Link:</label>
                            <input class="form-control" type="text" name="linkedin" value="<?php echo "$linkedin";?>"  autocomplete="off" />
                            </div>
                            <div class="form-group">
                            <label>Address:</label>
                            <input class="form-control" type="text" name="address" value="<?php echo "$address";?>"  autocomplete="off" />
                            </div>
                            <div class="form-group">
                            <label>Email:</label>
                            <input class="form-control" type="text" name="email" value="<?php echo "$email";?>"  autocomplete="off" />
                            </div>
                            <div class="form-group">
                            <label>Mobile:</label>
                            <input class="form-control" type="text" name="mobile" value="<?php echo "$mobile";?>"  autocomplete="off" />
                            </div>
                            
                            <button type="submit" name="update" class="btn btn-info">Update </button>
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