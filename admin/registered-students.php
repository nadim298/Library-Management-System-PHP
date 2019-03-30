<?php 

include 'includes/session.php';
$registered_students=+1;
?>
    <?php include 'includes/head.php';?>
     
<?php  
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "UPDATE `student` SET `status` = '$status' WHERE `student`.`id` = $id";
mysqli_query($conn,$sql);
header('location:registered-students.php');
}



//code for active students
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "UPDATE `student` SET `status` = '$status' WHERE `student`.`id` = $id";
mysqli_query($conn,$sql);
header('location:registered-students.php');
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
                        <h2><strong>All Students</strong></h2>
                    </div>                    
                    <div class="body">
                      
    
    <div class="table-responsive">
        
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Image</th>
                                            <th>Email id </th>
                                            <th>Mobile Number</th>
                                            <th>Reg Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$cnt=1;                              
$sql = "SELECT * from student";
$run=mysqli_query($conn,$sql);               
                
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$id=$row['id'];
								$name=$row['name'];
								$image=$row['image'];
								$email=$row['email'];
								$mobile=$row['mobile'];
								$registration_date=$row['registration_date'];
								$status=$row['status'];
    ?>                                       
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($id);?></td>
                                            <td class="center"><?php echo htmlentities($name);?></td>
                                            <td class="center"><img style="height:75px; width:75px;" src="<?php echo '../media/student_images/'.$image;?>" alt=""> </td>
                                            <td class="center"><?php echo htmlentities($email);?></td>
                                             <td class="center"><?php echo htmlentities($mobile);?></td>
                                             <td class="center"><?php echo htmlentities($registration_date);?></td>
                                            <td class="center"><?php if($status==1)
                                            {
                                                echo htmlentities("Active");
                                            } else {


                                            echo htmlentities("Blocked");
}
                                            ?></td>
                                            <td class="center">
<?php if($status==1)
 {?>
<a href="registered-students.php?inid=<?php echo htmlentities($id);?>" onclick="return confirm('Are you sure you want to block this student?');" >  <button class="btn btn-danger"> Inactive</button></a>
<?php } else {?>

                                                <a href="registered-students.php?id=<?php echo htmlentities($id);?>" onclick="return confirm('Are you sure you want to active this student?');"><button class="btn btn-primary"> Active</button></a> 
                                            <?php } ?>
                                          
                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
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
</body>

    
</html>