<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Data Siswa</h2>
                        <?php if ($_SESSION['level'] == 'guru') : ?>
                            <a href="index.php?page=tambah_raport" class="btn btn-sm btn-primary float-right">Tambah Data</a>
                        <?php endif; ?>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">NIS</th>
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nama</th>
                                                <?php $query = mysqli_query($conn, "SELECT * FROM tb_mapel");
                                                while ($row = mysqli_fetch_array($query)) : ?>
                                                    <th rowspan="1" colspan="1"><?php echo $row['nama_mapel'] ?></th>
                                                <?php endwhile; ?>
                                                <th rowspan="1" colspan="1">Rata-Rata</th>
                                                <?php if ($_SESSION['level'] == 'guru') : ?>
                                                    <th colspan="2">
                                                        <center>Aksi</center>
                                                    </th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $p      = new PagingRaport();
                                            $batas  = 5;
                                            $posisi = $p->cariPosisi($batas);
                                            if (isset($_GET['kelas'])) {
                                                $tampil = mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                                            left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                                            left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                                            join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                                            where tb_siswa.id_kelas = '$_GET[kelas]'
                                            group by tb_raport.id_siswa
                                            order by tb_raport.id_siswa asc 
                                            limit $posisi,$batas");
                                            } else if ($_SESSION['level'] == 'guru') {
                                                $tampil = mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                                            left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                                            left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                                            join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                                            where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                                            group by tb_raport.id_siswa
                                            order by tb_raport.id_siswa asc 
                                            limit $posisi,$batas");
                                            } else {
                                                $tampil = mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                                            left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                                            left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                                            join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                                            group by tb_raport.id_siswa
                                            order by tb_raport.id_siswa asc 
                                            limit $posisi,$batas");
                                            }

                                            $no = $posisi + 1;
                                            while ($row = mysqli_fetch_array($tampil)) { ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row['nis']; ?></td>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <?php $query = mysqli_query($conn, "SELECT * FROM tb_mapel");
                                                    while ($nilai = mysqli_fetch_array($query)) : ?>
                                                        <?php $quer = mysqli_query($conn, "SELECT * FROM tb_raport where id_mapel ='$nilai[id]' and id_siswa ='$row[id_siswa]'");
                                                        while ($nilaicek = mysqli_fetch_array($quer)) : ?>
                                                            <td><?php echo $nilaicek['nilai'] ?></td>
                                                        <?php endwhile; ?>
                                                    <?php endwhile; ?>
                                                    <td><?php echo round($row['skor'], 2); ?></td>
                                                    <?php if ($_SESSION['level'] == 'guru') : ?>
                                                        <td><a href="index.php?page=ubah_raport&id=<?php echo $row['id_siswa']; ?>" class="btn btn-sm btn-warning btn-block"><i class="fas fa-edit"></i></a></td>
                                                        <td><a href="../proses/proseshapus.php?module=raport&act=hapus&id=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-danger btn-block" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data raport <?php echo $row['nama'] ?>?')"><i class="fas fa-times"></i></a></td>
                                                    <?php endif; ?>
                                                </tr>

                                            <?php
                                                $no++;
                                            }
                                            if (isset($_GET['kelas'])) {
                                                $dats = mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                                            left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                                            left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                                            join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                                            where tb_siswa.id_kelas = '$_GET[kelas]'
                                            group by tb_raport.id_siswa
                                            order by tb_raport.id_siswa asc 
                                           ");
                                            } else if ($_SESSION['level'] == 'guru') {
                                                $dats = mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                                            left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                                            left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                                            join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                                            where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                                            group by tb_raport.id_siswa
                                            order by tb_raport.id_siswa asc 
                                           ");
                                            } else {
                                                $dats = mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                                            left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                                            left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                                            join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                                            group by tb_raport.id_siswa
                                            order by tb_raport.id_siswa asc 
                                           ");
                                            }
                                            $jmldata = mysqli_num_rows($dats);
                                            $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                                            $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">No.</th>
                                                <th rowspan="1" colspan="1">NIS</th>
                                                <th rowspan="1" colspan="1">Nama</th>

                                                <?php $query = mysqli_query($conn, "SELECT * FROM tb_mapel");
                                                while ($row = mysqli_fetch_array($query)) : ?>
                                                    <th rowspan="1" colspan="1"><?php echo $row['nama_mapel'] ?></th>
                                                <?php endwhile; ?>
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Rata-Rata</th>
                                                <?php if ($_SESSION['level'] == 'guru') : ?>
                                                    <th rowspan="1" colspan="2">
                                                        <center>Aksi</center>
                                                    </th>
                                                <?php endif; ?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                                    <?php
                                                    // $query = mysqli_query($conn, "SELECT * FROM tb_user");
                                                    // $count = mysqli_num_rows($query);
                                                    // echo "1 to " . $count;
                                                    ?>
                                                </div>
                                            </div> -->
                                <!-- <div class="col-sm-12 col-md-7"> -->
                                <!-- <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"> -->
                                <ul class="pagination">
                                    <?php echo "$linkHalaman"; ?>
                                </ul>
                                <!-- </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->

            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->