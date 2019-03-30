<?php 

include 'includes/session.php';
$dashboard=+1;

?>
    <?php
			if(isset($_GET['delete_id'])){
				$delete_id=$_GET['delete_id'];
                    $delete_query="DELETE FROM `issue_request` WHERE `issue_request`.`request_id` = $delete_id";
				if(mysqli_query($conn,$delete_query)){
                    $_SESSION['delmsg']="Canceled request";   
                }
                else
                $_SESSION['delmsg']="Failed to Canceled request";
				
			}
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
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Issued Book</strong></h2>
                    </div>                    
                    <div class="body">
    
				<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Book Name</th>
					<th>Issue Date</th>
					<th>Return Date</th>
					<th>Over Days</th>
					<th>Fine</th>
				</tr>
			</thead>
			<tbody>
			<?php
        $query="SELECT books.book_name,book_issue.issue_date from book_issue join books on books.book_id=book_issue.book_id WHERE book_issue.student_id=$session_student_id AND book_issue.return_status=0 ";
	$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){					
					$book_name=$row['book_name'];
					$issue_date=$row['issue_date'];
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
			
			
				<tr>
					<td><?php echo $book_name;?></td>										
					<td><?php echo $issue_date;?></td>										
					<td><?php echo date("Y-m-d", strtotime ($issue_date ."+7 days"));?></td>										
					<td><?php echo $over_day;?></td>										
					<td><?php echo $per_day_fine;?></td>										
				</tr>
				
			
                   <?php
                            }
                        }
                        else
                        {
                        ?>
                        <p>You Haven't any issued book</p>
                        <?php
                        }
                        ?>
                        </tbody>
			</table>
                    </div>                    
                </div>
                
                <div class="card">
                    <div class="header">
                        <h2><strong>My Issue Request</strong></h2> <br>
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
                    <div class="body">
    
    <div class="table-responsive">
        
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>Request Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$cnt=1;                              
$sql = "SELECT student.name,student.id,books.book_name,books.isbn,issue_request.request_date,issue_request.request_id from issue_request join student on student.id=issue_request.student_id join books on books.book_id=issue_request.book_id WHERE issue_request.student_id=$session_student_id order by issue_request.request_id desc";
$run=mysqli_query($conn,$sql);               
                
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$request_id=$row['request_id'];
								$book_name=$row['book_name'];
								$request_date=$row['request_date'];
								
                                
    ?>                                       
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($book_name);?></td>
                                            <td class="center"><?php echo htmlentities($request_date);?></td>					
					                        <td><a href="index.php?delete_id=<?php echo $request_id;?>" class="btn btn-block btn-danger" onclick="return confirm('Are you sure to cancel this request?');">Cancel</a></td>
                                            
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
    </div>
                    </div>                    
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Issue History</strong></h2>
                    </div>                    
                    <div class="body">
    
				<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Book Name</th>
					<th>Issue Date</th>
					<th>Return Date</th>
					<th>Fine</th>
				</tr>
			</thead>
                    
			<tbody>
			<?php
        $query="SELECT books.book_name,book_issue.issue_date,book_issue.return_date,book_issue.fine from book_issue join books on books.book_id=book_issue.book_id WHERE book_issue.student_id=$session_student_id AND book_issue.return_status=1 ";
	$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){					
					$book_name=$row['book_name'];
					$issue_date=$row['issue_date'];
					$return_date=$row['return_date'];
					$fine=$row['fine'];
                                ?>
			
			
				<tr>
					<td><?php echo $book_name;?></td>										
					<td><?php echo $issue_date;?></td>										
					<td><?php echo $return_date;?></td>										
					<td><?php echo $fine;?></td>										
				</tr>
				
			
                   <?php
                            }
                        }
                        else
                        {
                        ?>
                        <p>No record found</p>
                        <?php
                        }
                        ?>
                        </tbody>
			</table>
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