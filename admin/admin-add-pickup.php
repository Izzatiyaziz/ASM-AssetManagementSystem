<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
  //Add USer
  if(isset($_POST['add_pickup']))
    {

        $p_name=$_POST['p_name'];
        $p_datetime=$_POST['p_datetime'];
       // $p_pic= $_FILES["p_pic"]["name"];
       // move_uploaded_file($_FILES["p_pic"]["tmp_name"],"../vendor/img/".$_FILES["p_pic"]["name"]);
        $query="insert into db_pickup (p_name, p_datetime) values(?,?)";
        $stmt = $mysqli->prepare($query);
        $rc=$stmt->bind_param('ss', $p_name, $p_datetime );
        $stmt->execute();
            if($stmt)
            {
                $succ = "Pickup Submitted";
            }
            else 
            {
                $err = "Please Try Again Later";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<?php include("vendor/inc/head.php");?>

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
       <li class="breadcrumb-item">Add Pickup</li>
     </ol>
     <hr>
     <div class="card">
     <div class="card-header">
       Pickup Asset
     </div>
     <div class="card-body">
     <!--Return Form-->
     <form method ="POST"> 
     <div class="form-group">
             <label for="exampleInputEmail1">Name</label>
             <input type="text" required class="form-control" id="exampleInputEmail1" name="p_name">
         </div>
     <div class="form-group">
         <label for="returnDate">Pickup Date and Time:</label> 
         <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="p_datetime">
     </div>
     <div class="form-group">
         <label for="myfile">Take a picture of the assets before use:</label><br>
         <input type="file" id="exampleInputEmail1" >
     </div>
     <button type="submit" name="add_pickup" class="btn btn-success">Submit</button>
    </form>
          <!-- End Form-->
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