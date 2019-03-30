<?php 

include 'includes/session.php';
$add_book=+1;
$books=+1;
?>
    <?php include 'includes/head.php';?>
    
    <!---add category-->
    <?php

if(isset($_POST['add']))
{
$book_name=$_POST['book_name'];
$author_id=$_POST['author_id'];
$category_id=$_POST['category_id'];
$isbn=$_POST['isbn'];
$description=$_POST['description'];
$book_img=$_FILES['book_img']['name'];
$book_img_tmp=$_FILES['book_img']['tmp_name'];
    
$sql = "INSERT INTO books (book_name,author_id,category_id,isbn,description,book_img)
					VALUES ('$book_name','$author_id','$category_id','$isbn','$description','$book_img')";
if (mysqli_query($conn, $sql)) {
						$path="../media/book_images/$book_img";
						if(move_uploaded_file($book_img_tmp,$path)){
							copy($path,"$path");
                            header('location:all-book.php?add_msg=New Book Added!');
						}
					}
                else
                    die("Connection failed: " . $conn->connect_error);
                
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
                <h2>Add Book
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Add New Book</strong></h2>
                    </div>                    
                    <div class="body">
                    
                   
                        
<form role="form" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Book Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="book_name" onkeyup="lettersOnly(this)" autocomplete="off"  required />
</div>

<div class="form-group">
<label> Category<span style="color:red;">*</span></label>
<select class="form-control" name="category_id" required="required">
<option value=""> Select Category</option>
<?php 
$status=1;
$sql = "SELECT * from category where status=$status";
$run=mysqli_query($conn,$sql);
    if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$category_id=$row['category_id'];
								$category_name=$row['category_name'];
    ?>  
<option value="<?php echo htmlentities($category_id);?>"><?php echo htmlentities($category_name);?></option>
 <?php }} ?> 
</select>
</div>


<div class="form-group">
<label> Author<span style="color:red;">*</span></label>
<select class="form-control" name="author_id" required="required">
<option value=""> Select Author</option>
<?php 

$sql = "SELECT * from  author ";
$run=mysqli_query($conn,$sql);
    if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$author_id=$row['author_id'];
								$author_name=$row['author_name'];
    ?>  
<option value="<?php echo htmlentities($author_id);?>"><?php echo htmlentities($author_name);?></option>
 <?php }} ?> 
</select>
</div>

<div class="form-group">
<label>ISBN Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="isbn"  required="required" autocomplete="off"  />
<p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
</div>
 
 <div class="form-group">
<label>Description<span style="color:red;">*</span></label><br>
<textarea name="description" id="" cols="100" rows="5"></textarea>
</div>

 <div class="form-group">
 <label>Book Image<span style="color:red;">*</span></label>
 <input  type="file" name="book_img" />
 </div>
<button type="submit" name="add" class="btn btn-info">Add</button>

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