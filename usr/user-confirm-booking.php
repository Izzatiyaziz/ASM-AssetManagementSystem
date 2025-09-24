<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];
  //Add Booking
  if(isset($_POST['book_assets']))
    {
            $u_id = $_SESSION['u_id'];
            //$u_name=$_POST['u_name'];
            //$u_contact=$_POST['u_contact'];
            //$u_address=$_POST['u_address'];
            $u_keyname = $_POST['u_keyname'];
            $u_key_category = $_POST['u_key_category'];
            $u_year = $_POST['u_year'];
            $u_purpose = $_POST['u_purpose'];
            $u_key_applydate = $_POST['u_key_applydate'];
            $u_license = $_FILES['u_license']['name'];
            move_uploaded_file($_FILES["u_license"]["tmp_name"],"../vendor/img/".$_FILES["u_license"]["name"]);
            $u_key_status  = $_POST['u_key_status'];
            $query="update db_user set u_keyname=?, u_purpose=?, u_key_category=?, u_year=?,u_key_applydate=?, u_license=?, u_key_status=? where u_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('sssssssi', $u_keyname, $u_purpose, $u_key_category, $u_year, $u_key_applydate, $u_license, $u_key_status, $u_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Application Submitted";
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
          <li class="breadcrumb-item">Application</li>
          <li class="breadcrumb-item ">Book Assets</li>
          <li class="breadcrumb-item active">Confirm Application</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
          Confirm Application
        </div>
        <div class="card-body">
          <!--Add Asset Form-->
          <?php
            $aid=$_GET['k_id'];
            $ret="select * from db_key where k_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
        {
        ?>
          <form method ="POST" enctype="multipart/form-data"> 
          <div class="form-group">
                <label for="exampleInputEmail1">Plate</label>
                <input type="text" value="<?php echo $row->k_keyname;?>" readonly class="form-control" name="u_keyname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Model</label>
                <input type="text" value="<?php echo $row->k_category;?>" readonly class="form-control" name="u_key_category">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Year</label>
                <input type="text" value="<?php echo $row->k_year;?>" readonly class="form-control" name="u_year">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Purpose Application</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="u_purpose">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Pickup Date</label>
                <input type="date" class="form-control" id="exampleInputEmail1"  name="u_key_applydate">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Photo of driving license :</label><br>
                <input type="file"  id="exampleInputEmail1" name="u_license">
            </div>
                <button type="submit" name="book_assets" class="btn btn-success">Confirm Booking</button>
             
            <div class="form-group" style="display:none">
                <label for="exampleInputEmail1">Application Status</label>
                <input type="text" value="Pending" class="form-control" id="exampleInputEmail1"  name="u_key_status">
            </div>
            </div>
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
