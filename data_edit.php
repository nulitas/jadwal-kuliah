<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Edit</title>
</head>

<body>
    <?php
    // $hari = $_GET["hari"];
    ?>

    <div class="container mx-auto ">

        <div class="max-w-xl p-5 mx-auto my-10 bg-white shadow-sm border-black border-2">
            <a href="dashboard.php" class="border-2 border-black p-1 hover:text-white hover:bg-black"> Back </a>
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700">Edit Data</h1>
                <p class="text-gray-400">Mengedit data untuk jadwal mata kuliah</p>
            </div>
            <div>
                <form action="" method="POST">
                    <?php
                    require 'dbconn.php';
                    $id_data = $_GET["id_data"];
                    $rows = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM data_master WHERE id_data = $id_data"));

                    ?>
                    <div class="mb-6">
                        <input type="hidden" id="id_data" value="<?php echo $rows['id_data']; ?>">
                        <label for="hari" class="block mb-2 text-sm text-gray-600">Hari</label>
                        <input value="<?php echo $rows['hari']; ?>" type="text" name="hari" id="hari" placeholder="Kamis" required class="w-full px-3 py-2 placeholder-gray-300 border border-black  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                        <!-- <select name="hari" id="hari" class="form-select">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select> -->
                    </div>
                    <div class="mb-6">
                        <label for="slot_waktu" class="block mb-2 text-sm text-gray-600">Slot Waktu</label>
                        <input value="<?php echo $rows['slot_waktu']; ?>" type="text" name="slot_waktu" id="slot_waktu" placeholder="07.30 - 08.20" required class="w-full px-3 py-2 placeholder-gray-300 border border-black  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                    </div>
                    <div class="mb-6">
                        <label for="mata_Kuliah" class="block mb-2 text-sm text-gray-600">Mata Kuliah</label>
                        <input value="<?php echo $rows['mata_kuliah']; ?>" type="text" name="mata_kuliah" id="mata_kuliah" placeholder="Web Lanjut" required class="w-full px-3 py-2 placeholder-gray-300 border border-black  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                    </div>
                    <div class="mb-6">
                        <label for="dosen" class="block mb-2 text-sm text-gray-600">Dosen</label>
                        <input value="<?php echo $rows['dosen']; ?>" type="text" name="dosen" id="dosen" placeholder="Anggi" required class="w-full px-3 py-2 placeholder-gray-300 border border-black  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                    </div>
                    <div class="mb-6">
                        <label for="ruang" class="block mb-2 text-sm text-gray-600">Ruang</label>
                        <input value="<?php echo $rows['ruang']; ?>" type="text" name="ruang" id="ruang" placeholder="AA303" required class="w-full px-3 py-2 placeholder-gray-300 border border-black  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                    </div>
                    <div class="mb-6">
                        <label for="kelas" class="block mb-2 text-sm text-gray-600">Kelas</label>
                        <input value="<?php echo $rows['kelas']; ?>" type="text" name="kelas" id="kelas" placeholder="TI-3B" required class="w-full px-3 py-2 placeholder-gray-300 border border-black  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                    </div>
                    <div class="mb-6">
                        <label for="tahun" class="block mb-2 text-sm text-gray-600">Tahun</label>
                        <input value="<?php echo $rows['tahun']; ?>" type="text" name="tahun" id="tahun" placeholder="2022-2023" required class="w-full px-3 py-2 placeholder-gray-300 border border-black  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                    </div>
                    <div class="mb-6">
                        <label for="jumlah_jam" class="block mb-2 text-sm text-gray-600">Jumlah Jam</label>
                        <input value="<?php echo $rows['jumlah_jam']; ?>" type="text" name="jumlah_jam" id="jumlah_jam" placeholder="4" required class="w-full px-3 py-2 placeholder-gray-300 border border-black  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                    </div>
                    <div class="mb-6">
                        <label for="semester" class="block mb-2 text-sm text-gray-600">Semester</label>
                        <input value="<?php echo $rows['semester']; ?>" type="text" name="semester" id="semester" placeholder="3" required class="w-full px-3 py-2 placeholder-gray-300 border border-black  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                    </div>


                    <div class="mb-6">
                        <button type="submit" onclick="submitData('edit');" class="w-full px-2 py-4 text-white bg-black focus:bg-black focus:outline-none">
                            Edit Jadwal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <a href="dashboard.php">Go To Index</a>
    <?php require 'script.php';
    ?>
</body>

</html>