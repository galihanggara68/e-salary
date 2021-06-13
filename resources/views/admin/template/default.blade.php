<!DOCTYPE html>
<html>

    @include('admin.template.partials.head')

<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.template.partials.navbar')

  <!-- Left side column. contains the logo and sidebar -->
    @include('admin.template.partials.sidebar')
  {{--  --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    @yield('content')

  </div>
  {{--  --}}

  <!-- /.content-wrapper -->
  @include('admin.template.partials.footer')
  {{--  --}}
  
</div>
<!-- ./wrapper -->

    @include('admin.template.partials.script')

</body>
</html>
