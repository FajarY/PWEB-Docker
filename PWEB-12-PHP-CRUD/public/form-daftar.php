<!DOCTYPE html>
<html>
    <head>
        <title>Pendaftaran Siswa Baru SMAN1</title>
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
                    <form class="w-full" method="post" action="proses-pendaftaran.php">
                        <label for="nama" class="font-bold">Nama</label><br>
                        <input class="w-full p-2 border border-solid rounded-md mt-2 mb-2" type="text" name="nama" placeholder="Masukkan nama lengkap..." required>

                        <label for="jenis_kelamin" class="font-bold">Jenis Kelamin</label><br>
                        <input type="radio" class="mr-1" name="jenis_kelamin" value="Laki-laki" required><label>Laki-laki</label><br>
                        <input type="radio" class="mr-1 mb-2" name="jenis_kelamin" value="Perempuan" required><label>Perempuan</label><br>

                        <label for="agama" class="font-bold">Agama</label><br>
                        <select class="w-full p-2 border border-solid rounded-md mt-2 mb-2" name="agama" required>
                            <option value="" selected disabled class="text-gray-50">Masukkan agama...</option>
                            <option>Hindu</option>
                            <option>Kristen</option>
                            <option>Islam</option>
                            <option>Budha</option>
                            <option>Konghucu</option>
                        </select><br>

                        <label for="petugas_id" class="font-bold">Petugas Pendaftaran</label><br>
                        <select class="w-full p-2 border border-solid rounded-md mt-2 mb-2" name="petugas_id" required>
                            <option value="" selected disabled class="text-gray-50">Masukkan petugas pendaftaran...</option>
                            <?php
                            include("config.php");

                            $sql = "SELECT * FROM pegawai";
                            $query = mysqli_query($db, $sql);

                            while($petugas = mysqli_fetch_array($query))
                            {
                                echo "<option value=".$petugas['id']."> ".$petugas['nama']."</option>";
                            }
                            ?>
                        </select><br>

                        <label for="alamat" class="font-bold">Alamat</label><br>
                        <textarea class="w-full p-2 border border-solid rounded-md mt-2 mb-2" name="alamat" required placeholder="Masukkan alamat..."></textarea>

                        <label for="sekolah-asal" class="font-bold">Sekolah Asal</label><br>
                        <input class="w-full p-2 border border-solid rounded-md mt-2 mb-2" type="text" name="sekolah_asal" placeholder="Masukkan sekolah asal..." required>

                        <input type="submit" value="Daftar" class="w-full bg-blue-400 text-white rounded-md shadow font-bold p-2 transition-all ease-in-out duration-200 hover:bg-black hover:text-white cursor-pointer" onclick="">
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>