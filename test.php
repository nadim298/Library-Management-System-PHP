<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$database = "test";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['add']))
{
$name=$_POST['name'];

$image=$_FILES['image']['name'];
    
$sql = "INSERT INTO test (name,image)
					VALUES ('$name','$image')";
if (mysqli_query($conn, $sql)) {
						echo "done";
						}
}
?>
  
<html>
    <head></head>
    <body>
        
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label>Name<span style="color:red;">*</span></label>
            <input class="form-control" type="text" name="name" autocomplete="off"  required />
            </div>



             <div class="form-group">
             <label>Book Image<span style="color:red;">*</span></label>
             <input  type="file" name="image" />
             </div>
            <button type="submit" name="add" class="btn btn-info">Add</button>
        </form>
    </body>
</html>