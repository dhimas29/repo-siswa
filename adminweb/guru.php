<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Data Siswa</h2>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-primary float-right">Tambah Data</a>
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
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">NIP</th>
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nama</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Tempat / Tanggal Lahir</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Jenis Kelamin</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Agama</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">No Telp</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Alamat</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Kelas</th>
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
                                            $tampil = mysqli_query($conn, "SELECT * FROM tb_guru left join tb_kelas on tb_kelas.id = tb_guru.id_kelas
                                                        order by id_guru asc limit $posisi,$batas");
                                            $no = $posisi + 1;
                                            while ($row = mysqli_fetch_array($tampil)) { ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row['id_guru']; ?></td>
                                                    <td><?php echo $row['nama_guru']; ?></td>
                                                    <td><?php echo $row['tempat_lahir'] . " / " . $row['tanggal_lahir']; ?></td>
                                                    <td><?php echo ucwords($row['jenis_kelamin']); ?></td>
                                                    <td><?php echo ucwords($row['agama']); ?></td>
                                                    <td><?php echo $row['no_telp']; ?></td>
                                                    <td><?php echo $row['alamat']; ?></td>
                                                    <td><?php echo $row['nama_kelas']; ?></td>
                                                    <td><a href="" data-bs-toggle="modal" data-bs-target="#modalubah<?= $row['id_guru']; ?>" class="btn btn-sm btn-warning btn-block">Ubah</a></td>
                                                    <td><a href="" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $row['id_guru']; ?>" class="btn btn-sm btn-danger btn-block">Hapus</a></td>
                                                </tr>
                                                <!-- Modal Haus -->
                                                <div class="modal fade" id="modalhapus<?= $row['id_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <?php
                                                                $querys = mysqli_query($conn, "SELECT * FROM tb_guru where id='$row[id_guru]'");
                                                                while ($rows = mysqli_fetch_array($querys)) {
                                                                ?>
                                                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data <?= $rows['nip']  ?></h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="POST" action="../proses/proseshapus.php?module=guru&act=hapus" onSubmit="return validasi(this)">
                                                                    <input type="hidden" name="id_guru" value="<?php echo $rows['id'] ?>">
                                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                                                </form>
                                                            <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Hapus -->
                                                <!-- Modal Ubah -->
                                                <div class="modal fade" id="modalubah<?= $row['id_guru']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Guru</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" method="POST" action="../proses/prosesubah.php?module=guru&act=ubah" onSubmit="return validasi(this)">
                                                                    <?php
                                                                    $querys = mysqli_query($conn, "SELECT *,tb_guru.id as id_guru FROM tb_guru 
                                                                    left join tb_kelas on tb_kelas.id = tb_guru.id_kelas 
                                                                    where tb_guru.id='$row[id_guru]'");
                                                                    while ($rows = mysqli_fetch_array($querys)) {
                                                                    ?>
                                                                        <input type="hidden" value="<?php echo $rows['id_guru']; ?>" name="id_guru">
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="number" class="form-control" value="<?= $rows['nip'] ?>" id="nip" placeholder="NIP" name="nip">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" value="<?= $rows['nama_guru'] ?>" id="nama" placeholder="Nama" name="nama">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" value="<?= $rows['tempat_lahir'] ?>" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date" class="form-control" value="<?= $rows['tanggal_lahir'] ?>" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="jenis_kelamin" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                                                        <option selected="selected" value="<?= $rows['jenis_kelamin'] ?>" data-select2-id="19"><?= ucwords($rows['jenis_kelamin']) ?></option>
                                                                                        <option value="laki">Laki</option>
                                                                                        <option value="perempuan">Perempuan</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="agama" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                                                        <option selected="selected" value="<?= $rows['agama'] ?>" data-select2-id="19"><?= ucwords($rows['agama']) ?></option>
                                                                                        <option value="islam">Islam</option>
                                                                                        <option value="kristen">Kristen</option>
                                                                                        <option value="budha">Budha</option>
                                                                                        <option value="hindu">Hindu</option>
                                                                                        <option value="katolik">Katolik</option>
                                                                                        <option value="kong hu chu">Kong Hu Chu</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="no_telp" class="col-sm-4 col-form-label">No Telp</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="number" class="form-control" value="<?= $rows['no_telp'] ?>" id="no_telp" placeholder="No Telp" name="no_telp">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                                                                <div class="col-sm-8">
                                                                                    <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control"><?= $rows['alamat'] ?></textarea>
                                                                                    <!-- <input type="date" class="form-control" id="alamat" placeholder="Alamat" name="alamat"> -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="id_kelas" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                                                        <option selected="selected" value="<?= $rows['id_kelas'] ?>" data-select2-id="19"><?= $rows['nama_kelas'] ?></option>
                                                                                        <?php
                                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kelas");
                                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                                        ?>
                                                                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nama_kelas']; ?></option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button>
                                                                <!-- <a href="prosestambah.php?module=kriteria&act=input" class="btn btn-info">Simpan</a> -->
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                $no++;
                                            }
                                            $jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_guru"));
                                            $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                                            $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">No.</th>
                                                <th rowspan="1" colspan="1">NIP</th>
                                                <th rowspan="1" colspan="1">Nama</th>
                                                <th rowspan="1" colspan="1">Tempat / Tanggal Lahir</th>
                                                <th rowspan="1" colspan="1">Jenis Kelamin</th>
                                                <th rowspan="1" colspan="1">Agama</th>
                                                <th rowspan="1" colspan="1">No Telp</th>
                                                <th rowspan="1" colspan="1">Alamat</th>
                                                <th rowspan="1" colspan="1">Kelas</th>
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

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="../proses/prosestambah.php?module=guru&act=input" onSubmit="return validasi(this)">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="nip" placeholder="NIP" name="nip">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <select name="jenis_kelamin" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="19">-- Pilih --</option>
                                    <option value="laki">Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                            <div class="col-sm-8">
                                <select name="agama" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="19">-- Pilih --</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="budha">Budha</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="kong hu chu">Kong Hu Chu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_telp" class="col-sm-4 col-form-label">No Telp</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="no_telp" placeholder="No Telp" name="no_telp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control"></textarea>
                                <!-- <input type="date" class="form-control" id="alamat" placeholder="Alamat" name="alamat"> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                            <div class="col-sm-8">
                                <select name="id_kelas" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="19">-- Pilih --</option>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM tb_kelas");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nama_kelas']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button>
                <!-- <a href="prosestambah.php?module=kriteria&act=input" class="btn btn-info">Simpan</a> -->
            </div>
            </form>
        </div>
    </div>
</div>