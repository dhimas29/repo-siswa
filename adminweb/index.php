<?php require_once('../koneksi.php'); ?>
<?php session_start(); ?>
<?php include('../layouts/header.php'); ?>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php include('../layouts/navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('../layouts/sidebar.php'); ?>
        <!-- Sidebar Menu -->

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            <?php
                            if (empty($_GET['page'])) {
                                echo "Dashboard";
                            } else {
                                echo ucwords($_GET['page']);
                            } ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">
                                <?php
                                if (empty($_GET['page'])) {
                                    echo "Dashboard";
                                } else {
                                    echo ucwords($_GET['page']);
                                } ?>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <?php
        if (empty($_GET['page'])) {
            $url = "dashboard";
        } else {
            $url = $_GET['page'];
        }
        // var_dump($url);
        switch ($url) {
            case null:
                include 'dashboard.php';
                break;
            case 'dashboard':
                include 'dashboard.php';
                break;
            case 'user':
                include 'user.php';
                break;
            case 'siswa':
                include 'siswa.php';
                break;
            case 'kelas':
                include 'kelas.php';
                break;
            case 'guru':
                include 'guru.php';
                break;
            case 'laporan':
                include 'laporan.php';
                break;
            case 'kriteria':
                include 'kriteria/index.php';
                break;
            case 'tambah_kriteria':
                include 'kriteria/tambah.php';
                break;
            case 'raport':
                include 'raport/index.php';
                break;
            case 'tambah_raport':
                include 'raport/tambah.php';
                break;
            case 'ubah_raport':
                include 'raport/ubah.php';
                break;
            case 'nilai':
                include 'nilai/index.php';
                break;
            case 'tambah_nilai':
                include 'nilai/tambah.php';
                break;
            case 'hasil':
                include 'metode/index.php';
                break;
                // case 'nilai_ternomalisasi':
                //     include 'metode/nilai_ternomalisasi.php';
                //     break;
            default:
                include '404.php';
        }

        ?>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

    <?php include('../layouts/footer.php'); ?>