<?php session_start(); 
      include_once("inc_files/dbconnect.php"); 
       // $_SESSION['txtfirstName'];
        //$_SESSION['txtlastName'];
   
      ?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Vehicle Manegement System | Register User</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="dist/img/vrs.png" alt="VRS Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">VRS</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="about.php" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="info.php" class="nav-link">Info</a>
          </li>
          <li class="nav-item">
            <a href="validation.php" class="nav-link">validation</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a href="vrslogin.php" class="nav-link"> <i class="fas fa-comments"></i> Login</a>
          </li>

          <li class="nav-item">
             <a href="vrsregister.php" class="nav-link"><i class="far fa-bell"></i> Register</a>
          </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> VRS <small>Vehicle Management System </small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="vrslogin.php">Login</a></li>
              <li class="breadcrumb-item active">Register User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">

          <!-- /.col-md-6 -->
        <div class="row">
        
            
    <?php
        include("inc_files/dbconnect.php");
     if(isset($_POST['vrsregisterbtn']))
    {
    $txtuser  = $dbconn->real_escape_string($_POST['user']);
    $txtpwd  = $dbconn->real_escape_string($_POST['password']);
    $txtrepwd  = $dbconn->real_escape_string($_POST['repassword']);
      $_SESSION['userAcct'] = $txtuser;
      date_default_timezone_set('UTC');
        $udate = date("d/m/Y");

    $searchTable = $dbconn->query("SELECT userAcct, password, confirmuser, registerdate FROM reguser WHERE userAcct = '$txtuser'");
      $numRow = $searchTable->num_rows;
      if($numRow == 0)
      {
        $txtpwd = trim($txtpwd);
        if($txtpwd == $txtrepwd)
        {
          $emailchecker = explode('@', $txtuser);
          if(isset($emailchecker[1]))
          {
            $pwdHarsh = md5($txtpwd);
            $otpcode = rand(1000,9999);

            $sentInfo = $dbconn->query("INSERT INTO reguser(userAcct, password, confirmuser, registerdate) VALUES ('$txtuser', '$pwdHarsh', '$otpcode', '$udate')");
            if($sentInfo)
            { 
              $_SESSION['userAcct'] = $txtuser;
              $_SESSION['otpcode'] = $otpcode;
              ?>
          <div class="col-md-8 offset-md-2">
            <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">OTP Confirmation</h5>
              </div>
            <form method="POST" action="register_process.php" role="form" id="quickForm">
                <div class="card-body">
                  <div class="alert alert-success alert-dismissible">
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    You have completed the first step. Please fill in the OPT Code sent to your email account. Confirm it and then proceed with your registration
                  </div>
                    <input type="hidden" name="userAcct" class="form-control" value="<?php echo $_SESSION['userAcct']; ?>" >
                    <input type="hidden" name="userOtp" class="form-control" value="<?php echo $_SESSION['otpcode']; ?>" >
                  <div class="form-group">
                    <label for="inputEmail">Email Address</label>
                    <input type="text" name="user" class="form-control" id="inputEmail" value="<?php echo $_SESSION['userAcct']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">OTP Code</label>
                    <input type="text" name="txtOTPCode" class="form-control" id="inputPassword" placeholder="OTP Code">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="vrsconfirmotpbtn" class="btn btn-block btn-primary" value="Confirm OTP Code">
                </div>
              </form>
            </div>
          </div>
          <?php
              //sent an email to your account
              //header("location:vrsregisternext.php");
              }
            

            }
            elseif(is_numeric($txtuser))
            {
              
             $pwdHarsh = md5($txtpwd);
            $otpcode = rand(1000,9999);

            $sentInfo = $dbconn->query("INSERT INTO reguser(userAcct, password, confirmuser, registerdate) VALUES ('$txtuser', '$pwdHarsh', '$otpcode', '$udate')");
            if($sentInfo)
            { 
              $_SESSION['userAcct'] = $txtuser;
              $_SESSION['otpcode'] = $otpcode;
              ?>
          <div class="col-md-8 offset-md-2">
            <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">OTP Confirmation</h5>
              </div>
            <form method="POST" action="register_process.php" role="form" id="quickForm">
                <div class="card-body">
                  <div class="alert alert-success alert-dismissible">
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    You have completed the first step. Please fill in the OPT Code sent to your phone number. Confirm it and then proceed with your registration
                  </div>
                    <input type="hidden" name="userAcct" class="form-control" value="<?php echo $_SESSION['userAcct']; ?>" >
                    <input type="hidden" name="userOtp" class="form-control" value="<?php echo $_SESSION['otpcode']; ?>" >
                  <div class="form-group">
                    <label for="inputEmail">Phone Number</label>
                    <input type="text" name="user" class="form-control" id="inputEmail" value="<?php echo $_SESSION['userAcct']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">OTP Code</label>
                    <input type="text" name="txtOTPCode" class="form-control" id="inputPassword" placeholder="OTP Code">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="vrsconfirmotpbtn" class="btn btn-block btn-primary" value="Confirm OTP Code">
                </div>
              </form>
            </div>
          </div>

          <?php 
        }

            } 
            else
            {
              $_SESSION['error'] = "Your email address or phone number is not entered correctly.";
                header("location:vrsregister.php");
            }      
        }
        else
        {
          $_SESSION['error'] = "Your password does not match.";
          header("location:vrsregister.php");
        }



      }
      else
      {
        $getInfo = $searchTable->fetch_assoc();
        $userAcct = $getInfo['userAcct'];
        $_SESSION['userAcct'] = $getInfo['userAcct'];
        $_SESSION['otpcode'] = $getInfo['confirmuser'];
        if($_SESSION['otpcode'] == "vrsActiveUser")
        {
            $_SESSION['success'] = "Your account has been confirmed. please login to access your account!";
          header("location:vrslogin.php");
        }
        else
        {    
        ?>
          <div class="col-md-8 offset-md-2">
            <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">OTP Confirmation</h5>
              </div>
            <form method="POST" action="register_process.php" role="form" id="quickForm">
                <div class="card-body">
                  <div class="alert alert-warning alert-dismissible">
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                    Sorry, you have a registration already. Please check the OTP code that was sent to you on <?php echo $_SESSION['userAcct']; ?> to complete your registration.
                  </div>
                    <input type="hidden" name="userAcct" class="form-control" value="<?php echo $_SESSION['userAcct']; ?>" >
                    <input type="hidden" name="userOtp" class="form-control" value="<?php echo $_SESSION['otpcode']; ?>" >
                  <div class="form-group">
                    <label for="inputEmail"><?php if(is_numeric($userAcct)){ echo "Phone Number"; } else { echo "Email Address"; } ?></label>
                    <input type="text" name="user" class="form-control" id="inputEmail" value="<?php echo $_SESSION['userAcct']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">OTP Code</label>
                    <input type="text" name="txtOTPCode" class="form-control" id="inputPassword" placeholder="OTP Code">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="vrsconfirmotpbtn" class="btn btn-block btn-primary" value="Confirm OTP Code">
                </div>
              </form>
            </div>
          </div>
         <?php     
      }

    }
  }
  else
  {
          ?>
                        
          <div class="col-md-8 offset-md-2">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Create New Account</h5>
              </div>

             <form method="POST" action="" role="form" id="quickForm">
                <div class="card-body">
                     <?php
                        if(isset($_SESSION['info'])){
                          echo "
                            <div class='alert alert-info alert-dismissible'>
                              ".$_SESSION['info']."
                            </div>
                          ";
                          unset($_SESSION['info']);
                        }
                         if(isset($_SESSION['error'])){
                          echo "
                            <div class='alert alert-danger alert-dismissible'>
                              ".$_SESSION['error']."
                            </div>
                          ";
                          unset($_SESSION['error']);
                        }
                        if(isset($_SESSION['success'])){
                          echo "
                            <div class='alert alert-success alert-dismissible'>
                              ".$_SESSION['success']."
                            </div>
                          ";
                          unset($_SESSION['success']);
                        }
                      ?>
                  <div class="form-group">
                    <label for="inputEmail">Email Address OR Phone Number</label>
                    <input type="text" name="user" class="form-control" id="inputEmail" placeholder="Enter email address OR phone number" value="<?php if(isset($_SESSION['userAcct'])){ echo $_SESSION['userAcct']; unset($_SESSION['userAcct']); } else { echo ""; } ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Create Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="inputRePassword">Confirm Password</label>
                    <input type="password" name="repassword" class="form-control" id="inputRePassword" placeholder="Confirm Password">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="vrsregisterbtn" class="btn btn-block btn-primary" value="Next">
                </div>
              </form>
            </div>
          </div>
 
        <?php 
      }

        ?>




        </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Simplify bussiness
    </div>
    <!-- Default to the left -->
    Copyright &copy; 2014-2020 <a href="https://macrofocusng.com">MacroFocus Ng</a>. All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      //alert( "Thanks" );
      windows.location.href = "register_process.php";    
    }
 
  });
  $('#quickForm').validate({
    rules: {
      email1: {
        required: true,
        email: true,
      },
      user: {
        required: true,
      },
      password: {
        required: true,
        minlength: 6
      },
      repassword: {
        required: true,
        minlength: 6
      },
    },
    messages: {
      email1: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      user: {
        required: "Please enter either your email address or phone number"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
      repassword: "Please confirm your password",
      minlength: "Your password must be at least 6 characters long"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
