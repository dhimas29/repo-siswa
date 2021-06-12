<?php $raport = mysqli_query($conn, "SELECT * FROM tb_kriteria where nama_kriteria like '%raport%'");
$row_raport = mysqli_fetch_array($raport); ?>
<input type="hidden" name="raport" value="<?php echo $row_raport['id'] ?>">
<div class="row form-group">
    <div class="col-lg-3">
        <label>Siswa</label>
    </div>
    <?php //echo $_GET['id'] 
    ?>
    <div class="col-lg-3">
        <select name="id_siswa" id="" class="form-control">
            <option value="">-- Pilih --</option>
            <?php $query = mysqli_query($conn, "SELECT tb_siswa.id,tb_siswa.nama FROM tb_guru 
            join tb_siswa on tb_guru.id_kelas = tb_siswa.id_kelas");
            while ($row = mysqli_fetch_array($query)) : ?>
                <option <?php if (isset($_GET['id'])) {
                            if ($row['id'] == $_GET['id']) {
                                echo "selected";
                            }
                        } ?> value="<?php echo $row['id'] ?>"><?php echo $row['nama'] ?> </option>
            <?php endwhile; ?>
        </select>
    </div>
    <?php $query = mysqli_query($conn, "SELECT * FROM tb_mapel");
    while ($row = mysqli_fetch_array($query)) : ?>
        <div class="col-lg-3">
            <label><?= $row['nama_mapel'] ?></label>
        </div>
        <?php
        if (isset($_GET['id'])) {
            $querys = mysqli_query($conn, "SELECT * FROM tb_raport where id_siswa = '$_GET[id]' and id_mapel = '$row[id]'");
            $rows = mysqli_fetch_array($querys);
        }
        ?>
        <div class="col-lg-3">
            <input class="form-control" type="number" name="nilai[<?php echo $row['id'] ?>]" placeholder="0-10" required="" value="<?php if (isset($rows)) echo $rows['nilai']; ?>">
        </div>
    <?php endwhile; ?>
</div>