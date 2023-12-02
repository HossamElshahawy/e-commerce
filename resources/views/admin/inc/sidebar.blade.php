<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

        <!-- Dashboard -->
        <li class="nav-item {{ Request::is('admin/dashboard*') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt nav-icon"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <!-- Category -->
        <li class="nav-item {{ Request::is('category*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('category*') ? 'active' : '' }}">
                <i class="fas fa-th-list nav-icon"></i>
                <p>
                    Category
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link {{ Request::is('admin/category/index') ? 'active' : '' }}">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>Show</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.create') }}" class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Add</p>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Brand -->
        <li class="nav-item {{ Request::is('admin/brand*') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.brand') }}" class="nav-link {{ Request::is('admin/brand*') ? 'active' : '' }}">
                <i class="fas fa-gem nav-icon"></i>
                <p>Brand</p>
            </a>
        </li>

        <!-- Product -->
        <li class="nav-item {{ Request::is('admin/products*') ? 'menu-open' : '' }}">
            <a href="{{ route('product.index') }}" class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}">
                <i class="fas fa-box nav-icon"></i>
                <p>Product</p>
            </a>
        </li>

        <!-- Orders -->
        <li class="nav-item {{ Request::is('admin/orders*') ? 'menu-open' : '' }}">
            <a href="{{ route('order.index') }}" class="nav-link {{ Request::is('admin/orders*') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart nav-icon"></i>
                <p>Orders</p>
            </a>
        </li>

        <!-- Color -->
        <li class="nav-item {{ Request::is('admin/colors*') ? 'menu-open' : '' }}">
            <a href="{{ route('color.index') }}" class="nav-link {{ Request::is('admin/colors*') ? 'active' : '' }}">
                <i class="fas fa-palette nav-icon"></i>
                <p>Color</p>
            </a>
        </li>

        <!-- Home Slider -->
        <li class="nav-item {{ Request::is('admin/sliders*') ? 'menu-open' : '' }}">
            <a href="{{ route('slider.index') }}" class="nav-link {{ Request::is('admin/sliders*') ? 'active' : '' }}">
                <i class="fas fa-sliders-h nav-icon"></i>
                <p>Home Slider</p>
            </a>
        </li>

        <!-- Users -->
        <li class="nav-item {{ Request::is('user*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                <i class="fas fa-users nav-icon"></i>
                <p>
                    Users
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item {{ Request::is('admin/users*') ? 'menu-open' : '' }}">
                    <a href="{{ route('user.index') }}" class="nav-link {{ Request::is('admin/users/index') ? 'active' : '' }}">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>Show</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.create') }}" class="nav-link {{ Request::is('admin/users/create') ? 'active' : '' }}">
                        <i class="fas fa-user-plus nav-icon"></i>
                        <p>Add</p>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Home Setting -->
        <li class="nav-item {{ Request::is('admin/setting*') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.setting') }}" class="nav-link {{ Request::is('admin/setting*') ? 'active' : '' }}">
                <i class="fas fa-cogs nav-icon"></i>
                <p>Home Setting</p>
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt nav-icon"></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
