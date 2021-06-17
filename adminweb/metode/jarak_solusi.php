<!-- Main content -->

<div class="card-body">
    <div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
            <div class="table-header">Jarak Solusi Ideal Positif(D<sup>+</sup>)</div>
            <thead>
                <tr role="row">
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">No</th>
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">NIS</th>
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">Nama</th>
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">D<sup>+</sup></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $p      = new PagingIdealPositif();
                $batas  = 5;
                $posisi = $p->cariPosisi($batas);
                $tampil = mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                left join tb_kriteria on tb_matrik.id_kriteria = tb_kriteria.id
                join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                group by tb_siswa.id
                order by tb_matrik.nilai desc 
                limit 5");
                $no = 1;
                $mak2 = 0;
                while ($row = mysqli_fetch_array($tampil)) { ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row['nis'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <?php
                        $data = mysqli_query($conn, "SELECT *,max(bobot_matrik) as skor_max,
                        min(bobot_matrik) as skor_min from tb_matrik
                        join tb_kriteria on tb_kriteria.id = tb_matrik.id_kriteria
                        join tb_siswa on tb_siswa.id = tb_matrik.id_siswa
                        where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                        group by tb_matrik.id_kriteria");
                        while ($row = mysqli_fetch_array($data)) {
                            if ($row['sifat'] == 'Benefit') {
                                sqrt($mak2 = $mak2 + pow(($row['bobot_matrik'] - $row['skor_max']), 2));
                            } else {
                                sqrt($mak2 = $mak2 + pow(($row['bobot_matrik'] - $row['skor_min']), 2));
                            }
                        }
                        ?>
                        <td><?php echo round($mak2, 3); ?></td>
                    </tr>

                <?php
                    $no++;
                }
                $jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                left join tb_kriteria on tb_matrik.id_kriteria = tb_kriteria.id
                join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                group by tb_siswa.id"));
                $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="card-body">
    <div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
            <div class="table-header">Jarak Solusi Ideal Negatif(D<sup>-</sup>)</div>
            <thead>
                <tr role="row">
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">No</th>
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">NIS</th>
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">Nama</th>
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">D<sup>-</sup></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $p      = new PagingIdealNegatif();
                $batas  = 5;
                $posisi = $p->cariPosisi($batas);
                $tampil = mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                left join tb_kriteria on tb_matrik.id_kriteria = tb_kriteria.id
                join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                group by tb_siswa.id
                order by tb_matrik.nilai desc 
                limit 5");
                $min2 = 0;
                $no = 1;
                while ($row = mysqli_fetch_array($tampil)) { ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row['nis'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <?php
                        $data = mysqli_query($conn, "SELECT *,max(bobot_matrik) as skor_max,min(bobot_matrik) as skor_min 
                        from tb_matrik
                        join tb_kriteria on tb_kriteria.id = tb_matrik.id_kriteria
                        join tb_siswa on tb_siswa.id = tb_matrik.id_siswa
                        where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                        group by id_kriteria");
                        while ($row = mysqli_fetch_array($data)) {
                            if ($row['sifat'] == 'Cost') {
                                sqrt($min2 = $min2 + pow(($row['bobot_matrik'] - $row['skor_max']), 2));
                            } else {
                                sqrt($min2 = $min2 + pow(($row['bobot_matrik'] - $row['skor_min']), 2));
                            }
                        }
                        ?>
                        <td><?php echo round($min2, 3); ?></td>
                    </tr>

                <?php
                    $no++;
                }
                $jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                left join tb_kriteria on tb_matrik.id_kriteria = tb_kriteria.id
                join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                group by tb_siswa.id"));
                $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                ?>
            </tbody>
        </table>
    </div>
</div>