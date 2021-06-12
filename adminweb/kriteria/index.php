<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Kriteria</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 20px">
                        <div>
                            <?php if ($_SESSION['level'] == 'admin') : ?>
                                <a href="index.php?page=tambah_kriteria" class="btn btn-sm btn-success" style="float: right;"><i class="fa fa-plus"></i> Tambah
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="card-body">
                        <div class="dataTable_wrapper">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Bobot</th>
                                        <th>Jenis</th>
                                        <!-- <th>SubKriteria (Bobot)</th> -->
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                    while ($row = mysqli_fetch_array($query)) :
                                        if (isset($row)) : ?>
                                            <tr>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['bobot']; ?></td>
                                                <td><?php echo $row['sifat']; ?></td>
                                                <!-- <td>
                                                    <?php foreach ($data as $data_sub) : ?>
                                                        <?php if ($data_sub['nama_subkriteria'] != 'input') : ?>
                                                            <?php echo $data_sub['nama_subkriteria'] . ' (' . $data_sub['bobot_subkriteria'] . ')'; ?>
                                                        <?php else : ?>
                                                            -
                                                        <?php endif ?>
                                                        <br>
                                                    <?php endforeach; ?>
                                                </td> -->

                                                <td align="center">
                                                    <a href="index.php?url=data_kriteria_lihat&id=<?php echo $data[0]['id'] ?>" class="btn btn-xs btn-info" title="Lihat">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <?php if ($_SESSION['level'] == 'admin') : ?>

                                                        <a href="index.php?page=ubah_kriteria&id=<?php echo $row['id'] ?>" class="btn btn-xs btn-warning" title="Ubah">
                                                            <i class="fas fa-pencil"></i>
                                                        </a>
                                                        <a href="../proses/proseshapus.php?module=kriteria&act=hapus&id=<?php echo $row['id'] ?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data kriteria <?php echo $row['nama_kriteria'] ?>?')">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>

    </div>
</section>
<!-- /#page-wrapper -->