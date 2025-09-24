<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];
  //Add USer
  if(isset($_POST['update_profile']))
    {
            $u_id= $_SESSION['u_id'];
            $u_name=$_POST['u_name'];
            $u_contact=$_POST['u_contact'];
            $u_address=$_POST['u_address'];
            $u_email=$_POST['u_email'];
           // $u_pwd=$_POST['u_pwd'];
            $u_code = $_POST['u_code'];
            $u_position=$_POST['u_position'];
            $u_depart = $_POST['u_depart'];
            $query="update db_user set u_name=?, u_contact=?, u_address=?, u_email=?, u_code=?, u_position=?, u_depart=? where u_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('sssssssi', $u_name, $u_contact, $u_address, $u_email, $u_code, $u_position, $u_depart, $u_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Profile Updated";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/head.php');?>

<body id="page-top">
 <!--Start Navigation Bar-->
  <?php include("vendor/inc/nav.php");?>
  <!--Navigation Bar-->

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("vendor/inc/sidebar.php");?>
    <!--End Sidebar-->
    <div id="content-wrapper">

      <div class="container-fluid">
      <?php if(isset($succ)) {?>
                        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Success!","<?php echo $succ;?>!","success");
                    },
                        100);
        </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Failed!","<?php echo $err;?>!","Failed");
                    },
                        100);
        </script>

        <?php } ?>

         <!-- Breadcrumbs-->
         <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="user-dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item">Profile</li>
          <li class="breadcrumb-item active">Update Profile</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
          Update Profile
        </div>
        <div class="card-body">
          <!--Add User Form-->
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
          <form method ="POST"> 
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" value="<?php echo $row->u_name;?>" required class="form-control" id="exampleInputEmail1" name="u_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" value="<?php echo $row->u_address;?>" id="exampleInputEmail1" name="u_address">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Contact</label>
                <input type="text" class="form-control" value="<?php echo $row->u_contact;?>" id="exampleInputEmail1" name="u_contact">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" value="<?php echo $row->u_email;?>" class="form-control" name="u_email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Staff Code</label>
                <input type="text" value="<?php echo $row->u_code;?>" class="form-control" name="u_code">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Position</label>
                <input type="text" class="form-control" value="<?php echo $row->u_position;?>" id="exampleInputEmail1" name="u_position">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Department</label>
                <input type="text" class="form-control" value="<?php echo $row->u_depart;?>" id="exampleInputEmail1" name="u_depart">
            </div>
            <div class="form-group" style="display:none">
                <label for="exampleInputEmail1">Category</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="User" name="u_category">
            </div>

            <button type="submit" name="update_profile" class="btn btn-outline-success">Update Profile </button>
          </form>
          <!-- End Form-->
        <?php }?>
        </div>
      </div>
       
      <hr>
     

      <!-- Sticky Footer -->
      <?php include("vendor/inc/footer.php");?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="admin-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>
 <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>
