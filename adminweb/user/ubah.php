        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- <div class="row"> -->
                <!-- <div class="col-lg-12">
                        <h1 class="page-header">Ubah Data</h1>
                    </div> -->
                <!-- /.col-lg-12 -->
                <!-- </div> -->
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                Form Kriteria
                            </div>
                            <div class="card-body">
                                <form action="../proses/prosesubah.php?module=user&act=ubah" method="post">
                                    <?php include 'form.php'; ?>
                                    <?php if (isset($_GET['id'])) : ?>
                                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                                    <?php endif; ?>
                                    <?php if (isset($_GET['id_guru'])) : ?>
                                        <input type="hidden" name="id_guru" value="<?php echo $_GET['id_guru'] ?>">
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-md btn-success"><i class="fa fa-save"></i> Simpan</button>
                                            <button type="reset" class="btn btn-md btn-warning"><i class="fa fa-undo"></i> Ulangi</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->