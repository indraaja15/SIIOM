<?php
function active($currect_page)
{
    $url_array = explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($currect_page == $url) {
        echo 'active'; //class name in css
    }
}

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ url('') }}/images/logoPoliban.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIIOM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @guest
                    <li class="nav-item">
                        <a href="/" class="nav-link <?php active('/'); ?>">
                            <i class="nav-icon bi bi-house-fill"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                @endguest
                {{-- sortir hak akses --}}
                @auth
                    @if (auth()->user()->hak_akses == 'admin')
                        <li class="nav-item">
                            <a href="siiom.tami2022.my.id" class="nav-link <?php active('siiom.tami2022.my.id'); ?>">
                                <i class="nav-icon bi bi-house-fill"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" id="ac" class="nav-link">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>
                                    Organisasi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ '../../ormawa' }}" class="nav-link <?php active('ormawa'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Organisasi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="../../admin" class="nav-link <?php active('admin'); ?>">
                                <i class="nav-icon bi bi-people"></i>
                                <p>
                                    Tambah Admin
                                </p>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/" class="nav-link <?php active(''); ?>">
                                <i class="nav-icon bi bi-house-fill"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" id="ac" class="nav-link">
                                <i class="nav-icon bi bi-box-seam"></i>
                                <p>
                                    Barang
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ '../../barang' }}" class="nav-link <?php active('barang'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Barang</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ '../../ormawaLain' }}" class="nav-link <?php active('ormawaLain'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Barang Ormawa Lain</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" id="ac" class="nav-link">
                                <i class="nav-icon bi bi-archive"></i>
                                <p>
                                    Peminjaman
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ '../../peminjaman' }}" class="nav-link <?php active('peminjaman'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Peminjaman</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('../../pilihormawa') }}" class="nav-link <?php active('pilihormawa'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Peminjaman Barang</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('../../konfirmasi') }}" class="nav-link <?php active('konfirmasi'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Konfirmasi</p>
                                    </a>
                                </li>
                            </ul>
                            
                        </li>
                        <li class="nav-item">
                            <a href="#" id="ac" class="nav-link">
                                <i class="nav-icon bi bi-hdd-stack-fill"></i>
                                <p>
                                    Kategori
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ '../../kategori' }}" class="nav-link <?php active('kategori'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Kategori</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth
            </ul>
        </nav>
    </div>
</aside>
