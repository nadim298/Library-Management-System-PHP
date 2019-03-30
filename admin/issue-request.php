<?php 

include 'includes/session.php';
$issue_request=+1;
$issue_book=+1;
?>
    <?php include 'includes/head.php';?>
    

<!---code for return book-->  
<?php  
if(isset($_GET['issue_id']))
{
$issue_id=$_GET['issue_id'];
$fine=$_GET['fine'];
    
$sql = "UPDATE `book_issue` SET `return_date` = now(), `fine` = '$fine' WHERE `book_issue`.`issue_id` = $issue_id";
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
                        <h2><strong>Issue Request</strong></h2>
                    </div>                    
                    <div class="body">
                        
                        <div class="row">
                            <?php if(isset($_GET['add_error'])){?>
                            <div class="col-md-6">
                            <div class="alert alert-danger" >
                             <strong>Error :</strong> 
                             <?php echo htmlentities($_GET['add_error']);?>
                            </div>
                            </div>
                            <?php } ?>
                            <?php if(isset($_GET['add_msg']))
                            {?>
                            <div class="col-md-6">
                            <div class="alert alert-success" >
                             <strong>Success :</strong> 
                             <?php echo htmlentities($_GET['add_msg']);?>
                            </div>
                            </div>
                            <?php } ?>
                            
                            <?php if(isset($_GET['update_error'])){?>
                            <div class="col-md-6">
                            <div class="alert alert-danger" >
                             <strong>Error :</strong> 
                             <?php echo htmlentities($_GET['update_error']);?>
                            </div>
                            </div>
                            <?php } ?>
                            <?php if(isset($_GET['update_msg']))
                            {?>
                            <div class="col-md-6">
                            <div class="alert alert-success" >
                             <strong>Success :</strong> 
                             <?php echo htmlentities($_GET['update_msg']);?>
                            </div>
                            </div>
                            <?php } ?>
                            
                            <?php if(isset($delete_error)){?>
                            <div class="col-md-6">
                            <div class="alert alert-danger" >
                             <strong>Error :</strong> 
                             <?php echo htmlentities($delete_error);?>
                            </div>
                            </div>
                            <?php } ?>
                            <?php if(isset($delete_msg))
                            {?>
                            <div class="col-md-6">
                            <div class="alert alert-success" >
                             <strong>Success :</strong> 
                             <?php echo htmlentities($delete_msg);?>
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
                                            <th>Request Date</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$cnt=1;                              
$sql = "SELECT student.name,student.id,books.book_name,books.isbn,issue_request.request_date,issue_request.request_id from issue_request join student on student.id=issue_request.student_id join books on books.book_id=issue_request.book_id order by issue_request.request_id desc";
$run=mysqli_query($conn,$sql);               
                
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$request_id=$row['request_id'];
								$student_id=$row['id'];
								$name=$row['name'];
								$book_name=$row['book_name'];
								$isbn=$row['isbn'];
								$request_date=$row['request_date'];
								
                                
    ?>                                       
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($name);?></td>
                                            <td class="center"><?php echo htmlentities($book_name);?></td>
                                            <td class="center"><?php echo htmlentities($isbn);?></td>
                                            <td class="center"><?php echo htmlentities($request_date);?></td>
                                            <td><a href="issue-new-book.php?student_id=<?php echo $student_id;?>&isbn=<?php echo $isbn;?>&request_id=<?php echo $request_id;?>" class="btn btn-block btn-primary">Accept</a></td>					
					                        <td><a href="issue-request.php?delete_id=<?php echo $request_id;?>" class="btn btn-block btn-danger">Reject</a></td>
                                            
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