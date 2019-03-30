<?php
	require_once('db.php');
	ob_start();
	session_start();
	if(!isset($_SESSION['student_id'])){
		header("location:../sign-in.php");
	}
else{
    $session_student_id=$_SESSION['student_id'];
	$query="SELECT * FROM student WHERE id='$session_student_id'";
	$run=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($run);
					$_SESSION['name']=$row['name'];
					$_SESSION['image']=$row['image'];
					$_SESSION['email']=$row['email'];
					$_SESSION['mobile']=$row['mobile'];
					$_SESSION['registration_date']=$row['registration_date'];
}
	$dashboard=0;
    $profile=0;
    $change_password=0;

?>