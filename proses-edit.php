<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['ID'];
    $nama = $_POST['Nama'];
    $alamat = $_POST['Alamat'];
    $jk = $_POST['jenis_kelamin'];
    $sekolah = $_POST['Asal_Sekolah'];

    // buat query update
    $sql = "UPDATE tb_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', Asal_Sekolah='$sekolah' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-siswa.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>