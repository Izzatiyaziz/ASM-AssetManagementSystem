<?php
  session_start();
  include('admin/vendor/inc/config.php');
  //include('vendor/inc/checklogin.php');
  //check_login();
  //$aid=$_SESSION['a_id'];
?>

<!DOCTYPE html>
<html lang="en">
<?php include('vendor/inc/head.php');?>
<head>
<script>
  function radio_input(url)
{
// Re-direct the browser to the url value 
window.location.href = url;
}
</script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Nihoma AMS </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body>
  <div class="d-flex justify-content-cemnter align-items-center" style="background-image: url('vendor/img/bg2.jpg'); height: 100vh;">

  <div class="container">
    <div class="card card-login mx-auto mt-0">
      <div class="card-header" >
        <div class="login-logo" style="text-align: center;">
        <img src="vendor/img/logo_320x61.png"width="150" alt="NIHOMA">
        <hr> 
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

        <div class="text-center">
        <p class="fs-6">Login by:</p>
        </div>
        
        <div class="text-center">
        <input type="radio" name="group1" value="off"  onClick="radio_input('admin/')"> Admin Login
        <div>
        <input type="radio" name="group1" value="off"  onClick="radio_input('usr/')"> User Login
        </form>
        
        <div class="text-right">
          <a class="d-block small mt-3">Developed by Izzati, Intern Student </a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
