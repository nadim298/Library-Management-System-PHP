<!doctype html>
<html class="no-js" lang="zxx">


 
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/icofont.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/cardslider.css">
    <link rel="stylesheet" href="css/responsiveslides.css">

    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/overright.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body data-spy="scroll" data-target="#mainmenu" data-offset="50">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->



    <?php include 'includes/header.php';?>
    
<?php 
    if(isset($_POST['issue'])){
        
$book_id=$_GET['book_id'];
$student_id=$_SESSION['student_id'];
    
$sql = "INSERT INTO `issue_request` (`student_id`, `book_id`) VALUES ('$student_id', '$book_id')";
mysqli_query($conn,$sql);
    }
?>
    <section>
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 pull-right">
                    <h4>Search Box</h4>
                    <div class="space-5"></div>
                    <form action="#">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter book name" name="search_text">
                            <div class="input-group-btn">
                                <a href="books.php?search_text=search_text"><button type="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-2"></i></button></a>
                            </div>
                        </div>
                    </form>
                    <div class="space-30"></div>
                   
                    <hr>
                    <div class="space-20"></div>
                    <div class="row">
                    <?php
					include 'includes/db.php';
							$book_id=$_GET['book_id'];
                        $query="SELECT books.book_id,books.book_name,books.description,category.category_name,category.category_id,author.author_name,books.book_img from books join category on category.category_id=books.category_id join author on author.author_id=books.author_id WHERE books.book_id=$book_id";                        
                        
                        
						$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$db_id=$row['book_id'];
								$db_name=$row['book_name'];
								$db_description=$row['description'];
								$db_author=$row['author_name'];
								$db_photo=$row['book_img'];
								$db_category_id=$row['category_id'];
								$db_category_name=$row['category_name'];
                                
							
					?>
                        <div class="col-xs-12 col-md-12">
                            <div class="category-item well yellow">
                                <div class="media">
                                
                                    <div class="media-left col-md-4">
                                        <img src="<?php echo 'media/book_images/'.$db_photo;?>" class="media-object book-img" alt="">
                                    </div>
                                    <div class="media-left col-md-4">
                                    <div class="media-body">
                                       <div class="space-20"></div>
                                        <h3 class="text-danger"><?php echo $db_name;?></h3>
                                        <h5><?php echo $db_author;?></h5>
                                        
                                        <?php
                                            if(isset($_SESSION['student_id'])&& !empty($_SESSION['student_id'])){
                                                echo '<form method="post"><button type="submit" name="issue" class="btn btn-success" onclick="return confirm(\'Are you sure to issue this book?\')">Issue</button></form>';
                                            }
                                                else                                                
                                                    echo '<button type="submit" name="issue" class="btn btn-success" onclick="return confirm(\'Sorry!\nSign In to your accout first.\')">Issue</button>';
                                        ?>
                                    </div>
                                    </div>
                                    <div class="media-left col-md-4">
                                    <div class="media-body">
                                        <center><h4 class="bg-primary"> <u>Description</u> </h4></center>
                                        
                                        <div class="space-10"></div>
                                        <div class="space-10"></div>
                                        <p><?php echo $db_description;?> </p>
                                        
                                    </div>
                                </div>
                            
                        </div>
                        </div>
                        </div>
                        <?php
                        }
                                }
                        ?>
                    </div>
                      
                        
                    
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="category-item well yellow">
                                <div class="media">
                                  <div class="row"><center><h3>Related Books</h3></center></div><hr>
                                   <div class="space-20"></div>
                                   <div class="row">
                                   <?php
                                        include 'includes/db.php';
                                       $count=0;
                                            $query="SELECT books.book_id,books.book_name,author.author_name,books.book_img from books join author on author.author_id=books.author_id WHERE books.category_id=$db_category_id";

                                            $run=mysqli_query($conn,$query);
                                            if(mysqli_num_rows($run)>0){
                                                while($row=mysqli_fetch_array($run) and $count<4){
                                                    $book_id=$row['book_id'];
                                                    $book_name=$row['book_name'];
                                                    $author_name=$row['author_name'];
                                                    $book_img=$row['book_img'];
                                                    

                                    ?>
                                    
                                        <div class="media-left col-md-3">
                                      <div class="media-left col-md-6">
                                       
                                        <img src="<?php echo 'media/book_images/'.$book_img;?>" alt="" class="img-thumbnail">
                                        </div>
                                        <div class="media-left col-md-6">
                                        <h4> <u><?php echo $book_name;?></u> </h4>
                                        <h6><?php echo $author_name;?></h6>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        $count++;
                                                }
                                            }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        
                    </div>
                    <div class="space-60"></div>
                   
                </div>
                <!-- Sidebar-Start -->
                <div class="col-xs-12 col-md-2">
                    <aside>
                        <h3><i class="icofont icofont-filter"></i> Filter By</h3>
                        <div class="space-30"></div>
                        <div class="sigle-sidebar">
                            <h4>Category</h4>
                            <hr>
                            <ul class="list-unstyled menu-tip">
							<?php
								include 'includes/db.php';
						$query="SELECT * FROM category";
						$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$db_id=$row['category_id'];
								$db_name=$row['category_name'];
							?>
                                <li><a href="books.php?category=<?php echo $db_id;?>"><?php echo "$db_name"?></a></li>
                                <?php
									}
								}
								?>
                            </ul>
                            <a href="books.php" class="btn btn-primary btn-xs">See All</a>
                        </div>
                        <div class="space-20"></div>
                        
                    </aside>
                </div>
                <!-- Sidebar-End -->
            </div>
        </div>
        <div class="space-80"></div>
    </section>
    <!-- Footer-Area -->
<?php include 'includes/footer.php';?>
    <!-- Footer-Area-End -->

    <!-- Vandor-JS -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <!-- Plugin-JS -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    <script src="js/jquery.cardslider.min.js"></script>
    <script src="js/pagination.js"></script>
    <script src="js/scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/plugins.js"></script>
    <!-- Active-JS -->
    <script src="js/main.js"></script>

</body>


 
</html>