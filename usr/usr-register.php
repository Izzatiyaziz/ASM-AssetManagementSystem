<!--Server Side Scripting To inject Login-->
<?php
  //session_start();
  include('vendor/inc/config.php');
  //include('vendor/inc/checklogin.php');
  //check_login();
  //$aid=$_SESSION['a_id'];
  //Add USer
  if(isset($_POST['add_user']))
    {

            $u_name=$_POST['u_name'];
            $u_contact=$_POST['u_contact'];
            $u_address=$_POST['u_address'];
            $u_position=$_POST['u_position'];
            $u_depart=$_POST['u_depart'];
            $u_code = $_POST['u_code'];
            $u_email=$_POST['u_email'];
            $u_pwd=$_POST['u_pwd'];
            $query="insert into db_user (u_name, u_contact, u_address, u_position, u_depart, u_code, u_email, u_pwd) values(?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssssss', $u_name,  $u_contact, $u_address, $u_position, $u_depart, $u_code, $u_email, $u_pwd);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Account Created Proceed To Log In";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            }
?>
<!--End Server Side Scriptiong-->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Assets Management System, Nur Izzati, Eco World Wellness Sdn Bhd">
  <meta name="author" content="Nur Izzati ">

  <title>Assets Management System User- Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
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
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Create an Account</div>
      <div class="card-body">
        <!--Start Form-->
        <form method = "post">
          <div class="form-group">
                <div class="form-label-group">
                <input type="text" required class="form-control" id="exampleInputEmail1" name="u_name">
                  <label for="name">Name</label>
                </div>
              </div>
          
                <div class="form-group">
                <div class="form-label-group">
                <input type="text" class="form-control" id="exampleInputEmail1" name="u_address">
                  <label for="address">Address</label>
                </div>
              </div>
          
              <div class="form-group">
                <div class="form-label-group">
                <input type="text" class="form-control" id="exampleInputEmail1" name="u_contact">
                  <label for="contact">Contact</label>
                </div>
              </div>
          <div class="form-group">
            <div class="form-label-group">
            <input type="text" class="form-control" id="exampleInputEmail1" name="u_code">
              <label for="code">Id Code</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
            <input type="position" class="form-control" name="u_position">
              <label for="position">Position</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
            <input type="department" class="form-control" name="u_depart">
              <label for="department">Department</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
            <input type="text" class="form-control" id="exampleInputEmail1" name="u_email">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                <input type="password" class="form-control" name="u_pwd" id="exampleInputPassword1">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" name="add_user" class="btn btn-success">Create Account</button>
        </form>
        <!--End Form-->
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Login Page</a>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>
