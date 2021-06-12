<div class="row form-group">
    <div class="col-lg-3">
        <label>Nama</label>
    </div>
    <div class="col-lg-9">
        <?php $query = mysqli_query($conn, "SELECT * FROM tb_kriteria where id='$_GET[id]'");
        while ($row = mysqli_fetch_array($query)) {
            $id_kriteria = $row['id'];
            $nama_kriteria = $row['nama_kriteria'];
            $bobot = $row['bobot'];
            $sifat = $row['sifat'];
        } ?>
        <input class="form-control" type="text" name="nama_kriteria" placeholder="Nama" required="" value="<?php if (isset($id_kriteria)) echo $nama_kriteria; ?>">
    </div>
</div>
<div class="row form-group">
    <div class="col-lg-3">
        <label>Bobot</label>
    </div>
    <div class="col-lg-9">

        <select class="form-control" name="bobot">
            <option value="">- Bobot -</option>
            <option value="1" <?php if (isset($id_kriteria) && $bobot == '1') echo "selected"; ?>>1</option>
            <option value="2" <?php if (isset($id_kriteria) && $bobot == '2') echo "selected"; ?>>2</option>
            <option value="3" <?php if (isset($id_kriteria) && $bobot == '3') echo "selected"; ?>>3</option>
            <option value="4" <?php if (isset($id_kriteria) && $bobot == '4') echo "selected"; ?>>4</option>
            <option value="5" <?php if (isset($id_kriteria) && $bobot == '5') echo "selected"; ?>>5</option>
        </select>
        <!-- <input class="form-control" type="number" name="bobot" placeholder="Bobot" required="" value="<?php if (isset($data_kriteria)) echo $data_kriteria[0]['bobot']; ?>"> -->
    </div>
</div>
<div class="row form-group">
    <div class="col-lg-3">
        <label>Jenis</label>
    </div>
    <div class="col-lg-9">
        <select class="form-control" name="jenis">
            <option value="">- Jenis -</option>
            <option value="Benefit" <?php if (isset($id_kriteria) && $sifat == 'Benefit') echo "selected"; ?>>Benefit</option>
            <option value="Cost" <?php if (isset($id_kriteria) && $sifat == 'Cost') echo "selected"; ?>>Cost</option>
        </select>
    </div>
</div>