
<aside id="leftsidebar" class="sidebar">
    
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="#"><img src="../media/admin.png" alt="User"></a></div>
                            <div class="detail">
                                <h4><?php echo $_SESSION['username'];?></h4>
                                <small>Admin Panel</small>
                            </div>
                        </div>
                    </li>
                    <li class="header">MAIN</li>
                    <li class="<?php if($dashboard==1){echo "active";}?>"><a href="index.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    <li class="<?php if($category==1){echo "active open";}?>"><a href="javascript:void(0);" class="menu-toggle"><i class="material-icons">border_all</i><span>Category</span> </a>
                        <ul class="ml-menu">
                            <li class="<?php if($add_category==1){echo "active";}?>"><a href="add-category.php"><i class="material-icons">add_to_photos</i><span>Add Category</span> </a></li>
                            <li class="<?php if($all_category==1){echo "active";}?>"><a href="all-category.php"><i class="material-icons">select_all</i><span>All Category</span> </a></li>
                        </ul>
                    </li>
                    
                    <li class="<?php if($author==1){echo "active open";}?>"><a href="javascript:void(0);" class="menu-toggle"><i class="material-icons">person_pin</i><span>Author</span> </a>
                        <ul class="ml-menu">
                            <li class="<?php if($add_author==1){echo "active";}?>"><a href="add-author.php"><i class="material-icons">add_to_photos</i><span>Add Author</span> </a></li>              
                            <li class="<?php if($all_author==1){echo "active";}?>"><a href="all-author.php"><i class="material-icons">select_all</i><span>All Author</span> </a></li>
                        </ul>
                    </li>
                    
                    <li class="<?php if($books==1){echo "active open";}?>"><a href="javascript:void(0);" class="menu-toggle"><i class="material-icons">library_books</i><span>Books</span> </a>
                        <ul class="ml-menu">
                            <li class="<?php if($add_book==1){echo "active";}?>"><a href="add-book.php"><i class="material-icons">add_to_photos</i><span>Add Book</span> </a></li>                   
                            <li class="<?php if($all_book==1){echo "active";}?>"><a href="all-book.php"><i class="material-icons">select_all</i><span>All Books</span> </a></li> 
                        </ul>
                    </li>
                    <li class="<?php if($registered_students==1){echo "active";}?>"><a href="registered-students.php"><i class="material-icons">group</i><span>Registered Student</span> </a></li>         
                       <li class="<?php if($issue_book==1){echo "active open";}?>"><a href="javascript:void(0);" class="menu-toggle"><i class="material-icons">book</i><span>Issue Books</span> </a>
                        <ul class="ml-menu">
                            <li class="<?php if($issue_new_book==1){echo "active";}?>"><a href="issue-new-book.php"><i class="material-icons">add_to_photos</i><span>Issue New Book</span> </a></li>                   
                            <li class="<?php if($issue_request==1){echo "active";}?>"><a href="issue-request.php"><i class="material-icons">add_to_photos</i><span>Issue Request</span> </a></li>                   
                            <li class="<?php if($issue_book_details==1){echo "active";}?>"><a href="issue-book-details.php"><i class="material-icons">select_all</i><span>Issue Books Details</span> </a></li> 
                        </ul>
                    </li>
                    <li class="<?php if($change_password==1){echo "active";}?>"><a href="change-password.php"><i class="material-icons">enhanced_encryption</i><span>Change Password</span> </a></li>
                    <li class="<?php if($display_contents==1){echo "active";}?>"><a href="display-contents.php"><i class="material-icons">airplay</i><span>Edit Display Contents</span> </a></li>
                                     
                                        
                      
                     
                      
                    
                                     
                    
                </ul>
            </div>
        </div>
    </div>    
</aside>