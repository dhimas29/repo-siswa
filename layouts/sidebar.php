<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SDN UTAN 01 </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ucwords($_SESSION['username']); ?></a>
            </div>
        </div> -->
        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <?php
                    if (empty($_GET['page'])) {
                        $url = 'dashboard';
                    } else {
                        $url = $_GET['page'];
                    }
                    $pecah = $url;
                    if ($pecah == 'dashboard') {
                    ?>
                        <a href="index.php?page=dashboard" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=dashboard" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if (($pecah == 'user') || ($pecah == 'kriteria') || ($pecah == 'siswa') || ($pecah == 'guru') || ($pecah == 'kelas') || ($pecah == 'lowongan')) { ?>
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Manajemen
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                        <?php } else {
                        ?>
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Manajemen
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                            <?php } ?>
                            <?php if ($_SESSION['level'] == 'admin') : ?>
                                <li class="nav-item">
                                    <?php if ($pecah == 'user') {
                                    ?>
                                        <a href="index.php?page=user" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=user" class="nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Manajemen User
                                            </p>
                                            </a>
                                </li>
                                <li class="nav-item">
                                    <?php if ($pecah == 'kelas') {
                                    ?>
                                        <a href="index.php?page=kelas" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=kelas" class="nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Manajemen Kelas
                                            </p>
                                            </a>
                                </li>
                                <li class="nav-item">
                                    <?php if ($pecah == 'guru') {
                                    ?>
                                        <a href="index.php?page=guru" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=guru" class="nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Manajemen Guru
                                            </p>
                                            </a>
                                </li>
                                <li class="nav-item">
                                    <?php if ($pecah == 'kriteria') {
                                    ?>
                                        <a href="index.php?page=kriteria" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=kriteria" class="nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Manajemen Kriteria
                                            </p>
                                            </a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <?php if ($pecah == 'siswa') {
                                ?>
                                    <a href="index.php?page=siswa" class="nav-link active">
                                    <?php } else { ?>
                                        <a href="index.php?page=siswa" class="nav-link">
                                        <?php } ?>
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Manajemen Siswa
                                        </p>
                                        </a>
                            </li>
                            </ul>
                </li>
                <!-- <li class="nav-item">
                    <?php if ($pecah == 'profile') {
                    ?>
                        <a href="index.php?page=profile" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=profile" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Pengaturan Akun
                            </p>
                            </a>
                </li> -->
                <li class="nav-item">
                    <?php if (($pecah == 'raport') || ($pecah == 'nilai') || ($pecah == 'hasil')) { ?>
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>
                                Metode TOPSIS
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                        <?php } else { ?>
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-calculator"></i>
                                <p>
                                    Metode TOPSIS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                            <?php } ?>
                            <li class="nav-item">
                                <?php if ($pecah == 'raport') {
                                ?>
                                    <a href="index.php?page=raport" class="nav-link active">
                                    <?php } else { ?>
                                        <a href="index.php?page=raport" class="nav-link">
                                        <?php } ?>
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Nilai Raport
                                        </p>
                                        </a>
                            </li>
                            <li class="nav-item">
                                <?php if ($pecah == 'nilai') {
                                ?>
                                    <a href="index.php?page=nilai" class="nav-link active">
                                    <?php } else { ?>
                                        <a href="index.php?page=nilai" class="nav-link">
                                        <?php } ?>
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Kriteria Penilaian
                                        </p>
                                        </a>
                            </li>
                            <?php if ($_SESSION['level'] == 'guru') : ?>
                                <li class="nav-item">
                                    <?php if ($pecah == 'hasil') {
                                    ?>
                                        <a href="index.php?page=hasil&tab=nilai_matriks" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=hasil&tab=nilai_matriks" class=" nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Hasil Perhitungan
                                            </p>
                                            </a>
                                </li>
                            <?php endif; ?>
                            </ul>
                </li>
                <!-- <li class="nav-item">
                    <?php if ($pecah == 'laporan') {
                    ?>
                        <a href="index.php?page=laporan" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=laporan" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Laporan
                            </p>
                            </a>
                </li> -->
            </ul>
        </nav>