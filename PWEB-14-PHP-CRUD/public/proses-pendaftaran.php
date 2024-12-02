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

    if(!isset($_FILES["image"]))
    {
        header("Location: index.php?status=invalid");
    }
    $image = mysqli_real_escape_string($db, file_get_contents($_FILES["image"]["tmp_name"]));
    $image_type = $_FILES["image"]["type"];

    if(empty($nama) || empty($jenis_kelamin) || empty($agama) || empty($alamat) || empty($sekolah_asal) || empty($pendaftar_id) || empty($image) || empty($image_type) || ($image_type != 'image/png' && $image_type != 'image/jpg' && $image_type != 'image/jpeg'))
    {
        header("Location: index.php?status=invalid");
    }
    else
    {
        $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, pegawai_pendaftar_id, image, image_type) VALUE ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal', '$pendaftar_id', '$image', '$image_type');";
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