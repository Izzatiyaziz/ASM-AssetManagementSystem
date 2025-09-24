<!--Server Side Scripting Language to inject login code-->
<?php
    session_start();
    include('vendor/inc/config.php');//get configuration file
    if(isset($_POST['Usr-login']))
    {
      $u_code=$_POST['u_code'];
      $u_pwd=($_POST['u_pwd']);//
      $stmt=$mysqli->prepare("SELECT u_code, u_pwd, u_id FROM db_user WHERE u_code=? and u_pwd=? ");//sql to log in user
      $stmt->bind_param('ss',$u_code,$u_pwd);//bind fetched parameters
      $stmt->execute();//execute bind
      $stmt -> bind_result($u_code,$u_pwd,$u_id);//bind result
      $rs=$stmt->fetch();
      $_SESSION['u_id']=$u_id;//assaign session to user id
      $_SESSION['login']=$u_code;
      $uip=$_SERVER['REMOTE_ADDR'];
      $ldate=date('d/m/Y h:i:s', time());
      if($rs)
      {//get user logs
        $uid=$_SESSION['u_id'];
        $ucode=$_SESSION['login'];
        $ip=$_SERVER['REMOTE_ADDR'];
        $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
        $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
        $city = $addrDetailsArr['geoplugin_city'];
        $country = $addrDetailsArr['geoplugin_countryName'];
        $log="insert into userLog(u_id, u_code, u_ip, u_city, u_country) values('$uid','$ucode','$ip','$city','$country')";
        $mysqli->query($log);
        if($log)
        {
         header("location:user-dashboard.php");
         }
        }
      else
      {
      #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
      $error = "Access Denied Please Check Your Credentials";
      }
  }
?>
<!--End Server Side Script Injection-->
<!DOCTYPE html>
<html lang="en">
<style>
  .custom-bg-blue {
    background-color: #051650; /* Change this color to the shade of blue you prefer */
    color: #000000; /* Change text color to white for better contrast */
  }
</style>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Nihoma AMS - User Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body class="custom-bg-blue">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">User Login Panel</div>
      <div class="card-body">
        <!--INJECT SWEET ALERT-->
        <!--Trigger Sweet Alert-->
          <?php if(isset($error)) {?>
          <!--This code for injecting an alert-->
              <script>
                    setTimeout(function () 
                    { 
                      swal("Failed!","<?php echo $error;?>!","error");
                    },
                      100);
              </script>
                  
          <?php } ?>
        <form method ="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="code" name="u_code" id="inputCode" class="form-control"  required="required" autofocus="autofocus">
              <label for="inputEmail">Id code</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="u_pwd" id="inputPassword" class="form-control"  required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <input type="submit" name="Usr-login" class="btn btn-success btn-block" value="Login">
        </form>
        <div class="text-center">
        <a class="d-block small mt-3" href="../index.php">Home</a>
        <a class="d-block small" href="usr-forgot-password.php">Forgot Password?</a>
          <a class="d-block small" href="usr-register.php">Register an Account</a>
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
