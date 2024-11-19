<?php 
include('config.php');

if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Data Calon Siswa Baru SMAN1</title>
        <link rel="stylesheet" type="text/css" href="./output.css">
    </head>
    <body>
        <header class="w-full flex flex-row justify-center">
            <div class="p-4 m-4 w-8/12 bg-gradient-to-r from-red-300 to-blue-200 rounded-md shadow">
                <h1 class="font-bold text-2xl text-center text-white">Masukkan Data Pendaftar</h1>
            </div>
        </header>
        <main class="flex items-center flex-col">
            <div class="w-full sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl border border-s-2 rounded-md flex flex-row shadow">
                <div class="p-4 w-full">
                    <form class="w-full" method="post" action="update-pendaftaran.php">
                        <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>">
                        <label for="nama" class="font-bold">Nama</label><br>
                        <input class="w-full p-2 border border-solid rounded-md mt-2 mb-2" type="text" name="nama" placeholder="Masukkan nama lengkap..." value="<?php echo $siswa['nama']?>" required>

                        <label for="jenis-kelamin" class="font-bold">Jenis Kelamin</label><br>
                        <input type="radio" class="mr-1" name="jenis_kelamin" value="Laki-laki" <?php echo ($siswa['jenis_kelamin'] == 'Laki-laki') ? "checked" : "" ?> required><label>Laki-laki</label><br>
                        <input type="radio" class="mr-1 mb-2" name="jenis_kelamin" value="Perempuan" <?php echo ($siswa['jenis_kelamin'] == 'Perempuan') ? "checked" : "" ?> required><label>Perempuan</label><br>

                        <label for="agama" class="font-bold">Agama</label><br>
                        <select class="w-full p-2 border border-solid rounded-md mt-2 mb-2" name="agama" required>
                            <option value="" selected disabled class="text-gray-50">Masukkan agama...</option>
                            <option <?php echo ($siswa['agama'] == 'Hindu') ? "selected": "" ?>>Hindu</option>
                            <option <?php echo ($siswa['agama'] == 'Kristen') ? "selected": "" ?>>Kristen</option>
                            <option <?php echo ($siswa['agama'] == 'Islam') ? "selected": "" ?>>Islam</option>
                            <option <?php echo ($siswa['agama'] == 'Budha') ? "selected": "" ?>>Budha</option>
                            <option <?php echo ($siswa['agama'] == 'Konghucu') ? "selected": "" ?>>Konghucu</option>
                        </select><br>

                        <label for="petugas_id" class="font-bold">Petugas Pendaftaran</label><br>
                        <select class="w-full p-2 border border-solid rounded-md mt-2 mb-2" name="petugas_id" required>
                            <option value="" selected disabled class="text-gray-50">Masukkan petugas pendaftaran...</option>
                            <?php
                            $sql = "SELECT * FROM pegawai";
                            $query = mysqli_query($db, $sql);

                            while($petugas = mysqli_fetch_array($query))
                            {
                                echo "<option value=".$petugas['id']." ".(($siswa['pegawai_pendaftar_id'] == $petugas['id']) ? "selected" : "").">".$petugas['nama']."</option>";
                            }
                            ?>
                        </select><br>

                        <label for="alamat" class="font-bold">Alamat</label><br>
                        <textarea class="w-full p-2 border border-solid rounded-md mt-2 mb-2" name="alamat" required placeholder="Masukkan alamat..."><?php echo $siswa['alamat'] ?></textarea>

                        <label for="sekolah-asal" class="font-bold" val>Sekolah Asal</label><br>
                        <input class="w-full p-2 border border-solid rounded-md mt-2 mb-2" type="text" name="sekolah_asal" placeholder="Masukkan sekolah asal..." value="<?php echo $siswa['sekolah_asal']?>" required>

                        <input type="submit" value="Update" class="w-full bg-blue-400 text-white rounded-md shadow font-bold p-2 transition-all ease-in-out duration-200 hover:bg-black hover:text-white cursor-pointer" onclick="">
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>