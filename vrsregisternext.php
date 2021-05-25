<?php session_start(); 
    include("inc_files/dbconnect.php"); ?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Vehicle Manegement System | Register User</title>


    <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

 <script src="jquery.min.js"></script>
    <script>
      $(document).ready(function(){
          $('#state').on('change', function(){
              var stateID = $(this).val();
              if(stateID){
                  $.ajax({
                    type: 'POST',
                    url: 'ajaxData.php',
                    data: 'state_id='+stateID,
                    success: function(html){
                        $('#lga').html(html)
                    }
                  });
              }else
              {
                $('#lga').html('<option value="">Select State first</option>');
                $('#ward').html('<option value="">Select LGA first</option>');
              }
          });

          $('#lga').on('change', function(){
              var lgaID = $(this).val();
              if(lgaID){
                $.ajax({
                  type: 'POST',
                  url: 'ajaxData.php',
                  data: 'lga_id='+lgaID,
                    success: function(html){
                        $('#ward').html(html)
                    }
                });
              }else
              {
                $('#ward').html('<option value="">Select LGA first</option>');
              }
          }); 
      });
    </script>

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
        
          <div class="col-md-8 offset-md-2">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Create New Account</h5>
              </div>
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
                
             <form method="POST" action="register_process.php" role="form" id="quickForm">
                <div class="card-body">

                  <div class="row">
                     <div class="form-group col-md-2">
                        <label for="title">Title </label>
                          <select name="txtTitle" class="form-control">
                            <option><?php if(isset($_SESSION['txttitle'])) { echo $_SESSION['txttitle']; unset($_SESSION['txttitle']); } ?></option>
                            <option>Mr</option>
                            <option>Mrs</option>
                            <option>Miss</option>                            
                          </select>
                      </div>
                    <div class="form-group col-md-4">
                      <label for="firstname">First Name</label>
                      <input type="text" name="txtFirstName" class="form-control" id="firstname" placeholder="First Name" value="<?php if(isset($_SESSION['txtfirstName'])) { echo $_SESSION['txtfirstName'];  unset($_SESSION['txtfirstName']); } ?>">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="lastname">Last Name</label>
                      <input type="text" name="txtLastName" class="form-control" id="lastname" placeholder="Last Name" value="<?php if(isset($_SESSION['txtlastName'])) { echo $_SESSION['txtlastName'];  unset($_SESSION['txtlastName']); } ?>">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="othernames">Other Names</label>
                      <input type="text" name="txtOtherName" class="form-control" id="othernames" placeholder="Other Names" value="<?php if(isset($_SESSION['txtotherName'])) { echo $_SESSION['txtotherName'];  unset($_SESSION['txtotherName']); } ?>">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="gender">Gender</label>
                      <select class="form-control select2bs4" name="txtGender" style="width: 100%;" id="gender">
                          <?php if(isset($_SESSION['txtgender'])) { ?>
                          <option selected="selected"><?php echo $_SESSION['txtgender']; ?></option>
                          <?php }else{ ?>
                          <option selected="selected" disabled="disabled">Select Gender</option>
                          <?php } ?>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="dateofbirth">Date of Birth</label>
                      <input type="date" name="txtDateOfBirth" class="form-control" id="dateofbirth" placeholder="Other Names" value="<?php if(isset($_SESSION['txtdateofbirth'])) { echo $_SESSION['txtdateofbirth'];  unset($_SESSION['txtdateofbirth']); } ?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="phonenumber">Phone Number</label>
                      <input type="text" name="txtPhoneNumber" maxlength="13" minlength="11" class="form-control" id="phonenumber" placeholder="Phone Number" value="<?php
                    if(is_numeric($_SESSION['userAcct'])) { echo $_SESSION['userAcct']; } elseif(isset($_SESSION['txtphoneNumber'])) { echo $_SESSION['txtphoneNumber'];  unset($_SESSION['txtphoneNumber']); } ?>" <?php if(is_numeric($_SESSION['userAcct'])) {echo "readonly='readonly'"; } ?>>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="emailaddress">Email Address:</label>
                      <input type="email" name="txtEmailAddress" class="form-control" id="emailaddress" placeholder="Email Address" value="<?php
                    if(!is_numeric($_SESSION['userAcct'])) { echo $_SESSION['userAcct']; } elseif(isset($_SESSION['txtemailAddress'])) { echo $_SESSION['txtemailAddress'];  unset($_SESSION['txtemailAddress']); } ?>" <?php if(!is_numeric($_SESSION['userAcct'])) {echo "readonly='readonly'"; } ?>>
                    </div>

                  <div class="form-group col-md-4">
                    <label for="state">State of Residence</label>
                    <select id="state" name="txtState" class="form-control select2" style="width: 100%;">
                    <?php $getState = $dbconn->query("SELECT * FROM states");
                        if($getState->num_rows>0)
                          {
                            while($arr = $getState->fetch_assoc())
                            {
                           ?>
                      <option value="<?php echo $arr['state_id']; ?>" ><?php echo $arr['state_name']; ?></option>
                      <?php }
                          } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="lga">Local Government Area</label>
                    <select id="lga" name="txtLGA" class="form-control select2" style="width: 100%;">
                      
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                  <label for="ward">Ward</label>
                    <select id="ward" name="txtWard" class="form-control select2" style="width: 100%;">
                     
                   </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="inputRePassword">Address</label>
                    <textarea name="txtAddress" class="form-control"><?php if(isset($_SESSION['txtaddress'])) { echo $_SESSION['txtaddress'];  unset($_SESSION['txtaddress']); } ?></textarea>
                  </div>
                </div>
                <input type="hidden" name="getUserAcct" class="form-control" value="<?php echo $_SESSION['userAcct']; ?>">
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="vrsregisternextbtn" class="btn btn-block btn-primary" value="Proceed">
                </div>
              </form>
              
            </div>
          </div>

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
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {

    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  $.validator.setDefaults({
    submitHandler: function () {
      //alert( "Thanks" );
      windows.location.href = "register_process.php";    
    }
 
  });
  $('#quickForm').validate({
    rules: {
      txtFirstName: {
        required: true,
      },
      txtLastName: {
        required: true,
      },
      txtPhoneNumber: {
        required: true,
        number: true,
        minlength: 11,
        maxlength: 13
      },
      txtState: {
        required: true,
      },
      txtLGA: {
        required: true,
      },
      txtWard: {
        required: true,
      },
      txtAddress: {
        required: true,
      },
    },
    messages: {
      txtFirstName: {
        required: "Please enter your first name"
      },
      txtLastName: {
        required: "Please enter your surname"
      },
      txtPhoneNumber: {
        required: "Please enter your phone number",
        minlength: "Phone number must be 11 digits long",
        maxlength: "Phone number must be 11 digits long"
      },
      txtState: {
        required: "Please  your LGA of Residence"
      },
      txtLGA: {
        required: "Select  your LGA of Residence"
      },
      txtWard: {
        required: "Select your ward"
      },
      txtAddress:  "Please write your correct residence",
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>
</html>