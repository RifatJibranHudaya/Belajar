<?php

//panggil koneksi database
include "koneksi.php";

// uji jika tombol simpan di klik
if (isset($_POST['bsimpan'])) {

    //Persiapan simpan data baru

    $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim,nama,alamat,prodi)
                                      VALUES ('$_POST[tnim]',
                                              '$_POST[tnama]',
                                              '$_POST[talamat]',
                                              '$_POST[tprodi]')");
    // jika simpan sukses
    if ($simpan) {
        echo "<script>alert('Simpan data Sukses!');
        document.location='index.php';
        </script>";
    } else {
        echo "<script>alert('Simpan data Gagal!');
        document.location='index.php';
        </script>";
    }

}


// uji jika tombol Ubah di klik
if (isset($_POST['bubah'])) {

    //Persiapan Ubah Data

    $ubah = mysqli_query($koneksi, "UPDATE tmhs SET 
                                                    nim = '$_POST[tnim]',
                                                    nama = '$_POST[tnama]',
                                                    alamat = '$_POST[talamat]',
                                                    prodi = '$_POST[tprodi]'
                                                WHERE id_mhs = '$_POST[id_mhs]'
                                                    ");
    // jika Ubah sukses
    if ($ubah) {
        echo "<script>alert('Ubah data Sukses!');
        document.location='index.php';
        </script>";
    } else {
        echo "<script>alert('Ubah data Gagal!');
        document.location='index.php';
        </script>";
    }

}


// uji jika tombol Hapus di klik
if (isset($_POST['bhapus'])) {

    //Persiapan Hapus Data

    $hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_POST[id_mhs]'");
    // jika Hapus sukses
    if ($hapus) {
        echo "<script>alert('Hapus data Sukses!');
        document.location='index.php';
        </script>";
    } else {
        echo "<script>alert('Hapus data Gagal!');
        document.location='index.php';
        </script>";
    }

}

