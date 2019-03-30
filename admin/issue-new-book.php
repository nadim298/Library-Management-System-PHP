<?php 

include 'includes/session.php';
$issue_new_book=+1;
$issue_book=+1;
?>
    <?php include 'includes/head.php';?>
    
    <!---add category-->
    <?php

if(isset($_POST['issue']))
{
$book_id=$_POST['book_id'];
$student_id=$_POST['student_id'];
    
$sql = "INSERT INTO book_issue (book_id,student_id)
					VALUES ('$book_id','$student_id')";
if (mysqli_query($conn, $sql)) {
    if(isset($_GET['request_id'])){
        $delete_id=$_GET['request_id'];
                    $delete_query="DELETE FROM `issue_request` WHERE `issue_request`.`request_id` = $delete_id";
				mysqli_query($conn,$delete_query);
    }
                            $_SESSION['msg']="Successfully Issued!";
                            header('location:issue-book-details.php');
    
						}
					
                else
                    $_SESSION['error']="Successfully Issued!";
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
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Book Issue
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Add New Issue</strong></h2>
                    </div>                    
                    <div class="body">
                    
<form role="form" method="post">

    <div class="form-group">
        <label>Student id<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="student_id" id="studentid" onBlur="getstudent()" autocomplete="off" value="<?php if(isset($_GET['student_id'])){echo $_GET['student_id'];}?>" required />
    </div>

    <div class="form-group">
        <span id="get_student_name" style="font-size:16px;"></span> 
    </div>





    <div class="form-group">
        <label>ISBN Number or Book Title<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="isbn" id="isbn" onBlur="getbook()" value="<?php if(isset($_GET['isbn'])){echo $_GET['isbn'];}?>" required="required" />
    </div>

     <div class="form-group">

        <select  class="form-control" name="book_id" id="get_book_name" readonly>

        </select>
     </div>
    <button type="submit" name="issue" id="submit" class="btn btn-info">Issue Book </button>

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
<script>
// function for get student name
function getstudent() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_student.php",
data:'studentid='+$("#studentid").val(),
type: "POST",
success:function(data){
$("#get_student_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

//function for book details
function getbook() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_book.php",
data:'isbn='+$("#isbn").val(),
type: "POST",
success:function(data){
$("#get_book_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script> 