<?php
include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = htmlspecialchars(trim($_POST["id"]));
    $nama = htmlspecialchars(trim($_POST["nama"]));
    $jenis_kelamin = htmlspecialchars(trim($_POST["jenis_kelamin"]));
    $agama = htmlspecialchars(trim($_POST["agama"]));
    $alamat = htmlspecialchars(trim($_POST["alamat"]));
    $sekolah_asal = htmlspecialchars(trim($_POST["sekolah_asal"]));
    $petugas_id = htmlspecialchars(trim($_POST["petugas_id"]));

    if(empty($nama) || empty($jenis_kelamin) || empty($agama) || empty($alamat) || empty($sekolah_asal) || empty($petugas_id))
    {
        header("Location: index.php?update=invalid");
    }
    else
    {
        $sql = "UPDATE calon_siswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', agama='$agama', alamat='$alamat', sekolah_asal='$sekolah_asal', pegawai_pendaftar_id='$petugas_id' WHERE id=$id;";
        $query = mysqli_query($db, $sql);

        if($query)
        {
            header("Location: list-siswa.php?update=success");
        }
        else
        {
            header("Location: list-siswa.php?update=fail");
        }
    }
}
else
{
    die("Forbidden!");
}
?>