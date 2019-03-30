<?php
$index=+1;
?>
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
    



    <?php include 'includes/header.php';?>
    <?php
    if(isset($_POST['comment']))
{
$comment_text=$_POST['comment_text'];
$student_id=$_SESSION['student_id'];
$sql = "INSERT INTO `user_comments` (`student_id`, `comment`) VALUES ('$student_id', '$comment_text')";
if(mysqli_query($conn,$sql)){
    echo '<script language="javascript">';
echo 'alert("Your Comment Successfully Sent")';
echo '</script>';
}
}
    ?>
    <section class="gray-bg" id="sc2">
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                    <h2>About <strong>Us</strong></h2>
                    
                    <div class="title-bar blue">
                        <ul class="list-inline list-unstyled">
                            <li><i class="icofont icofont-square"></i></li>
                            <li><i class="icofont icofont-square"></i></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
           
            <div style="text-align:center" >
                <div class="col-xs-12 col-md-12">
                    
                    <div class="space-15"></div>
                    <div class="space-15"></div>
                    <p> </p>
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 wow fadeIn">
                            <ul class="list-unstyled list-inline icon-bar">
                                <li><i class="icofont icofont-id-card"></i></li>
                            </ul>
                            <h3>Issue Books</h3>
                            <p> 
                            </p>
                            <div class="space-30"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 wow fadeIn">
                            <ul class="list-unstyled list-inline icon-bar">
                                <li><i class="icofont icofont-medal-alt"></i></li>
                            </ul>
                            <h3>High Quality Books</h3>
                            <p> 
                            </p>
                            <div class="space-30"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 wow fadeIn">
                            <ul class="list-unstyled list-inline icon-bar">
                                <li><i class="icofont icofont-read-book-alt"></i></li>
                            </ul>
                            <h3>Free All Books</h3>
                            <p> 
                            </p>
                            <div class="space-30"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 wow fadeIn">
                            <ul class="list-unstyled list-inline icon-bar">
                                <li><i class="icofont icofont-book-alt"></i></li>
                            </ul>
                            <h3>Up To Date Books</h3>
                            <p> 
                            </p>
                            <div class="space-30"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-60"></div>
    </section>
    <section class="relative fix" id="sc3">
        <div class="overlay-bg blue">
            <img src="images/blur-bg.jpg" alt="library">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-6 book-list-position padding60  ">
                    <div class="book-list-photo">
                        <div class="book-list">
                           <?php
                            include 'includes/db.php';
                        $img_query="SELECT books.book_img from books order by books.view desc";
                            $run=mysqli_query($conn,$img_query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$db_photo=$row['book_img'];
                            ?>
                            <div class="book_item">
                                <img src="<?php echo 'media/book_images/'.$db_photo?>" alt="library">
                            </div>
                            <?php
							}
						}
						?>
                        </div>
                    </div>
                    <div class="bookslide_nav">
                        <i class="icofont icofont-long-arrow-left testi_prev"></i>
                        <i class="icofont icofont-long-arrow-right testi_next"></i>
                    </div>
                </div>
                <div class="col-xs-12 pull-right col-md-6 padding60 gray-bg wow fadeInRight">
                    <div class="space-60"></div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-6">
                            <h2>Popular <strong>Books</strong></h2>
                            <div class="space-10"></div>
                            <div class="title-bar left blue">
                                <ul class="list-inline list-unstyled">
                                    <li><i class="icofont icofont-square"></i></li>
                                    <li><i class="icofont icofont-square"></i></li>
                                </ul>
                            </div>
                            <div class="space-20"></div>
                        </div>
                    </div>
                    <div class="space-20"></div>
                    <div class="book-content">
                        <div class="book-details">
                           <?php
                            include 'includes/db.php';
                        $query="SELECT books.book_id,books.book_name,books.description,category.category_id,category.category_name,author.author_name from books join category on category.category_id=books.category_id join author on author.author_id=books.author_id order by books.view desc";
                            $run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$db_id=$row['book_id'];
								$db_name=$row['book_name'];
								$db_author=$row['author_name'];
								$db_category_id=$row['category_id'];
								$db_category=$row['category_name'];
								$db_description=$row['description'];
                            ?>
                            <div class="book-details-item">
                                <h4 class="tip-left">Title</h4>
                                <p class="lead"><?php echo "$db_name";?></p>
                                <div class="space-10"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8">
                                        <h4 class="tip-left">Author</h4>
                                        <div class="media">
                                            <div class="media-body">
                                                <h5><?php echo "$db_author";?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <h4>Category</h4>
                                        <p><?php echo "$db_category";?></p>
                                    </div>
                                </div>
                                <div class="space-30"></div>
                                <h4 class="tip-left">Description</h4>
                                <p><?php echo "$db_description";?></p>
                                <div class="space-20"></div>
                                <a href="single_book.php?book_id=<?php echo $db_id;?>" class="btn btn-primary hover-btn-default">See The Book</a>
                                <a href="books.php?category=<?php echo $db_category_id;?>" class="btn btn-primary hover-btn-default">See Related Books</a>
                            </div>
                            <?php
							}
						}
						?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     
    <section class="relative" id="sc6">
        <div class="overlay-bg">
            <img src="images/say-bg.jpg" alt="library">
        </div>
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                    <h2 class="text-white">What People <strong>Say</strong></h2>
                    <div class="space-20"></div>
                    <div class="title-bar white">
                        <ul class="list-inline list-unstyled">
                            <li><i class="icofont icofont-square"></i></li>
                            <li><i class="icofont icofont-square"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row text-white testimonial-slide">
               <?php
                $query="SELECT user_comments.comment_id,user_comments.comment,user_comments.date,student.name from user_comments join student on student.id=user_comments.student_id order by user_comments.comment_id desc";
                            $run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$comment_id=$row['comment_id'];
								$comment=$row['comment'];
								$student_name=$row['name'];
								$date=$row['date'];
                            ?>
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                    <h5 class="text-white"><?php echo $student_name;?></h5>
                    <span class="show">Student</span>
                    <div class="space-30"></div>
                    <p><?php echo $comment;?></p>
                    <div class="space-30"></div>
                    <h5 class="text-white"><?php echo $date;?></h5>
                </div>
                <?php
							}
						}
						?>
            </div>
        </div>
        <div class="space-60"></div>
        <div class="space-80"></div>
    </section>
    <section class="bg-primary relative">
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7">
                    <h2 class="text-white">Your <strong>Comment</strong></h2>
                    <div class="space-20"></div>
                    <div class="title-bar left white">
                        <ul class="list-inline list-unstyled">
                            <li><i class="icofont icofont-square"></i></li>
                            <li><i class="icofont icofont-square"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row">
                <div class="col-xs-12 col-sm-7">
                    <form action="" method="post">
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea class="form-control bg-none" name="comment_text" id="" cols="200" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="space-20"></div>
                            <div class="col-xs-12 col-sm-6">
                            <?php
                                            if(isset($_SESSION['student_id'])&& !empty($_SESSION['student_id'])){
                                                echo '<button type="submit" name="comment" class="btn btn-success">Submit</button>';
                                            }
                                                else                                                
                                                    echo '<button type="submit" class="btn btn-success" onclick="return confirm(\'Sorry!\nSign In to your student accout first.\')">Submit</button>';
                                        ?>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="hidden-xs col-sm-5 outer-image wow fadeInRight">
                    <img src="images/outer-image.png" alt="library">
                </div>
            </div>
        </div>
        <div class="space-80"></div>
    </section>
    
                
<?php include 'includes/footer.php';?>
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


<!-- Mirrored from quomodosoft.com/html/library/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Nov 2018 06:13:42 GMT -->
</html>