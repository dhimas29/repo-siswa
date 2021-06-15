<?php
if (isset($_GET['id'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user where id='$_GET[id]'");
    while ($row = mysqli_fetch_array($query)) {
        $user = $row['username'];
        $password = $row['password'];
        $nama = $row['nama'];
    }
} else if(isset($_GET['id_guru'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_guru where id_guru ='$_GET[id_guru]'");
    while ($row = mysqli_fetch_array($query)) {
        $user = $row['nip'];
        $nama = $row['nama_guru'];
        $password = $row['password'];
    }
} else{
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
        <input class="form-control" type="text" name="username" placeholder="Username" required="" value="<?php if (isset($user)) echo $user; ?>">
    </div>
</div>
<div class="row form-group">
    <div class="col-lg-3">
        <label>Password</label>
    </div>
    <div class="col-lg-9">
        <input class="form-control" type="password" name="password" placeholder="Password" required="" value="<?php if (isset($password)) echo $password; ?>">
    </div>
</div>

