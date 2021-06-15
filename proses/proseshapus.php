<?php
session_start();
include '../koneksi.php';
$modul = $_GET['module'];
$ac = $_GET['act'];

if ($modul == 'kelas' and $ac == 'hapus') {
    if (mysqli_query($conn, "DELETE FROM tb_kelas WHERE id='$_POST[id]'")) {
        echo "<script>alert('Berhasil Menghapus Data'); window.location.href='../adminweb/index.php?page=kelas'; </script>";
    }
} elseif ($modul == 'guru' and $ac == 'hapus') {
    if (mysqli_query($conn, "DELETE FROM tb_guru WHERE id_guru='$_POST[id_guru]'")) {
        echo "<script>alert('Berhasil Menghapus Data'); window.location.href='../adminweb/index.php?page=guru'; </script>";
    }
} elseif ($modul == 'siswa' and $ac == 'hapus') {
    if (mysqli_query($conn, "DELETE FROM tb_siswa WHERE id='$_POST[id_siswa]'")) {
        echo "<script>alert('Berhasil Menghapus Data'); window.location.href='../adminweb/index.php?page=siswa'; </script>";
    }
} elseif ($modul == 'raport' and $ac == 'hapus') {
    if (mysqli_query($conn, "DELETE FROM tb_raport WHERE id_siswa='$_GET[id]'")) {
        echo "<script>alert('Berhasil Menghapus Data'); window.location.href='../adminweb/index.php?page=raport'; </script>";
    }
} elseif ($modul == 'kriteria' and $ac == 'hapus') {
    if (mysqli_query($conn, "DELETE FROM tb_kriteria WHERE id='$_GET[id]'")) {
        echo "<script>alert('Berhasil Menghapus Data'); window.location.href='../adminweb/index.php?page=kriteria'; </script>";
    }
} elseif ($modul == 'user' and $ac == 'hapus') {
    if(isset($_GET['id_guru'])){
        if (mysqli_query($conn, "DELETE FROM tb_guru WHERE id_guru='$_GET[id_guru]'")) {
            echo "<script>alert('Berhasil Menghapus Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
        }
    }else{
        if (mysqli_query($conn, "DELETE FROM tb_user WHERE id='$_GET[id]'")) {
            echo "<script>alert('Berhasil Menghapus Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
        }
    }
    
}
