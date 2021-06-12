        <!-- Page Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                Form Kriteria
                            </div>
                            <div class="card-body">
                                <form action="../proses/prosestambah.php?module=kriteria&act=input" method="post">
                                    <?php include 'form.php'; ?>
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

        </section>
        <!-- /#page-wrapper -->