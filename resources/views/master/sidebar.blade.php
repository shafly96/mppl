<header class="main-header">
  <!-- Logo -->
  <a href="{{url('')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>+</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Auto</b>+</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
  </nav>
</header>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="height:100vh !important;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" >
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{url('/')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        @if(Auth::user()->access_type == "admin")
        <p>Admin</p>
        @else
          @if(Auth::user()->access_type== "pegawai")
          <p>pegawai</p>
          @else
          <p>Pelanggan</p>
          @endif
          @endif
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
    @if(Auth::user()->access_type == "pelanggan")
      <li class="<?php if($active=='history') echo 'active' ?>">
        <a href="{{url('')}}/booking/tabel">
          <i class="fa fa-list-ul"></i> <span>History Service</span>
        </a>
      </li>
      @endif
      @if(Auth::user()->access_type == "pelanggan")
      <li class="<?php if($active=='pengecekan') echo 'active' ?>">
        <a href="{{url('')}}/spare-part/search">
          <i class="fa fa-list-ul"></i> <span>Pencarian Sparepart</span>
        </a>
      </li>
      @endif
      @if(Auth::user()->access_type == "pelanggan" || Auth::user()->access_type == "pegawai")
      <li class="<?php if($active=='konslutasi') echo 'active' ?>">
        <a href="{{url('')}}/konsultasi/show">
          <i class="fa fa-sticky-note-o"></i> <span>Konsultasi</span>
        </a>
      </li>
      @endif
      @if(Auth::user()->access_type == "pelanggan" || Auth::user()->access_type == "pegawai")
      <li class="<?php if($active=='booking') echo 'active' ?>">
        <a href="{{url('')}}/booking/form">
          <i class="fa fa-book"></i> <span>Booking Service</span>
        </a>
      </li>
      @endif
      @if( Auth::user()->access_type == "pegawai")
      <li class="treeview <?php if($active=='spare-part') echo 'active' ?>">
        <a href="#">
          <i class="fa fa-cogs"></i>
          <span>Spare Part</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($active2=='tabel') echo 'active' ?>"><a href="{{url('')}}/spare-part/tabel"><i class="fa fa-circle-o"></i> Tabel Data</a></li>
          <li class="<?php if($active2=='form') echo 'active' ?>"><a href="{{url('')}}/spare-part/insert"><i class="fa fa-circle-o"></i> Input Data</a></li>
        </ul>
      </li>
      @endif
      @if(Auth::user()->access_type == "admin")
      <li class="treeview <?php if($active=='transaksi') echo 'active' ?>">
        <a href="#">
          <i class="fa fa-exchange"></i>
          <span>Transaksi</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($active2=='tabel') echo 'active' ?>"><a href="{{url('')}}/transaksi/tabel"><i class="fa fa-circle-o"></i> Tabel Data</a></li>
          <li class="<?php if($active2=='form') echo 'active' ?>"><a href="{{url('')}}/transaksi/form"><i class="fa fa-circle-o"></i> Input Data</a></li>
        </ul>
      </li>
      @endif
      @if(Auth::user()->access_type == "admin")

      <li class="treeview <?php if($active=='service') echo 'active' ?>">
        <a href="#">
          <i class="fa fa-wrench"></i>
          <span>Service</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($active2=='tabel') echo 'active' ?>"><a href="{{url('')}}/service/tabel"><i class="fa fa-circle-o"></i> Tabel Data</a></li>
          <li class="<?php if($active2=='form') echo 'active' ?>"><a href="{{url('')}}/service/form"><i class="fa fa-circle-o"></i> Input Data</a></li>
        </ul>
      </li>
      @endif
      @if(Auth::user()->access_type == "admin")
      <li class="treeview <?php if($active=='konsumen') echo 'active' ?>">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Konsumen</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($active2=='tabel') echo 'active' ?>"><a href="{{url('')}}/konsumen/tabel"><i class="fa fa-circle-o"></i> Tabel Data</a></li>
          <li class="<?php if($active2=='form') echo 'active' ?>"><a href="{{url('')}}/konsumen/form"><i class="fa fa-circle-o"></i> Input Data</a></li>
        </ul>
      </li>
      @endif
      @if(Auth::user()->access_type == "admin")
      <li class="treeview <?php if($active=='pegawai') echo 'active' ?>">
        <a href="#">
          <i class="fa fa-male"></i>
          <span>Pegawai</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($active2=='tabel') echo 'active' ?>"><a href="{{url('')}}/pegawai/tabel"><i class="fa fa-circle-o"></i> Tabel Data</a></li>
          <li class="<?php if($active2=='form') echo 'active' ?>"><a href="{{url('')}}/pegawai/form"><i class="fa fa-circle-o"></i> Input Data</a></li>
        </ul>
      </li>
      @endif
      @if(Auth::user()->access_type == "admin")
      <li class="treeview <?php if($active=='jabatan') echo 'active' ?>">
        <a href="#">
          <i class="fa fa-male"></i>
          <span>Jabatan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($active2=='tabel') echo 'active' ?>"><a href="{{url('')}}/jabatan/tabel"><i class="fa fa-circle-o"></i> Tabel Data</a></li>
          <li class="<?php if($active2=='form') echo 'active' ?>"><a href="{{url('')}}/jabatan/form"><i class="fa fa-circle-o"></i> Input Data</a></li>
        </ul>
      </li>
      @endif
      @if(Auth::user()->access_type == "admin")
      <li class="<?php if($active=='report') echo 'active' ?>">
        <a href="{{url('/')}}/transaksi/report">
          <i class="fa fa-list-alt"></i> <span>Report Bulanan</span>
        </a>
      </li>
      @endif
      <li>
        <a href="{{url('/')}}/logout">
          <i class="fa fa-arrow-left"></i> <span>Logout</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
