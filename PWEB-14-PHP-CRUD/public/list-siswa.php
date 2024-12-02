<!DOCTYPE html>
<html>
    <head>
        <title>List Pendaftaran Siswa</title>
        <link rel="stylesheet" type="text/css" href="./output.css">
    </head>
    <body>
        <header class="w-full flex flex-row justify-center">
            <div class="p-8 m-8 w-8/12 bg-gradient-to-r from-red-300 to-blue-200 rounded-md shadow">
                <h1 class="font-bold text-2xl text-center text-white">List Siswa</h1>
            </div>
        </header>
        <main class="flex items-center flex-col">
            <div class="w-full sm:max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl border border-s-2 rounded-md flex flex-col justify-center items-center shadow p-4">
                <table class="w-full table-siswa md:text-sm lg:text-lg">
                    <thead>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Sekolah Asal</th>
                        <th>Pegawai Pendaftar</th>
                        <th>Tindakan</th>
                    </thead>
                    <tbody>
                        <?php 
                        include("config.php");

                        $sql = "SELECT id, nama, jenis_kelamin, agama, alamat, sekolah_asal, pegawai_pendaftar_id FROM calon_siswa";
                        $query = mysqli_query($db, $sql);

                        $pegawai_sql = "SELECT * FROM pegawai";
                        $pegawai_query = mysqli_query($db, $pegawai_sql);
                        $pegawai_array = array();

                        while($pegawai = mysqli_fetch_array($pegawai_query))
                        {
                            $pegawai_array[$pegawai['id']] = $pegawai;
                        }

                        while($siswa = mysqli_fetch_array($query))
                        {
                            echo "<tr>";

                            echo "<td>".$siswa['id']."</td>";
                            echo '<td class="flex justify-center"><img src="/image-siswa.php?id='.$siswa['id'].'" width="120" height="90"></td>';
                            echo "<td>".$siswa['nama']."</td>";
                            echo "<td>".$siswa['jenis_kelamin']."</td>";
                            echo "<td>".$siswa['agama']."</td>";
                            echo "<td>".$siswa['alamat']."</td>";
                            echo "<td>".$siswa['sekolah_asal']."</td>";
                            echo "<td>".$pegawai_array[$siswa['pegawai_pendaftar_id']]['nama']."</td>";

                            echo "<td>";
                            echo "<a class='text-blue-500 hover:text-blue-700' href='form-update.php?id=".$siswa['id']."'>Edit</a> | ";
                            echo "<a class='text-red-500 hover:text-red-700' href='delete-pendaftaran.php?id=".$siswa['id']."'>Hapus</a>";
                            echo "</td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <div class="w-full sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl bg-green-400 text-white font-bold p-4 text-center rounded-md mt-4 mb-4">
                Total : <?php echo mysqli_num_rows($query)?>
                </div>
            </div>

            <button class=" bg-blue-400 text-white rounded-md shadow font-bold p-4 transition-all ease-in-out duration-200 hover:bg-black hover:text-white cursor-pointer mt-4 mb-4" onclick="
            window.location.href='proses-pdf.php';
            ">Export To PDF</button>

            <?php if(isset($_GET['delete']) && $_GET['delete'] == 'succees'): ?>
            <div class="w-full sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl bg-green-400 text-white font-bold p-4 text-center rounded-md mt-4 mb-4 ">
                Delete data success!
            </div>
            <?php elseif(isset($_GET['delete']) && $_GET['delete'] == 'fail'): ?>
            <div class="w-full sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl bg-red-400 text-white font-bold p-4 text-center rounded-md mt-4 mb-4 ">
                Delete data gagal!
            </div>
            <?php elseif(isset($_GET['delete']) && $_GET['delete'] == 'invalid'): ?>
            <div class="w-full sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl bg-red-600 text-white font-bold p-4 text-center rounded-md mt-4 mb-4 ">
                Input yang diberikan tidak valid!
            </div>
            <?php endif; ?>

            <?php if(isset($_GET['update']) && $_GET['update'] == 'success'): ?>
            <div class="w-full sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl bg-green-400 text-white font-bold p-4 text-center rounded-md mt-4 mb-4 ">
                Update data success!
            </div>
            <?php elseif(isset($_GET['update']) && $_GET['update'] == 'fail'): ?>
            <div class="w-full sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl bg-red-400 text-white font-bold p-4 text-center rounded-md mt-4 mb-4 ">
                Update data gagal!
            </div>
            <?php elseif(isset($_GET['update']) && $_GET['update'] == 'invalid'): ?>
            <div class="w-full sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl bg-red-600 text-white font-bold p-4 text-center rounded-md mt-4 mb-4 ">
                Input yang diberikan tidak valid!
            </div>
            <?php endif; ?>
        </main>

        <header class="w-full flex flex-row justify-center">
            <div class="p-8 m-8 w-8/12 bg-gradient-to-r from-red-300 to-blue-200 rounded-md shadow">
                <h1 class="font-bold text-2xl text-center text-white">List Pegawai</h1>
            </div>
        </header>
        <main class="flex items-center flex-col">
            <div class="w-full sm:max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl border border-s-2 rounded-md flex flex-col items-center justify-center shadow p-4">
                <table class="w-full table-siswa md:text-sm lg:text-lg">
                    <thead>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                    </thead>
                    <tbody>
                        <?php 
                        include("config.php");

                        $sql = "SELECT * FROM pegawai";
                        $query = mysqli_query($db, $sql);

                        while($pegawai = mysqli_fetch_array($query))
                        {
                            echo "<tr>";

                            echo "<td>".$pegawai['id']."</td>";
                            echo "<td>".$pegawai['nama']."</td>";
                            echo "<td>".$pegawai['jabatan']."</td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="w-full sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl bg-green-400 text-white font-bold p-4 text-center rounded-md mt-4 mb-4">
                Total : <?php echo mysqli_num_rows($query)?>
                </div>
            </div>
        </main>
    </body>
</html>