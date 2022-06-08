<?php
function active($currect_page){
    $url_array = explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if($currect_page == $url){
        echo 'active'; //class name in css
    }
}
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index.php" class="brand-link">
                <span class="brand-text font-weight-light">Mahasiswa</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">MENU</li>
                        <li class="nav-item menu-open">
                            <a href="index.php" class="nav-link <?php active ('index.php');?>">
                                <p>
                                    Data Mahasiswa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="tambah.php" class="nav-link <?php active ('tambah.php');?>">
                                <p>
                                    Tambah Data
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>