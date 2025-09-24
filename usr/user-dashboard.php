<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];
?>
<!DOCTYPE html>
<html lang="en">

<!--Head-->
<?php include ('vendor/inc/head.php');?>
<!--End Head-->

<body id="page-top">
<!--Navbar-->
  <?php include ('vendor/inc/nav.php');?>
<!--End Navbar-->  

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('vendor/inc/sidebar.php');?>
    <!--End Sidebar-->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="user-dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user"></i>
                </div>
                <div class="mr-5">My Profile</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="user-view-profile.php">
                <span class="float-left">View</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-key"></i>
                </div>
                <div class="mr-5">Lists of keys</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="user-list-assets.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-clock"></i>
                </div>
                <div class="mr-5">My Status Application</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="user-view-status.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-clipboard"></i>
                </div>
                <div class="mr-5">My Return Completed</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="user-view-return.php">
                <span class="float-left">View </span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

       <!--SOP-->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-book"></i>
            Standard Operation Procedure (SOP)</div>
            <div class="card-body">
            <label for="exampleInputEmail1">Please follow the SOP provided. Failure to do so may result in rejection of the application. In addition, it is reminded to submit your application at least a week before the intended use.</label>
            <div class="flowchart">
            <img src="/vendor/img/application1.png" class="img-fluid" alt="Responsive image">
           <hr>
     
            </table>
            </div>
    </div>
        <div class="card-footer small text-muted">
            <?php
              date_default_timezone_set("Asia/Kuala_Lumpur");
              echo "Generated At : " . date("h:i:sa");
            ?> 
        </div>
        </div>

      </div>
      <!-- /.container-fluid -->
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