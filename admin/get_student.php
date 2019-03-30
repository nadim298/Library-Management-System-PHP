<?php 
require_once("includes/db.php");
if(!empty($_POST["studentid"])) {
  $studentid= strtoupper($_POST["studentid"]);
 
    $sql ="SELECT name,status FROM student WHERE id=$studentid";

$run=mysqli_query($conn,$sql);               
                
if(mysqli_num_rows($run)>0){
while($row=mysqli_fetch_array($run)){
    $name=$row['name'];
    $status=$row['status'];
if($status==0)
{
echo "<span style='color:red'> Student ID Blocked </span>"."<br />";
echo "<b>Student Name-</b>" .$name;
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else {
?>


<?php  
echo htmlentities($name);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
 else{
  
  echo "<span style='color:red'> Invaid Student Id. Please Enter Valid Student id .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
