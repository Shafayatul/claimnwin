<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
  <!--left-fixed -navigation-->
  <aside class="sidebar-left">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> Glance<span class="dashboard_text">Design dashboard</span></a></h1>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
              <i class="fa fa-laptop"></i>
              <span>Manage Airline</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ URL::to('/airlines/create') }}"><i class="fa fa-angle-right"></i> Add Airline</a></li>
                <li><a href="{{ URL::to('/airlines') }}"><i class="fa fa-angle-right"></i> Manage Airline</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
              <i class="fa fa-plane-departure"></i>
              <span>Manage Airport</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{URL::to('/airports/create')}}"><i class="fa fa-angle-right"></i> Add Airport</a></li>
                <li><a href="{{URL::to('/airports')}}"><i class="fa fa-angle-right"></i> Manage Airport</a></li>
              </ul>
            </li>
            <li class="treeview">
            <a href="#">
            <i class="fa fa-university"></i>
            <span>Bank Accounts</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{URL::to('/bank-accounts/create')}}"><i class="fa fa-angle-right"></i> Add Bank Account</a></li>
                <li><a href="{{URL::to('/bank-accounts')}}"><i class="fa fa-angle-right"></i> Manage Bank Account</a></li>
            </ul>
            </li>
            {{-- <li><a href="login.html"><i class="fa fa-money-check-alt"></i> Manage Currency</a></li> --}}
            <li class="treeview">
            <a href="#">
            <i class="fa fa-money-check-alt"></i>
            <span>Currency</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{URL::to('/currency/create')}}"><i class="fa fa-angle-right"></i> Add Currency</a></li>
                <li><a href="{{URL::to('/currency')}}"><i class="fa fa-angle-right"></i> Manage Currency</a></li>
            </ul>
            </li>

            <li class="treeview">
            <a href="#">
            <i class="fa fa-money-check-alt"></i>
            <span>Role</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{url('/admin/role/create')}}"><i class="fa fa-angle-right"></i> Add Role</a></li>
            <li><a href="{{url('/admin/role')}}"><i class="fa fa-angle-right"></i> Role List</a></li>
            </ul>
            </li>
            {{-- <li><a href="login.html"><i class="fa fa-university"></i> Manage Bank Account</a></li> --}}
            <li><a href="login.html"><i class="fa fa-bell"></i> Manage Reminders</a></li>
            <li class="treeview">
              <a href="#">
              <i class="fa fa-users"></i>
              <span>Manage User</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{route('role.assign')}}"><i class="fa fa-angle-right"></i>User List</a></li>
              </ul>
            </li>
            <li><a href="login.html"><i class="fa fa-pie-chart"></i> Manage Affiliation Report</a></li>
            <li><a href="login.html"><i class="fa fa-table"></i> Reporting</a></li>
            <li class="treeview">
              <a href="#">
              <i class="fa fa-cog"></i>
              <span>Claim Status</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{URL::to('/claim-status/create')}}"><i class="fa fa-angle-right"></i> Add Claim Status</a></li>
              <li><a href="{{URL::to('/claim-status')}}"><i class="fa fa-angle-right"></i> Manage claim Status</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
              <i class="fa fa-cog"></i>
              <span>Next Step</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{URL::to('/next-step/create')}}"><i class="fa fa-angle-right"></i> Add Next Step</a></li>
              <li><a href="{{URL::to('/next-step')}}"><i class="fa fa-angle-right"></i> Manage Next Step</a></li>
              </ul>
            </li>
            {{-- <li class="treeview">
              <a href="#">
              <i class="fa fa-cog"></i>
              <span>Manage Settings</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="grids.html"><i class="fa fa-angle-right"></i> Manager Settings</a></li>
                <li><a href="media.html"><i class="fa fa-angle-right"></i> Manage claim Status</a></li>
                <li><a href="media.html"><i class="fa fa-angle-right"></i> Manage Next Step</a></li>
              </ul>
            </li> --}}
          </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
  </aside>
</div>
