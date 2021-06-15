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
        <?php if (!(isset($_GET['id']))) : ?>
            <select name="id_siswa" id="" class="form-control">
                <option value="">-- Pilih --</option>
                <?php
                if (isset($_SESSION['id_kelas'])) {
                    $query = mysqli_query($conn, "SELECT * FROM tb_siswa 
           where id_kelas='$_SESSION[id_kelas]' 
                and tb_siswa.id not in(select id_siswa from tb_matrik)");
                } else {
                    $query = mysqli_query($conn, "SELECT tb_siswa.id,tb_siswa.nama FROM tb_siswa 
                 where tb_siswa.id not in(select * from tb_matrik");
                }
                while ($row = mysqli_fetch_array($query)) : ?>
                    <option <?php if (isset($_GET['id'])) {
                                if ($row['id'] == $_GET['id']) {
                                    echo "selected";
                                }
                            } ?> value="<?php echo $row['id'] ?>"><?php echo $row['nama'] ?> </option>
                <?php endwhile; ?>
            </select>
        <?php endif; ?>
        <?php if ((isset($_GET['id']))) : ?>
            <?php $query = mysqli_query($conn, "SELECT * FROM tb_siswa where id='$_GET[id]'");
            $row = mysqli_fetch_array($query); ?>
            <input type="hidden" value="<?php echo $row['id'] ?>" name="id_siswa" class="form-control" readonly>
            <input type="text" value="<?php echo $row['nama'] ?>" class="form-control" readonly>
        <?php endif; ?>
    </div>
</div>
<div class="row form-group">
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
            <input class="form-control" type="number" name="nilai[<?php echo $row['id'] ?>]" placeholder="0-100" required="" value="<?php if (isset($rows)) echo $rows['nilai']; ?>">
        </div>
    <?php endwhile; ?>
</div>