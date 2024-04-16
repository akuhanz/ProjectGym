<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{  asset('LTE/plugins/fontawesome-free/css/all.min.css')  }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{  asset('LTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')  }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{  asset('LTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')  }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{  asset('LTE/plugins/jqvmap/jqvmap.min.css')  }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{  asset('LTE/dist/css/adminlte.min.css')  }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{  asset('LTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')  }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{  asset('LTE/plugins/daterangepicker/daterangepicker.css')  }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{  asset('LTE/plugins/summernote/summernote-bs4.min.css')  }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="https://cdn-sdotid.adg.id/images/37d92b52-78e4-465f-87d2-4cac0f9476af_564x564.webp.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dewa GYM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('paket')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Daftar Paket</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('produk')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Daftar Produk
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
              
              
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('LTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('LTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('LTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('LTE/plugins/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('LTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('LTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('LTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('LTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('LTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{  asset('LTE/dist/js/adminlte.js') }}"></script>
</body>
</html>
