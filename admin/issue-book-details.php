<?php 

include 'includes/session.php';
$issue_book_details=+1;
$issue_book=+1;
?>
    <?php include 'includes/head.php';?>
    

<!---code for return book-->  
<?php  
if(isset($_GET['issue_id']))
{
$issue_id=$_GET['issue_id'];
$fine=$_GET['fine'];
    
$sql = "UPDATE `book_issue` SET `return_date` = now(), `fine` = '$fine', `return_status` = '1' WHERE `book_issue`.`issue_id` = $issue_id";
mysqli_query($conn,$sql);
header('location:issue-book-details.php');
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
                        <h2><strong>All Issue Details</strong></h2>
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
                        <div class="panel panel-default">
                            
                   <div class="panel-body">
                       
                            
    
    <div class="table-responsive">
        
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Book Name</th>
                                            <th>ISBN </th>
                                            <th>Issued Date</th>
                                            <th>Return Date</th>
                                            <th>Over Days</th>
                                            <th>Fine</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$cnt=1;                              
$sql = "SELECT student.name,books.book_name,books.isbn,book_issue.issue_date,book_issue.return_date,book_issue.fine,book_issue.return_status,book_issue.issue_id from  book_issue join student on student.id=book_issue.student_id join books on books.book_id=book_issue.book_id order by book_issue.issue_id desc";
$run=mysqli_query($conn,$sql);               
                
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$id=$row['issue_id'];
								$name=$row['name'];
								$book_name=$row['book_name'];
								$isbn=$row['isbn'];
								$issue_date=$row['issue_date'];
								$return_date=$row['return_date'];
								$fine=$row['fine'];
								$return_status=$row['return_status'];
                                
                                //fine calculate
 
                                //Convert it into a timestamp.
                                $then = strtotime($issue_date);

                                //Get the current timestamp.
                                $now = time();

                                //Calculate the difference.
                                $difference = $now - $then;

                                //Convert seconds into days.
                                $extra_days = ceil($difference / (60*60*24)-7 );
                                if($extra_days>0){
                                    $per_day_fine=$extra_days*10;
                                    $over_day=$extra_days;
                                }
                                else{
                                    $per_day_fine=0;
                                    $over_day=0;
                                }
                                
                                
                                
								
    ?>                                       
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($name);?></td>
                                            <td class="center"><?php echo htmlentities($book_name);?></td>
                                            <td class="center"><?php echo htmlentities($isbn);?></td>
                                            <td class="center"><?php echo htmlentities($issue_date);?></td>
                                            <td class="center"><?php if($return_date=="")
                                            {
                                                echo htmlentities("Not Return Yet");
                                            } else {


                                            echo htmlentities($return_date);
}
                                            ?></td>
                                            <td class="center"><?php echo htmlentities($over_day);?></td>
                                            
                                            <td class="center"><?php if($fine=="")
                                            {
                                                echo htmlentities("$per_day_fine");
                                            } else {


                                            echo htmlentities($fine);
}
                                            ?></td>
                                            
                                            
                                            <td class="center">
<?php if($return_date=="")
 {?>
<a href="issue-book-details.php?issue_id=<?php echo htmlentities($id);?>&fine=<?php echo htmlentities($per_day_fine);?>" onclick="return confirm('Are you sure to return this book?');" >  <button class="btn btn-danger"> Return</button></a>
<?php } else {?>

                                                <button class="btn btn-primary"> Returned</button>
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