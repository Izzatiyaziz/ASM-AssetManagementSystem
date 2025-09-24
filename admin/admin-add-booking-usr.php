<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
  //Add Booking
  if(isset($_POST['book_assets']))
    {
            $u_id = $_GET['u_id'];
            //$u_name=$_POST['u_name'];
            //$u_contact=$_POST['u_contact'];
            //$u_address=$_POST['u_address'];
            $u_keyname = $_POST['u_keyname'];
            $u_purpose = $_POST['u_purpose'];
            $u_key_category = $_POST['u_key_category'];
            $u_year = $_POST['u_year'];
            $u_key_applydate = $_POST['u_key_applydate'];
            $u_license = $_FILES["u_license"]["name"];
            move_uploaded_file($_FILES["u_license"]["tmp_name"],"../vendor/img/".$_FILES["u_license"]["name"]);
            $u_key_status  = $_POST['u_key_status'];
            $query="update db_user set u_keyname=?, u_key_category=?, u_year=?, u_purpose=?, u_key_applydate=?, u_license=?, u_key_status=? where u_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('sssssssi', $u_keyname, $u_key_category, $u_year, $u_purpose, $u_key_applydate, $u_license, $u_key_status, $u_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "User Application Added";
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
            <a href="#">Application</a>
          </li>
          <li class="breadcrumb-item active">Add</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
          Add Booking
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
          <form method ="POST" enctype="multipart/form-data"> 

            <div class="form-group">
              <label for="exampleFormControlSelect1">Plate</label>
              <select class="form-control" name="u_keyname" id="exampleFormControlSelect1">
                <?php

                $ret="SELECT * FROM db_key where   k_status ='Available' "; //sql code to get to all assets
                $stmt= $mysqli->prepare($ret) ;
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                $cnt=1;
                while($row=$res->fetch_object())
                {
                ?>
                <option><?php echo $row->k_keyname;?></option>
                <?php }?> 
              </select>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Model</label>
              <select class="form-control" name="u_key_category" id="exampleFormControlSelect1">
                <?php

                $ret="SELECT * FROM db_key where k_status ='Available' ";  //sql code to get to all assets
                $stmt= $mysqli->prepare($ret) ;
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                $cnt=1;
                while($row=$res->fetch_object())
                {
                ?>
                <option><?php echo $row->k_category;?></option>
                <?php }?>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Model</label>
              <select class="form-control" name="u_year" id="exampleFormControlSelect1">
                <?php

                $ret="SELECT * FROM db_key where k_status ='Available' ";  //sql code to get to all assets
                $stmt= $mysqli->prepare($ret) ;
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                $cnt=1;
                while($row=$res->fetch_object())
                {
                ?>
                <option><?php echo $row->k_year;?></option>
                <?php }?>
              </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Pickup Date</label>
                <input type="date" class="form-control" id="exampleInputEmail1"  name="u_key_applydate">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Purpose</label>
              <input type="text" required class="form-control" id="exampleInputEmail1" name="u_purpose">
            </div>

            <div class="form-group">
                <label for="myfile">Photo of Driving License:</label><br>
                <input type="file" id="exampleInputEmail1" name="u_license"><br>
             </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Status</label>
              <select class="form-control" name="u_key_status" id="exampleFormControlSelect1">
                <option>Approved</option>
                <option>Pending</option>
              </select>
            </div>

            <button type="submit" name="book_assets" class="btn btn-success">Confirm Application</button>
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
