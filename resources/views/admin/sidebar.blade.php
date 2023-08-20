<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{ Auth::user()->role_id == 1 ? '/admin' : '/expert' }}" class="brand-link">
        <img src="/assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Citrus</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ Auth::user()->role_id == 1 ? '/admin' : '/expert' }}" class="d-block">{{ Auth::user()->fullname }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 {{ Auth::user()->status == 0 ? 'disable_sidebar' : '' }}">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false" id="myDIV">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                @if (Auth::user()->role_id == 1)
                    <li class="nav-item">
                        <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Trang chủ
                            </p>
                        </a>
                    </li>

                    <li class="nav-item {{ (Request::is('admin/diseases/add') || Request::is('admin/diseases/list')) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ (Request::is('admin/diseases/add') || Request::is('admin/diseases/list')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-virus"></i>
                            <p>
                                {{ trans('sidebar.SIDEBAR_001') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/diseases/add" class="nav-link {{ Request::is('admin/diseases/add') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ trans('sidebar.SIDEBAR_002') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/diseases/list" class="nav-link {{ Request::is('admin/diseases/list') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ trans('sidebar.SIDEBAR_003') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ (Request::is('admin/therapies/add') || Request::is('admin/therapies/list')) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ (Request::is('admin/therapies/add') || Request::is('admin/therapies/list')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                {{ trans('sidebar.SIDEBAR_004') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/therapies/add" class="nav-link {{ Request::is('admin/therapies/add') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ trans('sidebar.SIDEBAR_005') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/therapies/list" class="nav-link {{ Request::is('admin/therapies/list') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ trans('sidebar.SIDEBAR_006') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ (Request::is('admin/products/add') || Request::is('admin/products/list')) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ (Request::is('admin/products/add') || Request::is('admin/products/list')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ trans('sidebar.SIDEBAR_007') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/products/add" class="nav-link {{ Request::is('admin/products/add') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ trans('sidebar.SIDEBAR_008') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/products/list" class="nav-link {{ Request::is('admin/products/list') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ trans('sidebar.SIDEBAR_009') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/users" class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                {{ trans('sidebar.SIDEBAR_010') }}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/approves" class="nav-link {{ Request::is('admin/approves') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-address-card"></i> 
                            <p>
                                 {{ trans('sidebar.SIDEBAR_011') }}
                            </p>
                        </a>
                    </li>

                @endif

                @if (Auth::user()->role_id == 2)
                    <li class="nav-item">
                        <a href="/expert" class="nav-link {{ Request::is('expert') ? 'active' : '' }}">
                            {{-- <i class="fa-solid fa-house"></i> --}}
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Trang chủ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ (Request::is('expert/stores') || Request::is('expert/stores/store-manager')) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('expert/stores') || Request::is('expert/stores/store-manager') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-archive"></i>
                            <p>
                                Cửa hàng 
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/expert/stores" class="nav-link {{ Request::is('expert/stores') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kho thuốc</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/expert/stores/store-manager" class="nav-link {{ Request::is('expert/stores/store-manager') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Quản lý cửa hàng</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="/expert/reports" class="nav-link {{ Request::is('expert/reports') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-id-card"></i>
                            <p>
                                Báo cáo
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/expert/orders" class="nav-link {{ Request::is('expert/orders') || Request::is('expert/orders/add') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-bell"></i>
                            <p>
                                Quản lý đơn hàng
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/expert/chat" class="nav-link {{ Request::is('expert/chat') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-comments"></i>
                            <p>
                                Trò chuyện
                            </p>
                        </a>
                    </li>

                    <li class="nav-item {{ (Request::is('expert/posts') || Request::is('expert/posts/all-post')) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('expert/posts') || Request::is('expert/posts/all-post') ? 'active' : '' }}">
                            <i class="fa fa-users"></i>
                            <p>
                                Cộng đồng
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/expert/posts" class="nav-link {{ Request::is('expert/posts') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bài viết của tôi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/expert/posts/all-post" class="nav-link {{ Request::is('expert/posts/all-post') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tất cả bài viết</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            {{-- <i class="fa-solid fa-house"></i> --}}
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                Cài đặt
                            </p>
                        </a>
                    </li>

                    
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
