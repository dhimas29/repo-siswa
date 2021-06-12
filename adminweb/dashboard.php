<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php $query = mysqli_query($conn, "SELECT *,count(*) as total FROM tb_siswa");
                        while ($row = mysqli_fetch_array($query)) { ?>
                            <h3><?php echo $row['total'] ?></h3>
                            <p>Jumlah Siswa</p>
                        <?php } ?>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="index.php?page=siswa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
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
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>