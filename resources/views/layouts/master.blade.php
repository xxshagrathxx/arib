<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.include.header_scripts')
</head>

<body>

  @include('layouts.include.header')

  @include('layouts.include.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav>
        {{-- <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol> --}}
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-12">
            @yield('content')
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  @include('layouts.include.footer')

</body>

</html>
