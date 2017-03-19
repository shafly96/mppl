<!DOCTYPE html>
<html>
  <head>
    <title>Auto +</title>
    @include('master.head')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" style="background-color: #ecf0f5 !important;">

      @include('master.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
          @yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>5114100105 - 5114100114 - 5114100166</strong>
      </footer>
    </div><!-- ./wrapper -->
  </body>
</html>
