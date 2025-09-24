<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];
  //Add Booking
  if(isset($_POST['delete_booking']))
    {
            $u_id = $_SESSION['u_id'];
            //$u_name=$_POST['u_name'];
            //$u_contact=$_POST['u_contact'];
            //$u_address=$_POST['u_address'];
            $u_keyname = $_POST['u_keyname'];
            $u_key_category = $_POST['u_key_category'];
            $u_year = $_POST['u_year'];
            $u_key_applydate = $_POST['u_key_applydate'];
            $u_key_status = $_POST['u_key_status'];
            $query="update db_user set u_keyname=?,u_key_category=?,u_year=?, u_key_applydate=?, u_key_status=? where u_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('sssssi',  $u_keyname, $u_key_category, $u_year, $u_key_applydate, $u_key_status, $u_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Application Cancelled";
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
          <li class="breadcrumb-item">Booking</li>
          <li class="breadcrumb-item ">Cancel Application</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
          Cancel Application
        </div>
        <div class="card-body">
          <!--Add User Form-->
          <?php
            $aid=$_GET['u_id'];
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
                <input type="text" readonly value="<?php echo $row->u_name;?>" required class="form-control" id="exampleInputEmail1" name="u_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Contact</label>
                <input type="text" readonly  class="form-control" value="<?php echo $row->u_contact;?>" id="exampleInputEmail1" name="u_contact">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Department</label>
                <input type="text" readonly class="form-control" value="<?php echo $row->u_depart;?>" id="exampleInputEmail1" name="u_depart">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Plate</label>
                <input type="text" readonly class="form-control" value="<?php echo $row->u_keyname;?>" id="exampleInputEmail1" name="u_keyname">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Model</label>
                <input type="text" readonly class="form-control" value="<?php echo $row->u_key_category;?>" id="exampleInputEmail1" name="u_key_category">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Year</label>
                <input type="text" readonly class="form-control" value="<?php echo $row->u_year;?>" id="exampleInputEmail1" name="u_year">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Pickup Date</label>
                <input type="text" readonly placeholder="<?php echo $row->u_key_applydate;?>" class="form-control" name="u_key_applydate">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <input type="text" readonly placeholder="<?php echo $row->u_key_status;?>" class="form-control" id="exampleInputEmail1"  name="u_key_status">
            </div>

            <button type="submit" name="delete_booking" class="btn btn-danger">Cancel Application</button>
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
          <a class="btn btn-danger" href="user-logout.php">Logout</a>
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
