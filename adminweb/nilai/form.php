<div class="row form-group">
    <div class="col-lg-3">
        <label>Siswa</label>
    </div>
    <?php //echo $_GET['id'] 
    ?>
    <div class="col-lg-3">
        <!-- <select name="id_siswa" id="" class="form-control">
            <option value="">-- Pilih --</option>
            <?php
            if (isset($_SESSION['id_kelas'])) {
                $query = mysqli_query($conn, "SELECT * FROM tb_siswa 
                where id_kelas='$_SESSION[id_kelas]' 
               ");
            } else {
                $query = mysqli_query($conn, "SELECT * FROM tb_siswa 
                ");
            }
            while ($row = mysqli_fetch_array($query)) : ?>
                <option <?php if (isset($_GET['id'])) {
                            if ($row['id'] == $_GET['id']) {
                                echo "selected";
                            }
                        } ?> value="<?php echo $row['id'] ?>"><?php echo $row['nama'] ?> </option>
            <?php endwhile; ?>
        </select> -->
        <?php if ((isset($_GET['id']))) : ?>
            <?php $query = mysqli_query($conn, "SELECT * FROM tb_siswa where id='$_GET[id]'");
            $row = mysqli_fetch_array($query); ?>
            <input type="hidden" value="<?php echo $row['id'] ?>" name="id_siswa" class="form-control" readonly>
            <input type="text" value="<?php echo $row['nama'] ?>" class="form-control" readonly>
        <?php endif; ?>
    </div>
    <!-- <div class="col-lg-3">
        <label>Mata Pelajaran</label>
    </div>
    <?php //echo $_GET['id'] 
    ?>
    <div class="col-lg-3">
        <select name="id_mapel" id="" class="form-control">
            <option value="">-- Pilih --</option>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM tb_mapel
            join tb_");
            while ($row = mysqli_fetch_array($query)) : ?>
                <option <?php if (isset($_GET['id'])) {
                            if ($row['id'] == $_GET['id']) {
                                echo "selected";
                            }
                        } ?> value="<?php echo $row['id'] ?>"><?php echo $row['nama_mapel'] ?> </option>
            <?php endwhile; ?>
        </select>
    </div> -->
</div>
<div class="row form-group">
    <?php $query = mysqli_query($conn, "SELECT * FROM tb_kriteria where nama_kriteria not like '%raport%'");
    while ($row = mysqli_fetch_array($query)) : ?>
        <div class="col-lg-3">
            <label><?= $row['nama_kriteria'] ?></label>
        </div>
        <?php
        if (isset($_GET['id'])) {
            $querys = mysqli_query($conn, "SELECT * FROM tb_matrik where id_siswa = '$_GET[id]' and id_kriteria = '$row[id]'");
            $rows = mysqli_fetch_array($querys);
        }
        ?>
        <div class="col-lg-3">
            <input class="form-control" type="number" name="nilai[<?php echo $row['id'] ?>]" placeholder="0-100" required="" value="<?php if (isset($rows)) echo $rows['nilai']; ?>">
        </div>
    <?php endwhile; ?>
</div>