<?php
// bagian untuk Paging Group
class PagingUser
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=user'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=user&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingPelamar
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=pelamar'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=pelamar&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingKriteria
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=kriteria'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=kriteria&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingIdealPositif
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=hasil&tab=jarak_solusi'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=hasil&tab=jarak_solusi&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingIdealNegatif
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=hasil&tab=jarak_solusi'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=hasil&tab=jarak_solusi&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingGuru
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=guru'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=guru&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingNilai
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=nilai'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=nilai&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingKelas
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=kelas'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=kelas&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingSiswa
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=siswa'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=siswa&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingRaport
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=raport'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=raport&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
