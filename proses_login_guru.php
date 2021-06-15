<?php

include('koneksi.php');

session_start();

$nip = $_POST['nip'];
$password = $_POST['password'];
// $query = "SELECT * FROM pengguna where username ='$username' AND password='".md5($password)."'";
$query = "SELECT * FROM tb_guru where nip ='$nip' AND password='$password'";

$hasil = mysqli_query($conn, $query);

if (mysqli_num_rows($hasil) > 0) {
    $data = mysqli_fetch_assoc($hasil);
    $_SESSION['login'] = true;
    $_SESSION['id_guru'] = $data['id'];
    $_SESSION['nip'] = $data['nip'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama_guru'] = $data['nama_guru'];
    $_SESSION['id_kelas'] = $data['id_kelas'];
    $_SESSION['level'] = 'guru';

    $_SESSION['pesan'] = "Selamat Datang " . $data['nama_guru'];
    header('location:adminweb/index.php');
    // var_dump($data);

} else {
    header('location:login.php');
    $_SESSION['pesan'] = "Username dan Password yang anda masukkan salah";
}
