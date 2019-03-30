<?php 

include 'includes/session.php';
$category=+1;
?>
    <?php include 'includes/head.php';?>
    
    <!---add category-->
    <?php

if(isset($_POST['update']))
{
$category=$_POST['category'];
$status=$_POST['status'];
$edit_id=intval($_GET['edit_id']);
    
$sql = "UPDATE `category` SET `category_name` = '$category', `status` = '$status' WHERE `category`.`category_id` = $edit_id";
if(mysqli_query($conn,$sql)){
                    $_SESSION['updatemsg']="Succesfully Updated Program";
                    header('location:all-category.php');
                }
                else
                    $_SESSION['updatemsg']="Failed to update category!";
                    header('location:all-category.php');
                
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
                <h2>Dashboard
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Add New Category</strong></h2>
                    </div> 
                    <?php
			
				$edit_id=$_GET['edit_id'];
                    $query="SELECT * FROM category where category_id=$edit_id";
				$run=mysqli_query($conn,$query);
	           $row=mysqli_fetch_array($run);
					$category_id=$row['category_id'];
					$category_name=$row['category_name'];
					$status=$row['status'];
                
				
			
		?>                   
                    <div class="body">
                    
                   
                        <form method="post">
                            <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" type="text" name="category" autocomplete="off" value="<?php echo $category_name;?>" required />
                            </div>
                            <div class="form-group">
                            <label>Category Name</label>
                            <select class="form-control" name="status"  >
                                    <option value="<?php if($status==1){echo "1";} else echo "0";?>"><?php if($status==1){echo "Active";} else echo "Inactive";?></option>
                                    <option value="<?php if($status==1){echo "0";} else echo "1";?>"><?php if($status==1){echo "Inactive";} else echo "Active";?></option>
                                    
                                    
                                </select>
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