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
        <li class="nav-item {{ request()->is('pembelian', 'retur', 'penjualan', 'laporan') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                    Transaksi <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/pembelian" class="nav-link {{ request()->is('pembelian') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pembelian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/retur" class="nav-link {{ request()->is('retur') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Retur</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/penjualan" class="nav-link {{ request()->is('penjualan') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Penjualan</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ request()->is('laporanpembelian', 'laporanpenjualan') ? 'menu-is-opening menu-open' : ''  }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Laporan<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/laporanpembelian" class="nav-link {{ request()->is('laporanpembelian') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Pembelian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporanpenjualan" class="nav-link {{ request()->is('laporanpenjualan') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Penjualan</p>
                    </a>
                </li>
            </ul>
        </li>

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