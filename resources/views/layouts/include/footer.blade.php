  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span><a href="https://profile.binbug.net" target="_blank">BinBug</a></span></strong>. All Rights Reserved
    </div>
  </footer>

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

  <!-- Template Main JS File -->
  <script src="{{ asset('nice-admin/assets/js/main.js') }}"></script>

  {{-- Google scripts --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

  {{-- Jquery --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  {{-- Sweet alert --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.min.js"></script>

  {{-- Toastr --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  {{-- Datatable --}}
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

  {{-- FA Icons V6 --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

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

    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <script src="{{ asset('custom_js/sweet_alert_delete_ar.js') }}"></script>
    @else
        <script src="{{ asset('custom_js/sweet_alert_delete.js') }}"></script>
    @endif



  @yield('js')

  <!-- End Footer -->
