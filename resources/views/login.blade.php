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
              <h6 class="font-weight-light">Happy to see you again!</h6>
              <form class="pt-3" action="{{ route('login.post') }}" method="POST">
                @csrf
                @error('login_gagal')
                {{-- <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> --}}
                 <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                    <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                @enderror
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-white"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" style="color: white" id="email" placeholder="Email" name="email" autofocus>
                    @if($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-white"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" style="color: white" id="password" name="password" placeholder="Password">
                    @if($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-white">Forgot password?</a>
                </div>
                <div class="my-2">
                  <button type="submit" class="btn btn-block btn-lg font-weight-medium auth-form-btn" href="index.html" style="background-color: #E8D5C4">LOGIN</button>
                </div>
                <div class="text-center mb-2">OR</div>
                <div class="mb-2 d-flex">
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                    <i class="mdi mdi-google mr-2"></i>Google
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register-2.html" class="text-white " style="font-weight: bold">Create</a>
                </div>
              </form>
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
  <script src={{ asset('template/vendors/js/vendor.bundle.base.js') }}></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src={{ asset('template/js/off-canvas.js') }}></script>
  <script src={{ asset('template/js/hoverable-collapse.js') }}></script>
  <script src={{ asset('template/js/template.js') }}></script>
  <!-- endinject -->
</body>

</html>
