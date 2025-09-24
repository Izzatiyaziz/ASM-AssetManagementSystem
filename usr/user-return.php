<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];
   //Add USer
   if(isset($_POST['return_assets']) && isset($_FILES['r_pic']))
   {
       //  $r_id=$_GET['r_id'];
           $r_name=$_POST['r_name'];
           $r_contact=$_POST['r_contact'];
           $r_plate=$_POST['r_plate'];
           $r_model=$_POST['r_model'];
           $r_year=$_POST['r_year'];
           $r_datetime=$_POST['r_datetime'];
           $r_pic= $_FILES["r_pic"]["name"];
           move_uploaded_file($_FILES["r_pic"]["tmp_name"],"../vendor/img/".$_FILES["r_pic"]["name"]);
           $r_status=$_POST['r_status'];
           $query="insert into db_return (r_name, r_contact, r_plate, r_model, r_year, r_datetime, r_pic) values(?,?,?,?,?,?,?)";
           $stmt = $mysqli->prepare($query);
           $rc=$stmt->bind_param('sssssss', $r_name,$r_contact, $r_plate, $r_model, $r_year, $r_datetime, $r_pic);
           $stmt->execute();
               if($stmt)
               {
                   $succ = "Returned Submitted"; 
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
          <li class="breadcrumb-item">Return</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
          Returned Asset
        </div>
        <div class="card-body">
        <!--Return Form-->
        <form method ="POST" enctype="multipart/form-data"> 
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
        <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" required readonly class="form-control" value="<?php echo $row->u_name;?>" id="exampleInputEmail1" name="r_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Contact</label>
                <input type="text" required readonly class="form-control" value="<?php echo $row->u_contact;?>" id="exampleInputEmail1" name="r_contact">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Plate</label>
                <input type="text" required readonly class="form-control" value="<?php echo $row->u_keyname;?>" id="exampleInputEmail1" name="r_plate">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Model</label>
                <input type="text" required readonly class="form-control" value="<?php echo $row->u_key_category;?>" id="exampleInputEmail1" name="r_model">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Year</label>
                <input type="text" required readonly class="form-control" value="<?php echo $row->u_year;?>" id="exampleInputEmail1" name="r_year">
            </div>
        <?php }?>
        <div class="form-group">
            <label for="returnDate">Return Date and Time:</label> 
            <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="r_datetime">
        </div>
        <div class="form-group">
            <label for="myfile">Take a picture of the asset after use:</label><br>
            <input type="file" id="exampleInputEmail1" name="r_pic">
        </div>
            <button type="submit" name="return_assets" class="btn btn-success">Submit</button> 

       <div class="form-group" style="display:none">
            <label for="exampleInputEmail1">Status</label>
            <input type="text" value="Pending" class="form-control" id="exampleInputEmail1"  name="r_status">
       </div>

       </form>
       <!--End Form-->
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

