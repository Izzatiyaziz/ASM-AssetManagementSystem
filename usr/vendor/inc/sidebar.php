<?php
            $aid=$_SESSION['u_id'];
            $ret="select * from db_user where u_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
        {
        ?>
            <ul class="sidebar navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="user-dashboard.php">
                      <i class="fas fa-fw fa-home"></i>
                      <span>Dashboard</span>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-fw fa-user"></i>
                      <span>My Profile</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                      <h6 class="dropdown-header"><?php echo $row->u_name;?></h6>
                      <a class="dropdown-item" href="user-view-profile.php">View</a>
                      <a class="dropdown-item" href="user-update-profile.php">Update</a>
                      <a class="dropdown-item" href="user-change-pwd.php">Change Password</a>

                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-fw fa-id-card"></i>
                      <span>Application</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                      <h6 class="dropdown-header">Available Assets:</h6>
                      <a class="dropdown-item" href="usr-book-assets.php">Application</a>
                      <a class="dropdown-item" href="user-cancel-booking.php">Cancel Application</a>
                      <a class="dropdown-item" href="user-view-status.php">Status Application</a>
                    </div>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="user-loan.php">
                      <i class="fas fa-fw fa-key"></i>
                      <span> Pickup</span>
                    </a>
                  </li>
                
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-fw fa-undo"></i>
                      <span>Return</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                      <h6 class="dropdown-header">Return Asset:</h6>
                      <a class="dropdown-item" href="user-return.php">Returned</a>
                      <a class="dropdown-item" href="user-view-return.php">View Returned</a>
                    </div>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="user-give-feedback.php">
                      <i class="fas fa-fw fa-comments"></i>
                      <span>Report</span></a>
                  </li>
                  
                </ul>
<?php }?>