<?php 
require_once("includes/db.php");
if(!empty($_POST["isbn"])) {
  $isbn=$_POST["isbn"];
 
$sql ="SELECT book_name,book_id FROM books WHERE isbn=$isbn";
$run=mysqli_query($conn,$sql);
if(mysqli_num_rows($run)>0){
while($row=mysqli_fetch_array($run)){
    $book_id=$row['book_id'];
    $book_name=$row['book_name'];
?>
    
<option value="<?php echo htmlentities($book_id);?>"><?php echo htmlentities($book_name);?></option>
<b>Book Name :</b> 
<?php  
echo htmlentities($book_name);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
 else{?>
  
<option class="others"> Invalid ISBN Number</option>
<?php
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
