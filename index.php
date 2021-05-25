<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Vehicle Manegement System</title>

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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">

                <p class="card-text">
                  <img class="img img-responsive" style="height:500PX;width:100%"  src="dist/img/carindex.png" alt="User Image">                 
                </p>

              </div>
            </div>
          </div>
        </div>
          <!-- /.col-md-6 -->
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Buy Plate Number</h5>
              </div>
              <div class="card-body">

                <p class="card-text">Plate number registration is available online.</p>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Vehicle Registration</h5>
              </div>
              <div class="card-body">

                <p class="card-text">Register your motor vehicle safe and easy.</p>
             
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Car Insurrance</h5>
              </div>
              <div class="card-body">

                <p class="card-text">Choose your insurrance policy and be secured.</p>
                
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
             
              <img src="dist/icons/icon1.svg" />

              <div class="info-box-content">
                <span class="info-box-text">Plate Number</span>
                <span class="info-box-number"><small>Search for availabe plate number.</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              
                <img src="dist/icons/icon2.svg" />
                <br>
              <div class="info-box-content">
                <span class="info-box-text">Vehicle Registration<br></span>
                <span class="info-box-number"><small>Register your vehicle safe and easy.</small></span>
                <br>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              
              <img src="dist/icons/icon3.svg" />
              <div class="info-box-content">
                <span class="info-box-text">Add A Vehicle</span>
                <span class="info-box-number"><small>Add more vehicle</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              
                <img src="dist/icons/icon4.svg" />

              <div class="info-box-content">
                <span class="info-box-text">Check Status</span>
                <span class="info-box-number"><small>Verify vehicle particulars</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

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

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
