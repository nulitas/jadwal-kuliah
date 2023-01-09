<?php
require 'dbconn.php';

$result = $conn->query("SELECT id_data, hari, slot_waktu, mata_kuliah, dosen, dosen, ruang, kelas, tahun, jumlah_jam, semester FROM data_master");

while ($row = $result->fetch_assoc()) {
    $data_masters[] = $row;
}

// foreach ($data_masters as $data_master) {
//     echo $data_master['hari'];
// }
$jsonfile = json_encode($data_masters, JSON_PRETTY_PRINT);

file_put_contents('jadwal.json', $jsonfile);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Array</title>
</head>

<body>

    <h1>Data telah ditambahkan ke json</h1>

</body>

</html>