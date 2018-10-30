
    <!-- /.navbar-top-links -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>

            <li>
                <a href="{{url('admin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            @if(Auth::user()->role_id <= 2)
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Category Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/category/add')}}">Add Category</a>
                    </li>
                    <li>
                        <a href="{{url('admin/category/manage')}}">Manage Category</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif
              @if(Auth::user()->role_id <= 2)
            <li>
                <a href="#"><i class="fa fa-gears  fa-fw"></i> Manufacturer<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/manufacturer/add')}}">Add Manufacturer</a>
                    </li>
                    <li>
                        <a href="{{url('admin/manufacturer/manage')}}">Manage Manufacturer</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif

              @if(Auth::user()->role_id <= 4)
            <li>
                <a href="#"><i class="glyphicon glyphicon-shopping-cart  "></i> Product<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/product/add')}}">Add Product</a>
                    </li>
                    <li>
                        <a href="{{url('admin/product/manage')}}">Manage Product</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif
            @if(Auth::user()->role_id <= 2)
          <li>
              <a href="#"><i class="fa fa-gears  fa-fw"></i> Banner<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                  <li>
                      <a href="{{url('admin/banner/add')}}">Add Banner</a>
                  </li>
                  <li>
                      <a href="{{url('admin/banner/manage')}}">Manage Banner</a>
                  </li>
              </ul>
              <!-- /.nav-second-level -->
          </li>
          @endif

            {{-- <li>
                <a href="#"><i class="glyphicon glyphicon-shopping-cart  "></i> Settings<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/password/change')}}">Password Change</a>
                    </li>
                    <li>
                        <a href="{{url('admin/manage/setting')}}">Manage Setting</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li> --}}

              @if(Auth::user()->role_id == 1)
            <li>
              <a href="{{url('admin/all-users')}}">User details</a>
            </li>
            @endif
            @if(Auth::user()->role_id <= 4)
            <li>
              <a href="{{url('admin/order-manange')}}"><i class="fa fa-edit fa-fw"></i> Orders</a>
            </li>
            <li>
              <a href="{{url('admin/contact-message')}}">Contact-Message</a>
            </li>
            @endif
            @if (!empty(Auth::user()->password))

            <li>
              <a href="{!! route('password.change') !!}">Password Change</a>
            </li>
          @else
            <li>
              <a href="{!! route('password.set') !!}">Set Password</a>
            </li>
          @endif
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="panels-wells.html">Panels and Wells</a>
                    </li>
                    <li>
                        <a href="buttons.html">Buttons</a>
                    </li>
                    <li>
                        <a href="notifications.html">Notifications</a>
                    </li>
                    <li>
                        <a href="typography.html">Typography</a>
                    </li>
                    <li>
                        <a href="icons.html"> Icons</a>
                    </li>
                    <li>
                        <a href="grid.html">Grid</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="blank.html">Blank Page</a>
                    </li>
                    <li>
                        <a href="login.html">Login Page</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
