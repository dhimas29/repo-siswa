<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <!-- <a class="nav-link" data-toggle="dropdown" href="#"> -->
            <a class="navbar-brand" data-toggle="dropdown" href="#">
                <?php
                // $query = mysqli_query($conn, "SELECT * FROM tb_siswa where id = '$_SESSION[id]'");
                // $cek = mysqli_num_rows($query);
                // if ($cek > 0) {
                //     while ($array = mysqli_fetch_array($query)) {
                //         $photo = $array['photo'];
                //     }
                // } else {
                //     $photo = "avatar.png";
                // }
                ?>
                <?php if ($_SESSION['level'] == 'guru') : ?>
                    <span class="brand-text font-weight-light"><?= ucwords($_SESSION['nama_guru']); ?></span>
                <?php endif; ?>
                <?php if ($_SESSION['level'] == 'admin') : ?>
                    <span class="brand-text font-weight-light"><?= ucwords($_SESSION['nama']); ?></span>
                <?php endif; ?>
                <img src="<?php echo "../assets/dist/img/avatar.png" ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="30">
            </a>
            <!-- </a> -->
            <div class="dropdown-menu">
                <!-- <a href="#" class="dropdown-item">
                    Pengaturan Akun
                </a>
                <div class="dropdown-divider"></div> -->
                <a href="../proses_logout.php" class="dropdown-item">
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>