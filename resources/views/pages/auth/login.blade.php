<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ transWord('BinBug | Login') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('uploads/favicon/favicon.png') }}" rel="icon">
  <link href="{{ asset('uploads/favicon/favicon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <link href="{{ asset('nice-admin/assets/vendor/bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('nice-admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @endif

  <link href="{{ asset('nice-admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('nice-admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('nice-admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('nice-admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('nice-admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('nice-admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  {{-- Toastr --}}
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Template Main CSS File -->
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <link href="{{ asset('nice-admin/assets/css/style-rtl.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('custom_css/font.css') }}">
    @else
        <link href="{{ asset('nice-admin/assets/css/style.css') }}" rel="stylesheet">
    @endif

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">{{ transWord('BinBug') }}</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">{{ transWord('Login to Your Account') }}</h5>
                    <p class="text-center small">{{ transWord('Enter your username & password to login') }}</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" action="{{ route('login.check') }}">
                    @csrf

                    <div class="form-group col-12">
                      <label for="email" class="form-label">{{ transWord('Username / Email') }}</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="email" required>
                      </div>
                      @error('email')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">{{ transWord('Password') }}</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">{{ transWord('Login') }}</button>
                    </div>
                  </form>

                  <div class="btn-group col-12 mt-4">
                    <button type="button" class="btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ transWord('Language') }}</button>
                    <ul class="dropdown-menu">
                      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{  $properties['native']  }}</a></li>
                      @endforeach
                    </ul>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('nice-admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('nice-admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('nice-admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('nice-admin/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('nice-admin/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('nice-admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('nice-admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('nice-admin/assets/vendor/php-email-form/validate.js') }}"></script>

  {{-- Jquery --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  {{-- Toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}";
        @if (LaravelLocalization::getCurrentLocale() == 'ar')
            toastr.options.positionClass = 'toast-top-left';
        @endif
        switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
        }
    @endif
  </script>

  <!-- Template Main JS File -->
  <script src="{{ asset('nice-admin/assets/js/main.js') }}"></script>

</body>

</html>
