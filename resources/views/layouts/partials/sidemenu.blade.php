<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! asset('assets/dist/img/avatar04.png') !!}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Main Menu</li>
            <li class="@yield('panel-active') treeview">
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Control Panel</span>
                </a>
            </li>
            <li class="@yield('admin-active') treeview">
                <a href="">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admins')}}"><i class="fa fa-circle-o"></i> Admins</a></li>
                    <li><a href="{{route('users')}}"><i class="fa fa-circle-o"></i> Customers</a></li>
                </ul>
            </li>
            <li class="@yield('languages-active') treeview">
                <a href="{{ route('languages') }}">
                    <i class="fa fa-language"></i> <span>Languages</span>
                </a>
            </li>
            <li class="@yield('products-active') treeview">
                <a href="{{ route('products') }}">
                    <i class="fa fa-product-hunt"></i> <span>Products</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
