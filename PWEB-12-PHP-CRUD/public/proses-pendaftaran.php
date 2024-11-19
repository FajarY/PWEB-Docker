<?php 
include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nama = htmlspecialchars(trim($_POST["nama"]));
    $jenis_kelamin = htmlspecialchars(trim($_POST["jenis_kelamin"]));
    $agama = htmlspecialchars(trim($_POST["agama"]));
    $alamat = htmlspecialchars(trim($_POST["alamat"]));
    $sekolah_asal = htmlspecialchars(trim($_POST["sekolah_asal"]));
    $pendaftar_id = htmlspecialchars(trim($_POST["petugas_id"]));

    if(empty($nama) || empty($jenis_kelamin) || empty($agama) || empty($alamat) || empty($sekolah_asal) || empty($pendaftar_id))
    {
        header("Location: index.php?status=invalid");
    }
    else
    {
        $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, pegawai_pendaftar_id) VALUE ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal', '$pendaftar_id');";
        $query = mysqli_query($db, $sql);

        if($query)
        {
            header("Location: index.php?status=success");
        }
        else
        {
            header("Location: index.php?status=fail");
        }
    }
}
else
{
    die("Forbidden!");
}
?>