<!-- Main content -->

<div class="card-body">
    <div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
            <div class="table-header">
                Matrik Ideal Positif (A<sup>+</sup>)
            </div>
            <thead>
                <tr role="row">
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="1" colspan="<?php echo $count = mysqli_num_rows(mysqli_query($conn, "SELECT * from tb_kriteria")); ?>">Kriteria</th>
                </tr>
                <tr>
                    <?php $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <th><?php echo $row['nama_kriteria'] ?></th>
                    <?php endwhile; ?>
                </tr>
                <tr>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                    $data = mysqli_num_rows($query);
                    for ($n = 1; $n <= $data; $n++) {
                        echo "<th>y<sub>$n</sub><sup>+</sup></th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $p      = new PagingKriteria();
                $batas  = 5;
                $posisi = $p->cariPosisi($batas);
                $tampil = mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                group by tb_siswa.id");
                $no = $posisi + 1;
                while ($row = mysqli_fetch_array($tampil)) { ?>
                    <?php
                    $nilai_kuadrat = 0;
                    $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                    while ($nilai = mysqli_fetch_array($query)) : ?>
                        <?php $quer = mysqli_query($conn, "SELECT * FROM tb_matrik 
                        join tb_siswa on tb_siswa.id = tb_matrik.id_siswa
                        where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                        and id_kriteria ='$nilai[id]' and id_siswa ='$row[id_siswa]' 
                        group by id_kriteria order by id_kriteria asc");
                        $ymax = [];
                        while ($nilaicek = mysqli_fetch_array($quer)) : ?>
                            <?php $nilaim = mysqli_query($conn, "SELECT * FROM tb_matrik 
                            join tb_siswa on tb_siswa.id = tb_matrik.id_siswa
                            where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                            and id_kriteria = '$nilai[id]' order by id_kriteria asc");
                            $c = 0;
                            while ($nilaimatrik = mysqli_fetch_array($nilaim)) : ?>
                                <?php $nilai_kuadrat = $nilai_kuadrat + ($nilaimatrik['nilai'] * $nilaimatrik['nilai']); ?>
                            <?php endwhile; ?>
                            <?php

                            $v = round(($nilaicek['nilai'] / sqrt($nilai_kuadrat)) * $nilai['bobot'], 3);
                            $upd = mysqli_query($conn, "UPDATE tb_matrik set bobot_matrik ='$v' where id_kriteria ='$nilai[id]' and id_siswa='$row[id_siswa]'")

                            ?>
                        <?php endwhile; ?>
                        <!-- <?php if ($nilai['sifat'] == 'Benefit') {
                                    echo "<td>" . max($ymax) . "</td>";
                                } else {
                                    echo "<td>" . min($ymax) . "</td>";
                                } ?> -->
                    <?php endwhile; ?>
                <?php
                    $no++;
                } ?>
                <tr>
                    <?php $query = mysqli_query($conn, "SELECT max(bobot_matrik) as skor_max,min(bobot_matrik) as skor_min,tb_kriteria.sifat as sifat FROM tb_matrik 
                    join tb_kriteria on tb_kriteria.id = tb_matrik.id_kriteria
                    join tb_siswa on tb_siswa.id = tb_matrik.id_siswa
                    where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                    group by id_kriteria");
                    while ($row = mysqli_fetch_array($query)) {
                        if ($row['sifat'] == 'Benefit') {
                            echo "<td>" . $row['skor_max'] . "</td>";
                        } else {
                            echo "<td>" . $row['skor_min'] . "</td>";
                        }
                    ?>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card-body">
    <div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
            <div class="table-header">
                Matrik Ideal Negatif (A<sup>-</sup>)
            </div>
            <thead>
                <tr role="row">
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="1" colspan="<?php echo $count = mysqli_num_rows(mysqli_query($conn, "SELECT * from tb_kriteria")); ?>">Kriteria</th>
                </tr>
                <tr>
                    <?php $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <th><?php echo $row['nama_kriteria'] ?></th>
                    <?php endwhile; ?>
                </tr>
                <tr>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                    $data = mysqli_num_rows($query);
                    for ($n = 1; $n <= $data; $n++) {
                        echo "<th>y<sub>$n</sub><sup>-</sup></th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $p      = new PagingKriteria();
                $batas  = 5;
                $posisi = $p->cariPosisi($batas);
                $tampil = mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                group by tb_siswa.id
                order by tb_matrik.nilai desc 
                limit 5");
                $no = $posisi + 1;
                while ($row = mysqli_fetch_array($tampil)) { ?>
                    <?php
                    $nilai_kuadrat = 0;
                    $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                    while ($nilai = mysqli_fetch_array($query)) : ?>
                        <?php $quer = mysqli_query($conn, "SELECT * FROM tb_matrik 
                        join tb_siswa on tb_siswa.id = tb_matrik.id_siswa
                        where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                        and id_kriteria ='$nilai[id]' and id_siswa ='$row[id_siswa]' 
                        group by id_kriteria 
                        order by id_kriteria asc");
                        $ymax = [];
                        while ($nilaicek = mysqli_fetch_array($quer)) : ?>
                            <?php $nilaim = mysqli_query($conn, "SELECT * FROM tb_matrik 
                            join tb_siswa on tb_siswa.id = tb_matrik.id_siswa
                            where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                            and id_kriteria = '$nilai[id]' order by id_kriteria asc");
                            $c = 0;
                            while ($nilaimatrik = mysqli_fetch_array($nilaim)) : ?>
                                <?php $nilai_kuadrat = $nilai_kuadrat + ($nilaimatrik['nilai'] * $nilaimatrik['nilai']); ?>
                            <?php endwhile; ?>
                            <?php

                            $v = round(($nilaicek['nilai'] / sqrt($nilai_kuadrat)) * $nilai['bobot'], 3);
                            $upd = mysqli_query($conn, "UPDATE tb_matrik set bobot_matrik ='$v' where id_kriteria ='$nilai[id]' and id_siswa='$row[id_siswa]'")

                            ?>
                        <?php endwhile; ?>
                        <!-- <?php if ($nilai['sifat'] == 'Benefit') {
                                    echo "<td>" . max($ymax) . "</td>";
                                } else {
                                    echo "<td>" . min($ymax) . "</td>";
                                } ?> -->
                    <?php endwhile; ?>
                <?php
                    $no++;
                } ?>
                <tr>
                    <?php $query = mysqli_query($conn, "SELECT max(bobot_matrik) as skor_max,min(bobot_matrik) as skor_min,tb_kriteria.sifat as sifat FROM tb_matrik 
                    join tb_kriteria on tb_kriteria.id = tb_matrik.id_kriteria
                    join tb_siswa on tb_siswa.id = tb_matrik.id_siswa
                    where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                    group by id_kriteria");
                    while ($row = mysqli_fetch_array($query)) {
                        if ($row['sifat'] == 'Cost') {
                            echo "<td>" . $row['skor_max'] . "</td>";
                        } else {
                            echo "<td>" . $row['skor_min'] . "</td>";
                        }
                    ?>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>