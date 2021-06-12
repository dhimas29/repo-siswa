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
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Level</th>
                                        <th colspan="2">Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($conn, "SELECT * FROM tb_user");
                                    while ($row = mysqli_fetch_array($query)) :
                                        if (isset($row)) : ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['level']; ?></td>
                                                <td><a href="index.php?page=user_ubah&id=<?php echo $row['id'] ?>" class="btn btn-xs btn-warning btn-block" title="Ubah">
                                                        <i class="fas fa-pencil"></i>
                                                    </a></td>
                                                <td>
                                                    <a href="../proses/proseshapus.php?module=user&act=hapus&id=<?php echo $row['id'] ?>" class="btn btn-xs btn-danger btn-block" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data kriteria <?php echo $row['nama'] ?>?')">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                    <?php
                                    $nomor = 2;
                                    $query_guru = mysqli_query($conn, "SELECT * FROM tb_guru");
                                    while ($row_guru = mysqli_fetch_array($query_guru)) : ?>
                                        <tr>
                                            <td><?php echo $nomor ?></td>
                                            <td><?php echo $row_guru['nip'] ?></td>
                                            <td><?php echo $row_guru['nama_guru'] ?></td>
                                            <td><?php echo 'guru' ?></td>
                                            <td><a href="index.php?page=user_ubah&id_guru=<?php echo $row_guru['id_guru'] ?>" class="btn btn-xs btn-warning btn-block" title="Ubah">
                                                    <i class="fas fa-pencil"></i>
                                                </a></td>
                                            <td>
                                                <a href="../proses/proseshapus.php?module=user&act=hapus&id_guru=<?php echo $row_guru['id_guru'] ?>" class="btn btn-xs btn-danger btn-block" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data kriteria <?php echo $row_guru['nama_guru'] ?>?')">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $nomor++ ?>
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