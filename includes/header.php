<header class="relative" id="sc1">
        <!-- Header-background-markup -->
        <div class="overlay-bg relative">
            <img src="images/slide/slide1.jpg" alt="">
        </div>
        <!-- Mainmenu-markup-start -->
        <div class="mainmenu-area navbar-fixed-top" data-spy="affix" data-offset-top="10">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <div class="space-10"></div>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--Logo-->
                        <a href="#sc1" class="navbar-left show"><img src="media/logo.png" alt="library"></a>
                        <div class="space-10"></div>
                    </div>
                    <!--Toggle-button-->

                    <!--Active User-->
                    <?php
                    
                    session_start();
                    include('includes/db.php');
                    
                    if(isset($_SESSION['student_id']) && !empty($_SESSION['student_id']))
                       {
                        
                        ?>
                    <div class="nav navbar-right">
                        <div class="active-user navbar-left active">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="media/student_images/<?php echo htmlentities($_SESSION['image']);?>" class="img-circle img-thumbnail" alt="library" />
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="student-dashboard/index.php"> <span><i class="icofont icofont-user"></i></span>Dashboard</a>
                                        </li>
                                        
                                        
                                        <li>
                                            <a href="logout.php"> <span><i class="icofont icofont-logout"></i></span>Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    }
                    else if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])){
                        
                        ?>
                    <div class="nav navbar-right">
                        <div class="active-user navbar-left active">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="media/admin.png" class="img-circle img-thumbnail" alt="library" />
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="admin/index.php"> <span><i class="icofont icofont-user"></i></span>Dashboard</a>
                                        </li>
                                        
                                        
                                        <li>
                                            <a href="logout.php"> <span><i class="icofont icofont-logout"></i></span>Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    }
                       ?>
                    
                    <!--Mainmenu list-->
                    <div class="navbar-right in fade" id="mainmenu">
                        <ul class="nav navbar-nav nav-white text-uppercase">
                            <li class="<?php if($index==1){echo "active";}?>">
                                <a href="./index.php">Home</a>
                            </li>
                              
                            <li>
                                <a href="index.php#sc2">About Us</a>
                            </li>
                            <li class="<?php if($books==1){echo "active";}?>">
                                <a href="books.php">Books</a>
                            </li>
                             
                            <li>
                                <a href="index.php#sc3">Popular Books</a>
                            </li>
                            <li>
                                <a href="<?php if(isset($_SESSION['student_id']) && !empty($_SESSION['student_id'])){echo "student-dashboard/index.php";}
                                                  else if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])){echo "admin/index.php";} else {echo "choose-sign-in.php";}?>">Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="space-100"></div>
        <!-- Mainmenu-markup-end -->
        <!-- Header-jumbotron -->
        <div class="space-100"></div>
        <div class="header-text">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-center">
                        <div class="jumbotron">
                            <h1 class="text-white">Choose Your Book and Enjoy</h1>
                        </div>
                        <div class="title-bar white">
                            <ul class="list-inline list-unstyled">
                                <li><i class="icofont icofont-square"></i></li>
                                <li><i class="icofont icofont-square"></i></li>
                            </ul>
                        </div>
                        <div class="space-40"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-100"></div>
        <!-- Header-jumbotron-end -->
    </header>