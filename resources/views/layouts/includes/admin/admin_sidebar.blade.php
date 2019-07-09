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
          <h1><a class="navbar-brand" href="{{url('/home')}}"><span class="fa fa-area-chart"></span> CLAIM'N WIN<span class="dashboard_text">Admin dashboard</span></a></h1>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="sidebar-menu">
            {{-- <li class="header">MAIN NAVIGATION</li> --}}
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
                <i class="fa fa fa-plane"></i>
                <span>Flights</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                <li><a href="{{URL::to('/flights/create')}}"><i class="fa fa-angle-right"></i> Add Flights</a></li>
                <li><a href="{{URL::to('/flights')}}"><i class="fa fa-angle-right"></i> Manage Flights</a></li>
                </ul>
            </li>

            <li class="treeview">
            <a href="#">
            <i class="fa fa-money-check-alt"></i>
            <span>Claim</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{url('/manage-claim')}}"><i class="fa fa-angle-right"></i> Manage Claim</a></li>
            {{-- <li><a href="{{url('/manage-unfinished-claim')}}"><i class="fa fa-angle-right"></i> Manage Unfinished Claim</a></li> --}}
            {{-- <li><a href="{{url('/manage-fills-claim')}}"><i class="fa fa-angle-right"></i> Manage Fills Claim</a></li> --}}
            <li><a href="{{url('/archive-manage-claim')}}"><i class="fa fa-angle-right"></i> Archive Claims</a></li>
            </ul>
            </li>

            <li class="treeview">
            <a href="#">
            <i class="fa fa-university"></i>
            <span>Email templates</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{URL::to('/email-templates/create')}}"><i class="fa fa-angle-right"></i> Add Email templates</a></li>
                <li><a href="{{URL::to('/email-templates')}}"><i class="fa fa-angle-right"></i> Manage Email templates</a></li>
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
            {{-- @hasrole('Super Admin') --}}
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
            {{-- @endhasrole --}}
            {{-- <li><a href="login.html"><i class="fa fa-university"></i> Manage Bank Account</a></li> --}}
        <li><a href="{{url('/reminders')}}"><i class="fa fa-bell"></i> Manage Reminders</a></li>
            <li class="treeview">
              <a href="#">
              <i class="fa fa-users"></i>
              <span>Manage User</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{url('/admin-user')}}"><i class="fa fa-angle-right"></i>Add Admin User</a></li>
              <li><a href="{{route('role.assign')}}"><i class="fa fa-angle-right"></i>User List</a></li>
              </ul>
            </li>

            {{-- @hasrole('Super Admin') --}}
            <li><a href="{{url('/activity/index')}}"><i class="fa fa-pie-chart"></i> Activity Log</a></li>
            {{-- @endhasrole --}}
            <li><a href="{{url('/manage-report')}}"><i class="fa fa-table"></i> Reporting</a></li>


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
                    <span>Affiliate</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('/affiliates')}}"><i class="fa fa-angle-right"></i> Manage Affiliate</a></li>
                    {{-- <li><a href="{{url('/manage-affiliate')}}"><i class="fa fa-pie-chart"></i> Manage Affiliation Report</a></li> --}}
                    {{-- <li><a href="{{URL::to('')}}"><i class="fa fa-angle-right"></i> Manage claim Status</a></li> --}}
                </ul>
            </li>

            {{-- <li class="treeview">
              <a href="#">
              <i class="fa fa-cog"></i>
              <span>Next Step</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{URL::to('/next-step/create')}}"><i class="fa fa-angle-right"></i> Add Next Step</a></li>
              <li><a href="{{URL::to('/next-step')}}"><i class="fa fa-angle-right"></i> Manage Next Step</a></li>
              </ul>
            </li> --}}

            <li class="treeview">
              <a href="#">
              <i class="fa fa-cog"></i>
              <span>Settings</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{URL::to('/settings/create')}}"><i class="fa fa-angle-right"></i> Add Settings</a></li>
              <li><a href="{{URL::to('/settings')}}"><i class="fa fa-angle-right"></i> Manage Settings</a></li>
              </ul>
            </li>
            {{-- @hasrole('Super Admin') --}}
            {{-- <li><a href="{{url('/tickets')}}"><i class="fa fa-ticket-alt"></i> Manage Tickets</a></li> --}}
            {{-- @endhasrole --}}

            <li><a href="{{url('/tickets-inbox')}}"><i class="fa fa-ticket-alt"></i>Tickets Inbox</a></li>

            <li><a href="{{url('/my-tickets')}}"><i class="fa fa-ticket-alt"></i> My Tickets</a></li>

            <li><a href="{{url('/contact-messages')}}"><i class="fa fa-envelope"></i> Contact Messages</a></li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-cog"></i>
                <span>Blogs</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                <li><a href="{{URL::to('/admin/posts/create/blog')}}"><i class="fa fa-angle-right"></i> Add Blog</a></li>
                <li><a href="{{URL::to('/admin/posts/blog')}}"><i class="fa fa-angle-right"></i> Manage Blog</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-cog"></i>
                <span>Pages</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                <li><a href="{{URL::to('/admin/posts/create/page')}}"><i class="fa fa-angle-right"></i> Add Page</a></li>
                <li><a href="{{URL::to('/admin/posts/page')}}"><i class="fa fa-angle-right"></i> Manage Page</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-cog"></i>
                <span>Faqs</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                <li><a href="{{URL::to('/faqs/create')}}"><i class="fa fa-angle-right"></i> Add Faq</a></li>
                <li><a href="{{URL::to('faqs')}}"><i class="fa fa-angle-right"></i> Manage Faq</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i>
                        <span>Reviews</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('/reviews/create')}}"><i class="fa fa-angle-right"></i> Add Review</a></li>
                    <li><a href="{{URL::to('reviews')}}"><i class="fa fa-angle-right"></i> Manage Review</a></li>
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
