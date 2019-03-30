<?php
	require_once('db.php');
	ob_start();
	session_start();
	if(!isset($_SESSION['admin_id'])){
		header("location:../sign-in.php");
	}
else
{
    $session_admin_id=$_SESSION['admin_id'];
	$query="SELECT * FROM admin WHERE id='$session_admin_id'";
	$run=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($run);
					$_SESSION['id']=$row['id'];
					$_SESSION['username']=$row['username'];
}

$dashboard=0;
$add_author=0;
$add_book=0;
$add_category=0;
$all_author=0;
$all_book=0;
$all_category=0;
$change_password=0;
$edit_author=0;
$edit_book=0;
$edit_category=0;
$issue_book_details=0;
$issue_new_book=0;
$issue_request=0;
$registered_students=0;
$display_contents=0;

$category=0;
$author=0;
$books=0;
$issue_book=0;
					

?>