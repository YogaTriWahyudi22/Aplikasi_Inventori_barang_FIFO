<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if (Auth::user()->status == 'admin')

            <li class="nav-item has-treeview">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kelola_ikan') }}" class="nav-link">
                    <i class="fas fa-fish mr-1 ml-1"></i>
                    <p>
                        Kelola Ikan
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kelola_stok') }}" class="nav-link">
                    <i class="fas fa-boxes ml-1 mr-1"></i>
                    <p>
                        Kelola Stok
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kelola_penjualan') }}" class="nav-link">
                    <i class="fas fa-balance-scale ml-1 mr-1"></i>
                    <p>
                        Penjualan
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-tasks ml-1 mr-1"></i>
                    <p>
                        Laporan Akhir
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('laporan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon ml-1 mr-1"></i>
                            <p>
                                Laporan Akhir
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('laporan_expired') }}" class="nav-link">
                            <i class="far fa-circle nav-icon ml-1 mr-1"></i>
                            <p>Laporan Expired</p>
                        </a>
                    </li>
                </ul>
            </li>


        @endif

        @if (Auth::user()->status == 'pimpinan')
            <li class="nav-item has-treeview">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
                <a href="{{ route('kelola_akun') }}" class="nav-link mr-1">
                    &nbsp;<i class="fas fa-users mr-2"></i>
                    <p>
                        Kelola Akun
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Laporan Akhir
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('laporan') }}" class="nav-link">
                            <i class="fas fa-cart-plus ml-1 mr-1"></i>
                            <p>
                                Laporan Akhir
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('laporan_expired') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Expired</p>
                        </a>
                    </li>

                </ul>
            </li>
        @endif
    </ul>
</nav>
