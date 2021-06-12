<!-- Main content -->
<?php
$tampil = mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
left join tb_kriteria on tb_matrik.id_kriteria = tb_kriteria.id
join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
where tb_siswa.id_kelas = '$_SESSION[id_kelas]'
                group by tb_siswa.id
                order by tb_matrik.nilai desc 
                limit 10");
$no = 1;
while ($row = mysqli_fetch_array($tampil)) {
    $mak2 = 0;
    $data = mysqli_query($conn, "SELECT *,max(bobot_matrik) as skor_max,min(bobot_matrik) as skor_min 
    from tb_matrik
    join tb_kriteria on tb_kriteria.id = tb_matrik.id_kriteria
    group by id_kriteria");
    while ($row1 = mysqli_fetch_array($data)) {
        if ($row1['sifat'] == 'Benefit') {
            sqrt($mak2 = $mak2 + pow($row1['bobot_matrik'] - $row1['skor_max'], 2));
        } else {
            sqrt($mak2 = $mak2 + pow($row1['bobot_matrik'] - $row1['skor_min'], 2));
        }
    }
    $min2 = 0;
    $data = mysqli_query($conn, "SELECT *,max(bobot_matrik) as skor_max,min(bobot_matrik) as skor_min 
    from tb_matrik
    join tb_kriteria on tb_kriteria.id = tb_matrik.id_kriteria
    group by id_kriteria");
    while ($row2 = mysqli_fetch_array($data)) {
        if ($row2['sifat'] == 'Cost') {
            sqrt($min2 = $min2 + pow($row2['bobot_matrik'] - $row2['skor_max'], 2));
        } else {
            sqrt($min2 = $min2 + pow($row2['bobot_matrik'] - $row2['skor_min'], 2));
        }
    }
    $result = round($min2 / ($min2 + $mak2), 4);
    $cek = mysqli_query($conn, "SELECT * FROM tb_preferensi where id_siswa='$row[id_siswa]'");
    $num = mysqli_num_rows($cek);
    if ($num > 0) {
        $update = mysqli_query($conn, "UPDATE tb_preferensi set nilai ='$result' where id='$row[id_siswa]'");
    } else {
        $insert = mysqli_query($conn, "INSERT INTO tb_preferensi (id_siswa,nilai)values('$row[id_siswa]','$result')");
    }
}
?>
<div class="card-body">
    <div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
            <div class="table-header">Nilai Preferensi</div>
            <thead>
                <tr role="row">
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">No</th>
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">NIS</th>
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">Nama</th>
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">V<sub>i</sub></th>
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $p      = new PagingIdealPositif();
                $batas  = 5;
                $posisi = $p->cariPosisi($batas);
                $tampils = mysqli_query($conn, "SELECT * from tb_preferensi 
                join tb_siswa on tb_siswa.id = tb_preferensi.id_siswa
                join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                order by nilai desc
                limit 3");
                $mak2 = 0;
                $no = 1;
                while ($rs = mysqli_fetch_array($tampils)) { ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $rs['nis'] ?></td>
                        <td><?php echo $rs['nama'] ?></td>
                        <td><?php echo round($rs['nilai'], 4); ?></td>
                        <td><?php
                            if ($no > 1) {
                                echo "Cadangan";
                            } else {
                                echo "Utama";
                            } ?>
                        </td>
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