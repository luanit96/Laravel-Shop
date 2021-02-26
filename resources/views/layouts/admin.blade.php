<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Trang quản trị</title>

  <link rel="shortcut icon" href="{{ asset('source/assets/dest/images/favicon.ico') }}">
  <link href="{{ asset('admin_access/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('admin_access/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_access/css/sb-admin.css') }}" rel="stylesheet">
</head>
<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="{{ asset('admin') }}">Admin - Thành Luân</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
        </a>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="{{route('admin')}}" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          @guest
          <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
          @if (Route::has('register'))
          <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
          @endif
          @else
          <a class="dropdown-item" href="{{route('admin')}}">Hello! {{ Auth::user()->name }}</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('dangxuatadmin') }}" data-toggle="modal" data-target="#logoutModal">{{ __('Logout') }}</a>
          @endguest
        </div>
      </li>
    </ul>
  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ asset('admin') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Trang Quản trị</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/categories') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Loại sản phẩm</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/products') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Sản phẩm</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/slides') }}">
          <i class="fas fa-adjust"></i>
          <span>Ảnh bìa</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/customers') }}">
          <i class="fas fa-address-book"></i>
          <span>Khách hàng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/users') }}">
          <i class="fas fa-allergies"></i>
          <span>Người dùng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/bills') }}">
          <i class="fab fa-apple"></i>
          <span>Đơn hàng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/billdetails') }}">
         <i class="fas fa-apple-alt"></i>
         <span>Chi tiết đơn hàng</span>
       </a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="{{ asset('admin/posts') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Bài viết</span>
      </a>
    </li>
  </ul>

  <div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ asset('admin') }}">Trang quản trị</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
      </ol>

      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">Loại sản phẩm</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ asset('admin/categories') }}">
              <span class="float-left">Xem chi tiết</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-list"></i>
              </div>
              <div class="mr-5">Sản phẩm</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ asset('admin/products') }}">
              <span class="float-left">Xem chi tiết</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">Khách hàng</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ asset('admin/customers') }}">
              <span class="float-left">Xem chi tiết</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-life-ring"></i>
              </div>
              <div class="mr-5">Ảnh bìa</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ asset('admin/slides') }}">
              <span class="float-left">Xem chi tiết</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      @yield('content')
    </div>
    <!-- /.container-fluid -->
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Design by Thành Luân</span>
        </div>
      </div>
    </footer>
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
        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Bạn có chắc chắn muốn thoát không?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="{{ route('dangxuatadmin') }}">Ok</a>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin_access/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_access/vendor/bootstrap/js/bootstrap.bundle.min.js') }}">
</script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('admin_access/vendor/jquery-easing/jquery.easing.min.js') }}">
</script>

<!-- Page level plugin JavaScript-->
<script src="{{ asset('admin_access/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin_access/vendor/datatables/dataTables.bootstrap4.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('admin_access/js/sb-admin.min.js') }}"></script>

<!-- Demo scripts for this page-->
<script src="{{ asset('admin_access/js/demo/datatables-demo.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
<script>
  var btnImage = document.getElementById('ckfinder-popup-1');
  if(btnImage) {
    btnImage.onclick = function() {
      selectFileWithCKFinder('ckfinder-input-1', 'input-img');
    };
  }

  function selectFileWithCKFinder( elementId, imageId ) {
    const inputImage = document.getElementById(elementId);
    inputImage.value = '';
    CKFinder.popup( {
      chooseFiles: true,
      width: 800,
      height: 600,
      onInit: function( finder ) {
        finder.on( 'files:choose', function( evt ) {
          var file = evt.data.files.first();
          var output = document.getElementById(elementId);
          var elementImage = document.getElementById(imageId);
          output.value = file.getUrl();
          elementImage.src = output.value;
        } );

        finder.on( 'file:choose:resizedImage', function( evt ) {
          var output = document.getElementById(elementId);
          output.value = evt.data.resizedUrl;
        } );
      }
    });
  }

  //import ckfinder to ckeditor
  CKEDITOR.replace( 'ckeditor', {
    filebrowserBrowseUrl: '{{ asset('/ckfinder/ckfinder.html') }}',
    filebrowserImageBrowseUrl: '{{ asset('/ckfinder/ckfinder.html?Type=Images') }}',
    filebrowserUploadUrl: '{{ asset('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
    filebrowserImageUploadUrl: '{{ asset('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
    filebrowserWindowWidth : '1000',
    filebrowserWindowHeight : '700'
  } );

</script>
</body>
</html>