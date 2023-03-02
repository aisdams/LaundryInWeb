<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LaundryInWeb</title>
  <!-- base:css -->
  <link rel="stylesheet" href={{ asset('template/vendors/mdi/css/materialdesignicons.min.css') }}>
  <link rel="stylesheet" href={{ asset('template/vendors/css/vendor.bundle.base.css') }}>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href={{ asset('template/css/style.css') }}>
  <!-- endinject -->
  <link rel="shortcut icon" href={{asset('asset/logolaundry.png')}} />

</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center" style="background-color: #2B3467;color: white">
            {{-- Error Alert --}}
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo" style="display: flex;gap: 2rem">
                <img src={{ asset('asset/logolaundry.png') }} alt="logo" style="width: 90px;height: auto;border-radius: 60%;object-fit: contain">
                <h2 style="position: relative;top: 2rem;">LaundryInAja</h2>
              </div>
              <h4>Welcome back!</h4>
              <h6 class="font-weight-light">@yield('judulnya')</h6>
              @yield('formnya')
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-none d-lg-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  @stack('scriptauth')
  <script src={{ asset('template/vendors/js/vendor.bundle.base.js') }}></script>
  <script src="https://kit.fontawesome.com/4d8cfff1ae.js" crossorigin="anonymous"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src={{ asset('template/js/off-canvas.js') }}></script>
  <script src={{ asset('template/js/hoverable-collapse.js') }}></script>
  <script src={{ asset('template/js/template.js') }}></script>
  <!-- endinject -->
</body>

</html>
