<?php
session_start();
include '../koneksi.php';
$modul = $_GET['module'];
$ac = $_GET['act'];

if ($modul == 'kelas' && $ac == 'input') {
    $nama_kelas = $_POST['nama_kelas'];
    if ($query = mysqli_query($conn, "INSERT INTO tb_kelas (nama_kelas) 
    Values ('$nama_kelas')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=kelas'; </script>";
    }
} elseif ($modul == 'guru' && $ac == 'input') {
    $id_kelas = $_POST['id_kelas'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $password = $_POST['nip'];
    if ($query = mysqli_query($conn, "INSERT INTO tb_guru (id_kelas,nip,nama_guru,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,no_telp,alamat,password)
    values ('$id_kelas','$nip','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$no_telp','$alamat','$password')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=guru'; </script>";
    } else {
        echo "<script>alert('Gagal Menambah Data'); window.location.href='../adminweb/index.php?page=guru'; </script>";
    }
} elseif ($modul == 'siswa' && $ac == 'input') {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $id_kelas = $_POST['id_kelas'];
    if ($query = mysqli_query($conn, "INSERT INTO tb_siswa (id_kelas,nis,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,alamat)
    values ('$id_kelas','$nis','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=siswa'; </script>";
    } else {
        echo "<script>alert('Gagal Menambah Data'); window.location.href='../adminweb/index.php?page=siswa'; </script>";
    }
} elseif ($modul == 'user' && $ac == 'input') {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    if ($query = mysqli_query($conn, "INSERT INTO tb_user (username,password,level,nama)
    values ('$username','$password','$level','$nama')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
    } else {
        echo "<script>alert('Gagal Menambah Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
    }
} elseif ($modul == 'kriteria' && $ac == 'input') {
    $nama_kriteria = $_POST['nama_kriteria'];
    $bobot = $_POST['bobot'];
    $jenis = $_POST['jenis'];
    if ($query = mysqli_query($conn, "INSERT INTO tb_kriteria (nama_kriteria,sifat,bobot)
    values ('$nama_kriteria','$jenis','$bobot')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=kriteria'; </script>";
    } else {
        echo "<script>alert('Gagal Menambah Data'); window.location.href='../adminweb/index.php?page=kriteria'; </script>";
    }
} elseif ($modul == 'raport' && $ac == 'input') {

    $query = mysqli_query($conn, "SELECT * FROM tb_mapel");
    while ($row = mysqli_fetch_array($query)) {
        $mapel = $_POST['nilai'][$row['id']];
        $id_mapel = $row['id'];
        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_raport where id_siswa = '$_POST[id_siswa]' and id_mapel ='$id_mapel'"));
        if ($cek > 0) {
            $update = mysqli_query($conn, "UPDATE tb_raport set nilai='$mapel' where id_siswa='$_POST[id_siswa]' and id_mapel ='$id_mapel'");
            // echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=raport'; </script>";
        } else {
            $insert = mysqli_query($conn, "INSERT INTO tb_raport (id_siswa,id_mapel,nilai)values ('$_POST[id_siswa]','$id_mapel','$mapel')");
            // echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=raport'; </script>";
        }
    }
    $sum = mysqli_query($conn, "SELECT avg(nilai) as skor FROM tb_raport where id_siswa ='$_POST[id_siswa]' group by id_siswa");
    $row_sum = mysqli_fetch_array($sum);
    // var_dump($_POST['id_siswa']);
    $cek_sum = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_matrik where id_siswa = '$_POST[id_siswa]' and id_kriteria ='$_POST[raport]'"));
    if ($cek_sum > 0) {
        if ($edit = mysqli_query($conn, "UPDATE tb_matrik set nilai ='$row_sum[skor]' where id_siswa = '$_POST[id_siswa]' and id_kriteria = '$_POST[raport]'")) {
            echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=raport'; </script>";
        } else {
            echo "<script>alert('Gagal Mengubah Data'); window.location.href='../adminweb/index.php?page=raport'; </script>";
        }
    } else {
        if ($add = mysqli_query($conn, "INSERT INTO tb_matrik (id_kriteria,id_siswa,nilai) values('$_POST[raport]','$_POST[id_siswa]','$row_sum[skor]')")) {
            echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=raport'; </script>";
        } else {
            echo "<script>alert('Gagal Menambah Data'); window.location.href='../adminweb/index.php?page=raport'; </script>";
        }
    }
} elseif ($modul == 'nilai' && $ac == 'input') {

    $query = mysqli_query($conn, "SELECT * FROM tb_kriteria where nama_kriteria not like '%raport%'");

    while ($row = mysqli_fetch_array($query)) {
        $kriteria = $_POST['nilai'][$row['id']];
        $id_kriteria = $row['id'];

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_matrik where id_siswa = '$_POST[id_siswa]' 
        and id_kriteria ='$id_kriteria'"));
        if ($cek > 0) {
            if ($update = mysqli_query($conn, "UPDATE tb_matrik set nilai='$kriteria' where id_siswa='$_POST[id_siswa]' and id_kriteria ='$id_kriteria'")) {
                echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=nilai'; </script>";
            } else {
                echo "<script>alert('Gagal Mengubah Data'); window.location.href='../adminweb/index.php?page=nilai'; </script>";
            }
        } else {
            if ($insert = mysqli_query($conn, "INSERT INTO tb_matrik (id_siswa,id_kriteria,nilai)values ('$_POST[id_siswa]','$id_kriteria','$kriteria')")) {
                echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=nilai'; </script>";
            } else {
                echo "<script>alert('Gagal Menambah Data'); window.location.href='../adminweb/index.php?page=nilai'; </script>";
            }
        }
    }
}
