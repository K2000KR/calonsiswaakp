<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM tb_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Siswa | SMK Coding</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Siswa</h3>
    </header>

    <form action="proses-edit.php" method="POST">

        <fieldset>

            <input type="hidden" name="ID" value="<?php echo $siswa['ID'] ?>" />

        <p>
            <label for="Nama">Nama: </label>
            <input type="text" name="Nama" placeholder="nama lengkap" value="<?php echo $siswa['Nama'] ?>" />
        </p>
        <p>
            <label for="Alamat">Alamat: </label>
            <textarea name="Alamat"><?php echo $siswa['Alamat'] ?></textarea>
        </p>
        <p>
            <label for="Jenis_Kelamin">Jenis Kelamin: </label>
            <?php $jk = $siswa['Jenis_Kelamin']; ?>
            <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>> Perempuan</label>
        </p>
        <p>
            <label for="Asal_Sekolah">Asal Sekolah </label>
            <input type="text" name="Asal_Sekolah" placeholder="nama sekolah" value="<?php echo $siswa['Asal_Sekolah'] ?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>

    </body>
</html>