<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>

        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
           <i class="fa fa-circle text-success"></i> Online
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!--<li class="header">MAIN NAVIGATION</li> -->

        <li class="{{ Route::currentRouteNamed('admin.dashboard')? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="{{ Route::currentRouteNamed('admin.employee.index')? 'active' : '' }}">
          <a href="{{ route('admin.employee.index') }}">
            <i class="fa fa-users"></i> <span>Karyawan</span>
          </a>
        </li>

        <li class="{{ Route::currentRouteNamed('admin.department.index')? 'active' : '' }}">
          <a href="{{ route('admin.department.index') }}">
            <i class="fa fa-building"></i> <span>Department</span>
          </a>
        </li>

        <li class="{{ Route::currentRouteNamed('admin.position.index')? 'active' : '' }}">
            <a href="{{ route('admin.position.index') }}">
                <i class="fa fa-black-tie"></i> <span>Jabatan</span>
            </a>
        </li>

        <li class="{{ Route::currentRouteNamed('admin.group.index')? 'active' : '' }}">
            <a href="{{ route('admin.group.index') }}">
                <i class="fa fa-suitcase"></i> <span>Golongan</span>
            </a>
        </li>

        <li class="{{ Route::currentRouteNamed('admin.attendance.index')? 'active' : '' }}">
          <a href="{{ route('admin.attendance.index') }}">
            <i class="fa fa-file"></i> <span> Absensi</span>
          </a>
        </li>

        <li class="{{ Route::currentRouteNamed('admin.salary.index')? 'active' : '' }}">
          <a href="{{ route('admin.salary.index') }}">
            <i class="fa fa-money"></i> <span> Penggajian </span>
          </a>
        </li>

        <li class=" ">
          <a href="{{ route('admin.complain.index') }}">
            <i class="fa fa-database"></i> <span>Laporan</span>
          </a>
        </li>

        <li class="treeview {{ Route::currentRouteNamed('admin.user.index') || Route::currentRouteNamed('admin.user.employee')? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-file-archive-o"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.user.index') }}"><i class="fa fa-list-alt"></i> Admin</a></li>
            <li><a href="{{ route('admin.user.employee') }}"><i class="fa fa-list-alt"></i> Karyawan</a></li>
          </ul>
        </li>

       <!-- <li class="header">MENU</li> -->
        <li>
          <a href="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fa fa-sign-out"></i> Log Out</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
