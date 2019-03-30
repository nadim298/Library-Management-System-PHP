
<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard"><i class="zmdi zmdi-home"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user">Student-Panel</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                   
                    <li>
                       
                        <div class="user-info">
                            <div><a href="profile.html"><img style="height:200px; width:200px;" src="../media/student_images/<?php echo htmlentities($_SESSION['image']);?>" alt="User"></a></div>
                            <br>
                            <div class="detail">
                                <h4><?php echo $_SESSION['name'];?></h4>
                                <small>User ID: <?php echo $session_student_id;?></small>
                            </div>
                        </div>
                    </li>
                    <li class="header">MAIN</li>
                    <li class="<?php if($dashboard==1){echo "active";}?>"><a href="index.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    
                    <li class="<?php if($profile==1){echo "active";}?>"><a href="profile.php"><i class="zmdi zmdi-account"></i><span>Profile</span> </a></li>                   
                    <li class="<?php if($change_password==1){echo "active";}?>"><a href="change-password.php"><i class="material-icons">enhanced_encryption</i><span>Change Password</span> </a></li>                    
                    
                </ul>
            </div>
        </div>
    </div>    
</aside>