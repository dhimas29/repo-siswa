<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <?php
                        if ($_GET['tab'] == 'nilai_matriks') {
                            $act1 = 'active';
                            $act2 = '';
                            $act3 = '';
                            $act4 = '';
                            $act5 = '';
                            $act6 = '';
                        } else if ($_GET['tab'] == 'nilai_ternomalisasi') {
                            $act1 = '';
                            $act2 = 'active';
                            $act3 = '';
                            $act4 = '';
                            $act5 = '';
                            $act6 = '';
                        } else if ($_GET['tab'] == 'nilai_bobot') {
                            $act1 = '';
                            $act2 = '';
                            $act3 = 'active';
                            $act4 = '';
                            $act5 = '';
                            $act6 = '';
                        } else if ($_GET['tab'] == 'matrik_ideal') {
                            $act1 = '';
                            $act2 = '';
                            $act3 = '';
                            $act4 = 'active';
                            $act5 = '';
                            $act6 = '';
                        } else if ($_GET['tab'] == 'jarak_solusi') {
                            $act1 = '';
                            $act2 = '';
                            $act3 = '';
                            $act4 = '';
                            $act5 = 'active';
                            $act6 = '';
                        } else if ($_GET['tab'] == 'nilai_preferensi') {
                            $act1 = '';
                            $act2 = '';
                            $act3 = '';
                            $act4 = '';
                            $act5 = '';
                            $act6 = 'active';
                        } else {
                            $act1 = '';
                            $act2 = '';
                            $act3 = '';
                            $act4 = '';
                            $act5 = '';
                            $act6 = '';
                        }
                        ?>
                        <div style="font-size: 13px;">
                            <ul class="nav nav-pills ml-auto">
                                <li class="card">
                                    <a class="nav-link <?php echo $act1; ?>" href="index.php?page=hasil&tab=nilai_matriks">NIlai Matriks</a>
                                </li>
                                <li class="card">
                                    <a class="nav-link <?php echo $act2; ?>" href="index.php?page=hasil&tab=nilai_ternomalisasi">Nilai Matrik Ternomalisasi</a>
                                </li>
                                <li class="card">
                                    <a class="nav-link <?php echo $act3; ?>" href="index.php?page=hasil&tab=nilai_bobot">Nilai Bobot Ternomalisasi</a>
                                </li>
                                <li class="card">
                                    <a class="nav-link <?php echo $act4; ?>" href="index.php?page=hasil&tab=matrik_ideal">Matriks Ideal Positif/Negatif</a>
                                </li>
                                <li class="card">
                                    <a class="nav-link <?php echo $act5; ?>" href="index.php?page=hasil&tab=jarak_solusi">Jarak Solusi Ideal Positif/Negatif</a>
                                </li>
                                <li class="card">
                                    <a class="nav-link <?php echo $act6; ?>" href="index.php?page=hasil&tab=nilai_preferensi">Nilai Preferensi</a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.card-header -->
                    <?php

                    if (@$_GET['page'] == 'hasil' and @$_GET['tab'] == 'nilai_matriks') {
                        include("nilai_matriks.php");
                    } else if (@$_GET['tab'] == 'nilai_ternomalisasi') {
                        include("nilai_ternomalisasi.php");
                    } else if (@$_GET['tab'] == 'nilai_bobot') {
                        include("nilai_bobot.php");
                    } else if (@$_GET['tab'] == 'matrik_ideal') {
                        include("matrik_ideal.php");
                    } else if (@$_GET['tab'] == 'jarak_solusi') {
                        include("jarak_solusi.php");
                    } else if (@$_GET['tab'] == 'nilai_preferensi') {
                        include("nilai_preferensi.php");
                    }
                    ?>
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->