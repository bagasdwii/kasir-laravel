<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">

        <li class="nav-item ">
            <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/karyawan" class="nav-link {{ request()->is('karyawan') ? 'active' : '' }}">
                <i class="nav-icon far fa-user"></i>
                <p>
                    Karyawan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/barang" class="nav-link {{ request()->is('barang') ? 'active' : '' }}">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                    Barang
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/supplier" class="nav-link {{ request()->is('supplier') ? 'active' : '' }}">
                <i class="nav-icon fas fa-store"></i>
                <p>
                    Supplier
                </p>
            </a>
        </li>
        {{--  <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Barang <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Barang</p>
                    </a>
                </li>
            </ul>
        </li>--}}
        <li class="nav-item">
            <form id="logout-form" action="/logout" method="POST">
                @csrf
                <button type="submit" class="nav-link btn-danger text-left">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </button>
            </form>
        </li>
</nav>