<?php
require 'config/dbconn.php';

$result = $conn->query("SELECT id_data, hari, slot_waktu, mata_kuliah, dosen, dosen, ruang, kelas, tahun, jumlah_jam, semester FROM data_master");

while ($row = $result->fetch_assoc()) {
    $data_masters[] = $row;
}

$jsonfile = json_encode($data_masters, JSON_PRETTY_PRINT);

file_put_contents('jadwal.json', $jsonfile);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Array</title>
</head>

<body>



    <?php

    echo "<script> alert('Data berhasil diunduh') </script>";



    $sql = "SELECT * FROM data_master";
    $result = mysqli_query($conn, $sql);
    $json_array = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $json_array[] = $row;
    }
    echo '<pre>';
    print_r(json_encode($json_array));
    // echo '</pre>';
    // echo json_encode($json_array);


    ?>

    <div class="flex justify-center">
        <a href="dashboard.php" class=" bg-slate-50 border-black border-2 hover:bg-black hover:text-white text-black font-bold py-2 px-20 ">Back</a>
    </div>

</body>

</html>