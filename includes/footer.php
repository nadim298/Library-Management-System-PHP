<?php
                $query="SELECT * FROM display_content where id=1";
						$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$fb=$row['fb'];
								$twitter=$row['twitter'];
								$linkedin=$row['linkedin'];
								$address=$row['address'];
								$email=$row['email'];
								$mobile=$row['mobile'];
                            }
                        }
                ?>
    <footer class="black-bg text-white">
        <div class="space-60"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="#"><img src="media/logo.png" alt="library"></a>
                    <div class="space-20"></div>
                    
                    <div class="space-10"></div>
                    <ul class="list-inline list-unstyled social-list">
                        <li><a href="<?php echo "$fb";?>"><i class="icofont icofont-social-facebook"></i></a></li>
                        <li><a href="<?php echo "$twitter";?>"><i class="icofont icofont-social-twitter"></i></a></li>
                        <li><a href="<?php echo "$linkedin";?>"><i class="icofont icofont-brand-linkedin"></i></a></li>
                    </ul>
                    <div class="space-10"></div>
                    <ul class="list-unstyled list-inline tip yellow">
                        <li><i class="icofont icofont-square"></i></li>
                        <li><i class="icofont icofont-square"></i></li>
                        <li><i class="icofont icofont-square"></i></li>
                    </ul>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <h4 class="text-white">Contact Us</h4>
                    <div class="space-20"></div>
                    <table class="table border-none addr-dt">
                        <tr>
                            <td><i class="icofont icofont-social-google-map"></i></td>
                            <td><address><?php echo "$address";?></address></td>
                        </tr>
                        <tr>
                            <td><i class="icofont icofont-email"></i></td>
                            <td><?php echo "$email";?></td>
                        </tr>
                        <tr>
                            <td><i class="icofont icofont-phone"></i></td>
                            <td><?php echo "$mobile";?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="space-30"></div>
    </footer>