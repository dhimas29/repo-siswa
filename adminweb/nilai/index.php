<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Data Siswa</h2>
                        <a href="index.php?page=tambah_nilai" class="btn btn-sm btn-primary float-right">Tambah Data</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <?php if (isset($_SESSION['level'])) : ?>
                                <?php if ($_SESSION['level'] == 'admin') : ?>
                                    <div class="row form-group">
                                        <div class="col-md-1 mt-2">
                                            <label for="">Kelas : </label>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control" name="" id="kelas">
                                                <option value="">Kelas</option>
                                                <?php $query = mysqli_query($conn, "SELECT * FROM tb_kelas");
                                                while ($row = mysqli_fetch_array($query)) : ?>
                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['nama_kelas'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">NIS</th>
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nama</th>
                                                <?php $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                                while ($row = mysqli_fetch_array($query)) : ?>
                                                    <th rowspan="1" colspan="1"><?php echo $row['nama_kriteria'] ?></th>
                                                <?php endwhile; ?>
                                                <th colspan="2">
                                                    <center>Aksi</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $p      = new PagingKriteria();
                                            $batas  = 5;
                                            $posisi = $p->cariPosisi($batas);
                                            if (isset($_GET['kelas'])) {
                                                $tampil = mysqli_query($conn, "SELECT * FROM tb_matrik 
                                            left join tb_siswa on tb_siswa.id = tb_matrik.id_siswa
                                            where tb_siswa.id_kelas = '$_GET[kelas]' 
                                            group by id_siswa
                                            order by id_siswa asc 
                                            limit $posisi,$batas");
                                            } else if ($_SESSION['level'] == 'guru') {
                                                $tampil = mysqli_query($conn, "SELECT * FROM tb_matrik 
                                            join tb_siswa on tb_siswa.id = tb_matrik.id_siswa
                                            join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                                            where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                                            group by id_siswa
                                            order by nilai desc 
                                            limit 10");
                                            } else {
                                                $tampil = mysqli_query($conn, "SELECT * FROM tb_matrik 
                                            left join tb_siswa on tb_siswa.id = tb_matrik.id_siswa
                                            group by id_siswa
                                            order by id_siswa asc 
                                            limit $posisi,$batas");
                                            }
                                            $no = $posisi + 1;
                                            while ($row = mysqli_fetch_array($tampil)) { ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row['nis']; ?></td>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <?php $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                                    while ($nilai = mysqli_fetch_array($query)) : ?>
                                                        <?php $quer = mysqli_query($conn, "SELECT * FROM tb_matrik where id_kriteria ='$nilai[id]' and id_siswa ='$row[id_siswa]'");
                                                        while ($nilaicek = mysqli_fetch_array($quer)) : ?>
                                                            <?php if (isset($nilaicek)) { ?>
                                                                <td><?php echo round($nilaicek['nilai'], 2) ?></td>
                                                            <?php } else { ?>
                                                                <td>-</td>
                                                            <?php } ?>
                                                        <?php endwhile; ?>
                                                    <?php endwhile; ?>
                                                    <td><a href="index.php?page=ubah_raport&id=<?php echo $row['id_siswa']; ?>" class="btn btn-sm btn-warning btn-block">Ubah</a></td>
                                                    <td><a href="../proses/proseshapus.php?module=nilai&act=hapus&id=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-danger btn-block" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data raport <?php echo $row['nama'] ?>?')">Hapus</a></td>

                                                </tr>

                                            <?php
                                                $no++;
                                            }
                                            $jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_siswa"));
                                            $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                                            $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">No.</th>
                                                <th rowspan="1" colspan="1">NIS</th>
                                                <th rowspan="1" colspan="1">Nama</th>
                                                <?php $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                                while ($row = mysqli_fetch_array($query)) : ?>
                                                    <th rowspan="1" colspan="1"><?php echo $row['nama_kriteria'] ?></th>
                                                <?php endwhile; ?>

                                                <th rowspan="1" colspan="2">
                                                    <center>Aksi</center>
                                                </th>
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