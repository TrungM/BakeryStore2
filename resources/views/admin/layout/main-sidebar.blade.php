<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('user/images/logo.png') }}" alt="" style="color:#fd7e14; width:20%">
        {{-- <i class="fa-solid fa-cake-candles" ></i> --}}
        <span class="brand-text font-weight-light">Bakery Store</span>
    </a>
    {{-- #be9c79 --}}
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
                <img src="{{ asset('admin/img/' . Session::get('profile_admin_img')) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @if (Session::has('username_admin'))
                        <p>{{ session('username_admin') }}</p>
                    @endif


                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Admin-Feature
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    System Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" >
                                <li class="nav-item">
                                    <a href="{{ URL::to('admin/statistics') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Statistics</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Order management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ URL::to('admin/manager_order') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Order</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Account management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ URL::to('admin/profile/5') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ URL::to('admin/customer') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Customer</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Product management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/adminproduct') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Product </p>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/size') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> List Size </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Blog management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ URL::to('admin/list-post') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List News </p>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ URL::to('admin/post') }}  " class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Post News</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Other Options
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ URL::to('admin/comment_admin') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Comment</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ URL::to('admin/feedback_admin') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Feedback</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
