<?php 

include 'includes/session.php';
$all_author=+1;
$author=+1;
?>
    <?php include 'includes/head.php';?>
    
    <!---delete category-->
    <?php
			if(isset($_GET['delete_id'])){
				$delete_id=$_GET['delete_id'];
                    $delete_query="DELETE FROM `author` WHERE `author`.`author_id` = $delete_id";
				if(mysqli_query($conn,$delete_query)){
                    $_SESSION['delmsg']="Author deleted";   
                }
                else
                $_SESSION['delmsg']="Failed to delete";
				
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
            
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>All Author</strong></h2>
                    </div>                    
                    <div class="body">
<div class="row">
                    
<?php if(isset($_SESSION['error'])&& !empty($_SESSION['error']))
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php } ?>
<?php if(isset($_SESSION['msg'])&& !empty($_SESSION['msg']))
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php } ?>

<?php if(isset($_SESSION['updatemsg'])&& !empty($_SESSION['updatemsg']))
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['updatemsg']);?>
<?php echo htmlentities($_SESSION['updatemsg']="");?>
</div>
</div>
<?php } ?>


   <?php if(isset($_SESSION['delmsg'])&& !empty($_SESSION['delmsg']))
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } ?>

</div>
                   
                
    <div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="dataTables-example">
			       <thead>
				<tr>
					<th>Author</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			        <?php
    $query="SELECT * FROM author";
                $run=mysqli_query($conn,$query);              
                
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$author_id=$row['author_id'];
								$author_name=$row['author_name'];
    ?>    

        
				<tr>
					<td><?php echo $author_name;?></td>				
										
					<td><a href="edit-author.php?edit_id=<?php echo $author_id;?>" class="btn btn-block btn-primary">Edit</a></td>					
					<td><a href="all-author.php?delete_id=<?php echo $author_id;?>" class="btn btn-block btn-danger">Delete</a></td>					
				</tr>
			
			<?php
                            }
                        }
    
    ?>
                </tbody>
			</table>
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

    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

<!-- Mirrored from thememakker.com/templates/oreo/university/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Nov 2018 10:49:52 GMT -->
</html>