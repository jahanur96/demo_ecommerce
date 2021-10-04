<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name'); }} | {{ $title??'' }}</title>
  <!-- jQuery -->
  <script src="{{ asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/fontawesome-free/css/all.min.css">
   <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
 <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- end data table -->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="{{ asset('public/backend/plugins/toastr/toastr.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('public/backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}
  @guest

  @else

 
  <!-- Navbar -->
  @include('layouts.admin.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.admin.partials.sidebar')
  @endguest
  <!-- Content Wrapper. Contains page content -->
  @yield('admin_content')
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/backend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('public/backend') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('public/backend') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('public/backend') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/backend') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/backend') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('public/backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/backend') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/backend') }}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
@stack('script')

<script src="{{ asset('public/backend') }}/dist/js/pages/dashboard.js"></script>
<script src="{{ asset('public/backend/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/sweetalert/sweetalert.min.js') }}"></script>
 <!--  data table  -->
 <script src="{{ asset('public/backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="{{ asset('public/backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="{{ asset('public/backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="{{ asset('public/backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="{{ asset('public/backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="{{ asset('public/backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="{{ asset('public/backend') }}/plugins/jszip/jszip.min.js"></script>
 <script src="{{ asset('public/backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="{{ asset('public/backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="{{ asset('public/backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="{{ asset('public/backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="{{ asset('public/backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <script>
 $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();   
     });
 </script>
 <script>
     $(function () {
         $("#example1").DataTable({
         "responsive": true, "lengthChange": false, "autoWidth": false,
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
         $('#example2').DataTable({
         "paging": true,
         "lengthChange": false,
         "searching": false,
         "ordering": true,
         "info": true,
         "autoWidth": false,
         "responsive": true,
         });
     });
 </script>
<script>
  $(document).on("click","#delete",function(e){
      e.preventDefault()
      var link = $(this).attr("href");
      swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
          window.location.href = link;
          swal("Ok! Your  file has been deleted!", {
          icon: "success",
          
          });
      } else {
          swal("Your file is safe!");
      }
      });
  });
</script>
@if (Session::has('message'))
<script>
var type = "{{ Session::get('alert-type', 'info') }}";
switch(type){
  case 'info':
      toastr.info("{{ Session::get('message') }}");
      break;

  case 'warning':
      toastr.warning("{{ Session::get('message') }}");
      break;

  case 'success':
      toastr.success("{{ Session::get('message') }}");
      break;

  case 'error':
      toastr.error("{{ Session::get('message') }}");
      break;
}

</script>
@endif
</body>

<!-- Mirrored from adminlte.io/themes/v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Oct 2021 12:23:20 GMT -->
</html>
