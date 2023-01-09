<?php

include 'dbconn.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        td {
            background-color: #fefefe;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        table {

            min-width: max-content;

            border-collapse: separate;
            border-spacing: 0px;

        }

        table th {
            position: sticky;
            top: 0px;

            background-color: black;
            color: white;

            text-align: center;
            font-weight: normal;
            font-size: 18px;
            outline: 0.7px solid black;
            border: 1.5px solid black;

        }

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .custom-file-input::before {
            content: 'Pilih File';
            display: inline-block;
            background: linear-gradient(top, #f9f9f9, #e3e3e3);
            border: 2px solid black;

            padding: 5px 8px;
            outline: none;
            white-space: nowrap;

            cursor: pointer;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-size: 10pt;
        }

        .table-wrapper {
            overflow-y: scroll;
            overflow-x: scroll;
            height: fit-content;
            max-height: 66.4vh;

            margin-top: 22px;

            margin: 15px;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>

    <section class="">
        <div class="border-black border flex flex-col w-fit mx-auto m-5 p-5">
            <form action="in_xlsx.php" method="post" enctype="multipart/form-data">
                <div class="flex justify-between">

                    <span>Menu</span><br>
                    <a href="index.php" class="bg-slate-50 border-black border-2 hover:bg-black hover:text-white text-black font-bold py-2 px-4 ">Home</a>
                    <a href="logout.php" class="bg-slate-50 border-black border-2 hover:bg-black hover:text-white text-black font-bold py-2 px-4 ">Logout</a>
                </div>

                <div class="m-4">
                    <input type="file" id="file" name="import_file" class="custom-file-input" />
                </div>

                <div>
                    <button type="submit" name="import_file_btn" class="bg-slate-50 border-black border-2 hover:bg-black hover:text-white text-black font-bold py-2 px-4 " id="addButton">
                        Upload Excel
                    </button>
                </div>
            </form>

            <span class=" font-bold">or</span>
            <button class="bg-slate-50 border-black border-2 hover:bg-black hover:text-white text-black font-bold py-2 px-4 " id="addButton">
                <a href="data_add.php">
                    Tambah Manual
                </a>
            </button>

            <span class=" font-bold">Lihat JSON</span>

            <button class=" bg-slate-50 border-black border-2 hover:bg-black hover:text-white text-black font-bold py-2 px-4 " id="addButton">
                <a href="data_array.php">
                    Unduh JSON
                </a>
            </button>

        </div>
        <div class="outer-wrapper">
            <div class="table-wrapper">

                <table class=" m-auto border-black  border-2 ">
                    <thead class="bg-black  text-white w-full">

                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Slot Waktu</th>
                            <th>Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Ruang</th>
                            <th>Kelas</th>
                            <th>Tahun</th>
                            <th>Jumlah Jam</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php

                    $rows = mysqli_query($conn, "SELECT * FROM data_master");
                    $no = 1;
                    ?>

                    <?php foreach ($rows as $row) : ?>
                        <tbody style="height: 10vh;">
                            <tr id=<?php echo $row["id_data"]; ?>>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['hari']; ?></td>
                                <td><?php echo $row['slot_waktu']; ?></td>
                                <td><?php echo $row['mata_kuliah']; ?></td>
                                <td><?php echo $row['dosen']; ?></td>
                                <td><?php echo $row['ruang']; ?></td>
                                <td><?php echo $row['kelas']; ?></td>
                                <td><?php echo $row['tahun']; ?></td>
                                <td><?php echo $row['jumlah_jam']; ?></td>
                                <td><?php echo $row['semester']; ?></td>
                                <td> <a href="data_edit.php?id_data=<?php echo $row['id_data']; ?>">Ubah</a> | <button type="button" onclick="submitData(<?php echo $row['id_data']; ?>);">Hapus</button> </td>
                            </tr>
                        </tbody>

                    <?php endforeach; ?>

                </table>

            </div>
        </div>
        <?php require 'script.php';
        ?>
    </section>

</body>

</html>