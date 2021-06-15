<?php
session_start();
include '../koneksi.php';
$modul = $_GET['module'];
$ac = $_GET['act'];

if ($modul == 'kelas' && $ac == 'ubah') {
    $nama_kelas = $_POST['nama_kelas'];
    $id = $_POST['id'];
    if ($query = mysqli_query($conn, "UPDATE tb_kelas set nama_kelas = '$nama_kelas' 
    where id = '$id'")) {
        echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=kelas'; </script>";
    } else {
        echo "<script>alert('Gagal Mengubah Data'); window.location.href='../adminweb/index.php?page=kelas'; </script>";
    }
} elseif ($modul == 'guru' && $ac == 'ubah') {
    $id_kelas = $_POST['id_kelas'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $id_guru = $_POST['id_guru'];
    if ($query = mysqli_query($conn, "UPDATE tb_guru set id_kelas = '$id_kelas', nip = '$nip', nama_guru = '$nama', 
    tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', 
    agama = '$agama', no_telp = '$no_telp', alamat = '$alamat' where id_guru = '$id_guru'")) {
        echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=guru'; </script>";
    } else {
        echo "<script>alert('Gagal Mengubah Data'); window.location.href='../adminweb/index.php?page=guru'; </script>";
    }
} elseif ($modul == 'siswa' && $ac == 'ubah') {
    $id_kelas = $_POST['id_kelas'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $id_kelas = $_POST['id_kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $id_siswa = $_POST['id_siswa'];
    if ($query = mysqli_query($conn, "UPDATE tb_siswa set id_kelas = '$id_kelas', nis = '$nis', nama = '$nama', 
    tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', 
    agama = '$agama', alamat = '$alamat' where id = '$id_siswa'")) {
        echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=siswa'; </script>";
    } else {
        echo "<script>alert('Gagal Mengubah Data'); window.location.href='../adminweb/index.php?page=siswa'; </script>";
    }
    // } elseif ($modul == 'user' && $ac == 'ubah') {
    //     $username = $_POST['username'];
    //     $email = $_POST['email'];
    //     $fullname = $_POST['fullname'];
    //     $id = $_POST['id'];
    //     if (empty($_POST['password'])) {
    //         if ($query = mysqli_query($conn, "UPDATE tb_user set username = '$username',email ='$email',fullname ='$fullname' 
    //         where id = '$id'")) {
    //             echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
    //         }
    //     } else {
    //         $password = md5($_POST['password']);
    //         if ($query = mysqli_query($conn, "UPDATE tb_user set username = '$username',password = '$password' 
    //         where id = '$id'")) {
    //             echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
    //         }
    //     }
} elseif ($modul == 'kriteria' && $ac == 'ubah') {
    $id = $_POST['id'];
    $nama_kriteria = $_POST['nama_kriteria'];
    $bobot = $_POST['bobot'];
    $sifat = $_POST['jenis'];
    if ($query = mysqli_query($conn, "UPDATE tb_kriteria set nama_kriteria = '$nama_kriteria', bobot = '$bobot', 
    sifat = '$sifat' where id = '$id'")) {
        echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=kriteria'; </script>";
    } else {
        echo "<script>alert('Gagal Mengubah Data'); window.location.href='../adminweb/index.php?page=kriteria'; </script>";
    }
} elseif ($modul == 'user' && $ac == 'ubah') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    } else {
        $id = $_POST['id_guru'];
    }
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($_POST['id'])) {
        if ($query = mysqli_query($conn, "UPDATE tb_user set username = '$username', nama = '$nama', 
        password = '$password' where id = '$id'")) {
            echo "<script>alert('Berhasil Mengubsah Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
        } else {
            echo "<script>alert('Gagal Mengubsah Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
        }
    } else {
        if ($query = mysqli_query($conn, "UPDATE tb_guru set nip = '$username', password = '$password', nama_guru ='$nama' 
        where id_guru = '$id'")) {
            echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
        } else {
            echo "<script>alert('Gagal Mengubah Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
        }
    }
} 
// elseif ($modul == 'nilai' && $ac == 'ubah') {
//     $id = $_POST['id'];
//     $query = mysqli_query($conn, "SELECT * FROM tb_kriteria where id != '1'");
//     while ($row = mysqli_fetch_array($query)) {
//         $nilai = $_POST['nilai'][$row['id']];
//         if (mysqli_query($conn, "UPDATE tb_matrik set nilai = '$nilai' 
//         where id_siswa = '$id' and id_kriteria ='$row[id]'")) {
//             echo "<script>alert('Berhasil Mengubsah Data'); window.location.href='../adminweb/index.php?page=nilai'; </script>";
//         } else {
//             echo "<script>alert('Gagal Mengubsah Data'); window.location.href='../adminweb/index.php?page=nilai'; </script>";
//         }
//     }
// }
