<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>@yield('page_title')</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="{{ asset('uploads/favicon/favicon.png') }}" rel="icon">
<link href="{{ asset('uploads/favicon/favicon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

{{-- Sweet Alert --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.min.css" integrity="sha512-yX1R8uWi11xPfY7HDg7rkLL/9F1jq8Hyiz8qF4DV2nedX4IVl7ruR2+h3TFceHIcT5Oq7ooKi09UZbI39B7ylw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- Jquery Datatable --}}
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

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


@if (LaravelLocalization::getCurrentLocale() == 'ar')
    <link href="{{ asset('nice-admin/assets/vendor/simple-datatables/style-ar.css') }}" rel="stylesheet">
    <link href="{{ asset('nice-admin/assets/css/style-rtl.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('custom_css/font.css') }}">
@else
    <link href="{{ asset('nice-admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('nice-admin/assets/css/style.css') }}" rel="stylesheet">
@endif

{{-- Toastr --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

{{-- Custom CSS --}}
<link rel="stylesheet" href="{{ asset('custom_css/style.css') }}">

@yield('css')
