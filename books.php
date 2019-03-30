<!--for pagination-->
<?php
$books=+1;
include 'includes/db.php';
	$num_of_post=4;
	if(isset($_GET['page'])){
		$page_id=$_GET['page'];
	}
	else{
		$page_id=1;
	}

    $all_post_query="SELECT * FROM books";
     if(isset($_GET['category']))
    {
        $category_id=$_GET['category'];
        $all_post_query="SELECT * FROM books WHERE category_id=$category_id";
    }
    if(isset($_GET['search_text']))
	{
        $search_text=$_GET['search_text'];
        $all_post_query="SELECT * FROM books WHERE book_name like '%$search_text%'";
    }
						
        

    $all_post_run=mysqli_query($conn,$all_post_query);
	$all_post=mysqli_num_rows($all_post_run);
	$total_page=ceil($all_post/$num_of_post);
	
	$post_start_from=($page_id-1)*$num_of_post;
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
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->



    <?php include 'includes/header.php';?>
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
                    <div class="row">
                        <div class="pull-left col-xs-12 col-sm-5 col-md-6">
                            <p>Result For <a href="#" class="text-primary">"How To Be a Designer"</a></p>
                            <p><strong><?php echo "$all_post"?></strong> Book Found</p>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="space-20"></div>
                    <div class="row">
					<?php
					include 'includes/db.php';
                        $query="SELECT books.book_id,books.book_name,category.category_name,author.author_name,books.book_img from books join category on category.category_id=books.category_id join author on author.author_id=books.author_id order by book_id desc limit $post_start_from,$num_of_post";
                        
                        if(isset($_GET['category']))
						{
							$category_id=$_GET['category'];
							$query="SELECT books.book_id,books.book_name,category.category_name,author.author_name,books.book_img from books join category on category.category_id=books.category_id join author on author.author_id=books.author_id WHERE books.category_id=$category_id order by book_id desc limit $post_start_from,$num_of_post";
						}
                        if(isset($_GET['search_text']))
						{
							$search_text=$_GET['search_text'];
                            $query="SELECT books.book_id,books.book_name,category.category_name,author.author_name,books.book_img from books join category on category.category_id=books.category_id join author on author.author_id=books.author_id WHERE books.book_name like '%$search_text%' order by book_id desc limit $post_start_from,$num_of_post";
							
						}
						
                                                    
                        
                        
						$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$db_id=$row['book_id'];
								$db_name=$row['book_name'];
								$db_author=$row['author_name'];
								$db_photo=$row['book_img'];
							
					?>
                        <div class="col-xs-12 col-md-6">
                            <div class="category-item well yellow">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="<?php echo 'media/book_images/'.$db_photo?>" class="media-object book-img" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h5><?php echo $db_name?></h5>
                                        <h6><?php echo $db_author?></h6>
                                        <div class="space-10"></div>
                                        <div class="space-10"></div>
                                        <p> </p>
                                        <a href="single_book.php?book_id=<?php echo $db_id;?>" class="text-primary">See the Book</a>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
							}
						}
						?>
                      
                        
                    </div>
                    <div class="space-60"></div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="shop-pagination pull-right">
                                <ul  class="pagination-sm pagination">
                                    <?php
								        for($i=1;$i<=$total_page;$i++){
									   echo "<li class='".($page_id==$i?'active':'')."'><a href='books.php?page=".$i."&".(isset($category_id)?"category=$category_id":"")."&".(isset($search_text)?"search_text=$search_text":"")."'>$i</a></li>";
								    }
							     ?>
                                </ul>
                            </div>
                        </div>
                    </div>
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