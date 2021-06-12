<?php
if (isset($_GET['id'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user where id='$_GET[id]'");
    while ($row = mysqli_fetch_array($query)) {
        $username = $row['username'];
        $password = $row['password'];
        $nama = $row['nama'];
    }
} else {
    $query = mysqli_query($conn, "SELECT * FROM tb_guru where id_guru ='$_GET[id_guru]'");
    while ($row = mysqli_fetch_array($query)) {
        $username = $row['nip'];
        $nama = $row['nama_guru'];
        $password = $row['password'];
    }
}
?>
<div class="row form-group">
    <div class="col-lg-3">
        <label>Nama</label>
    </div>
    <div class="col-lg-9">
        <input class="form-control" type="text" name="nama" placeholder="Nama" required="" value="<?php if (isset($nama)) echo $nama; ?>">
    </div>
</div>
<div class="row form-group">
    <div class="col-lg-3">
        <label>Username</label>
    </div>
    <div class="col-lg-9">
        <input class="form-control" type="text" name="username" placeholder="Nama" required="" value="<?php if (isset($username)) echo $username; ?>">
    </div>
</div>
<div class="row form-group">
    <div class="col-lg-3">
        <label>Password</label>
    </div>
    <div class="col-lg-9">
        <input class="form-control" type="password" name="password" placeholder="Nama" required="" value="<?php if (isset($password)) echo $password; ?>">
    </div>
</div>