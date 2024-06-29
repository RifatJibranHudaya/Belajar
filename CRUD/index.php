<?php

//Panggil Koneksi Database
include "koneksi.php";

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crud php dan mysql</title>
</head>

<body>


    <div class="container">

        <div class="mt-3">
            <h3 class="text-center">CRUD PHP DAN MYSQL DENGAN Bootstrap 5</h3>
            <h3 class="text-center">UAS</h3>
        </div>
        <div class="card mt-3 ">
            <div class="card-header bg-primary text-white">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modaltambah">
                    Tambah Data
                </button>

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <td>No.</td>
                        <td>Nim</td>
                        <td>Nama Lengkap</td>
                        <td>Alamat</td>
                        <td>Jurusan</td>
                        <td>Aksi</td>
                    </tr>

                    <?php

                    //Persiapan Menampilkan data
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs ORDER BY id_mhs DESC");
                    while ($data = mysqli_fetch_array($tampil)):


                        ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nim'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['prodi'] ?></td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                            </td>
                        </tr>
                        <!-- Awal Modal Ubah-->
                        <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Form Data Mahasiswa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id_mhs" value="<?=$data['id_mhs']?>">
                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label class="form-label">NIM</label>
                                                <input type="text" class="form-control" name="tnim" value="<?=$data['nim']?>"
                                                    placeholder="Masukan Nim Anda!">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="tnama" value="<?=$data['nama']?>"
                                                    placeholder="Masukan Nama Lengkap">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Alamat</label>
                                                <textarea class="form-control" name="talamat" rows="3"><?=$data['alamat']?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Prodi</label>
                                                <select class="form-select" name="tprodi">
                                                    <option value="<?=$data['prodi']?>"></option>
                                                    <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                                                    <option value="S1 - Ilmu Komunikasi">S1 - Ilmu Komunikasi</option>
                                                    <option value="S1 - Pariwisata">S1 - Pariwisata</option>
                                                    <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                                                    <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                                                </select>
                                            </div>




                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="bubah">Ubah</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Keluar</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal -->


                         <!-- Awal Modal Hapus-->
                         <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id_mhs" value="<?=$data['id_mhs']?>">
                                        <div class="modal-body">

                                            <h5 class="text-center" >Apakah Anda yakin akan menghapus data ini?<br>
                                            <span class="text-danger"><?=$data['nim']?> - <?=$data['nama']?></span>
                                            </h5>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bhapus">Anda yakin ingin Menghapus</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Keluar</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal -->
                    <?php endwhile; ?>
                </table>



                <!-- Awal Modal  Tambah-->
                <div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Form Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="aksi_crud.php">
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label">NIM</label>
                                        <input type="text" class="form-control" name="tnim"
                                            placeholder="Masukan Nim Anda!">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="tnama"
                                            placeholder="Masukan Nama Lengkap">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="talamat" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Prodi</label>
                                        <select class="form-select" name="tprodi">
                                            <option></option>
                                            <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika
                                            </option>
                                            <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                                            <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                                        </select>
                                    </div>




                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal -->
            </div>
        </div>
    </div>
    <div class="position-absolute top-0 end-0 mt-3 me-3" >
        <a href="login.php"><button type="submit" class="btn btn-primary">Logout</button></a></div><br>
    <div class="position-absolute top-0 start-0 mt-3 ms-3"><a href="pdf.php">
        <button type="submit" class="btn btn-success">Cetak</button></a></div>
    
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>