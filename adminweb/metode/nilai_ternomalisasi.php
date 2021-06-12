<!-- Main content -->

<div class="card-body">
    <div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="2" colspan="1" aria-sort="ascending">No.</th>
                    <th class="sorting " tabindex="0" aria-controls="example2" rowspan="2" colspan="1">NIS</th>
                    <th class="sorting " tabindex="0" aria-controls="example2" rowspan="2" colspan="1">Nama</th>
                    <th class="sorting " style="text-align: center;" tabindex="0" aria-controls="example2" rowspan="1" colspan="<?php echo $count = mysqli_num_rows(mysqli_query($conn, "SELECT * from tb_kriteria")); ?>">Kriteria</th>
                </tr>
                <tr>
                    <?php $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <th><?php echo $row['nama_kriteria'] ?></th>
                    <?php endwhile; ?>
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
                                            group by tb_raport.id_siswa
                                            order by tb_matrik.nilai desc 
                                            limit 10");
                $no = $posisi + 1;
                while ($row = mysqli_fetch_array($tampil)) { ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row['nis']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <?php
                        $nilai_kuadrat = 0;
                        $query = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                        while ($nilai = mysqli_fetch_array($query)) : ?>
                            <?php $quer = mysqli_query($conn, "SELECT * FROM tb_matrik where id_kriteria ='$nilai[id]' and id_siswa ='$row[id_siswa]'");
                            while ($nilaicek = mysqli_fetch_array($quer)) : ?>
                                <?php $nilaim = mysqli_query($conn, "SELECT * FROM tb_matrik where id_kriteria = '$nilai[id]'");
                                while ($nilaimatrik = mysqli_fetch_array($nilaim)) : ?>
                                    <?php $nilai_kuadrat = $nilai_kuadrat + ($nilaimatrik['nilai'] * $nilaimatrik['nilai']); ?>
                                <?php endwhile; ?>
                                <td><?php echo round($nilaicek['nilai'] / sqrt($nilai_kuadrat), 3) ?></td>
                            <?php endwhile; ?>
                        <?php endwhile; ?>
                    </tr>

                <?php
                    $no++;
                }
                $jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT *,tb_matrik.nilai as skor FROM tb_raport 
                                    left join tb_siswa on tb_siswa.id = tb_raport.id_siswa
                                    left join tb_matrik on tb_matrik.id_siswa = tb_raport.id_siswa
                                    join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
                                    group by tb_raport.id_siswa
                                    order by tb_raport.id_siswa asc"));
                $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                ?>
            </tbody>
        </table>
    </div>
</div><!-- /.card-body -->