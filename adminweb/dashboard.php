<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php
                        if (isset($_SESSION['id_kelas'])) {
                            $query = mysqli_query($conn, "SELECT *,count(*) as total FROM tb_siswa where id_kelas ='$_SESSION[id_kelas]'");
                        } else {
                            $query = mysqli_query($conn, "SELECT *,count(*) as total FROM tb_siswa");
                        }
                        while ($row = mysqli_fetch_array($query)) { ?>
                            <h3><?php echo $row['total'] ?></h3>
                            <p>Jumlah Siswa</p>
                        <?php } ?>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="index.php?page=siswa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <?php if ($_SESSION['level'] == 'admin') : ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php $query = mysqli_query($conn, "SELECT *,count(*) as total FROM tb_guru");
                            while ($row = mysqli_fetch_array($query)) { ?>
                                <h3><?php echo $row['total'] ?></h3>
                                <p>Jumlah Guru</p>
                            <?php } ?>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="index.php?page=guru" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php $query = mysqli_query($conn, "SELECT *,count(*) as total FROM tb_kelas");
                            while ($row = mysqli_fetch_array($query)) { ?>
                                <h3><?php echo $row['total'] ?></h3>
                                <p>Jumlah Kelas</p>
                            <?php } ?>
                        </div>
                        <div class="icon">
                            <i class="ion ion-home"></i>
                        </div>
                        <a href="index.php?page=kelas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php $query = mysqli_query($conn, "SELECT *,count(*) as total FROM tb_kriteria");
                            while ($row = mysqli_fetch_array($query)) { ?>
                                <h3><?php echo $row['total'] ?></h3>
                                <p>Jumlah Kriteria</p>
                            <?php } ?>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="index.php?page=kriteria" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php endif; ?>
            <!-- ./col -->
        </div>
        <?php if ($_SESSION['level'] == 'guru') : ?>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="icon fas fa-info"></i> Pemberitahuan!
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <!-- <h5><i class="icon fas fa-info"></i> Pemberitahuan!</h5> -->
                        Selamat Datang <?php echo $_SESSION['nama_guru'] ?> walikelas <?php $query = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_kelas where id = '$_SESSION[id_kelas]'"));
                                                                                        echo $query['nama_kelas'] ?>.
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        <?php endif; ?>
        <?php if ($_SESSION['level'] == 'admin') : ?>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="icon fas fa-info"></i> Pemberitahuan!
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <!-- <h5><i class="icon fas fa-info"></i> Pemberitahuan!</h5> -->
                        Selamat Datang <?php echo $_SESSION['nama'] ?>.
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        <?php endif; ?>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>