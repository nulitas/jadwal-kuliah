<?php
require 'config/dbconn.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "insert") {
        insert();
    } else if ($_POST["action"] == "edit") {
        edit();
    } else {
        delete();
    }
}

function insert()
{
    global $conn;

    $hari =  $_POST["hari"];
    $slot_waktu =  $_POST["slot_waktu"];
    $mata_kuliah =  $_POST["mata_kuliah"];
    $dosen =  $_POST["dosen"];
    $ruang =  $_POST["ruang"];
    $kelas =  $_POST["kelas"];
    $tahun =  $_POST["tahun"];
    $jumlah_jam =  $_POST["jumlah_jam"];
    $semester =  $_POST["semester"];

    $query = "INSERT INTO data_master (hari, slot_waktu , mata_kuliah, dosen, ruang, kelas, tahun, jumlah_jam, semester) VALUES( '$hari', '$slot_waktu' , '$mata_kuliah', '$dosen', '$ruang' ,'$kelas', ' $tahun', '$jumlah_jam ', '$semester')";
    mysqli_query($conn, $query);
    echo "Data berhasil ditambahkan";

    if (isset($_POST['submit'])) {
        header("Location: dashboard.php");
    }
}

function edit()
{
    global $conn;

    $id_data = $_POST["id_data"];
    $hari =  $_POST["hari"];
    $slot_waktu =  $_POST["slot_waktu"];
    $mata_kuliah =  $_POST["mata_kuliah"];
    $dosen =  $_POST["dosen"];
    $ruang =  $_POST["ruang"];
    $kelas =  $_POST["kelas"];
    $tahun =  $_POST["tahun"];
    $jumlah_jam =  $_POST["jumlah_jam"];
    $semester =  $_POST["semester"];

    $query = "UPDATE data_master SET hari = '$hari', slot_waktu ='$slot_waktu' , mata_kuliah = '$mata_kuliah', dosen = '$dosen', ruang = '$ruang', kelas = '$kelas', tahun ='$tahun', jumlah_jam='$jumlah_jam', semester='$semester' WHERE id_data = $id_data";
    mysqli_query($conn, $query);
    echo "Data berhasil diperbarui";
}

function delete()
{
    global $conn;

    $id_data = $_POST["action"];
    $query = "DELETE FROM data_master WHERE id_data = $id_data";
    mysqli_query($conn, $query);
    echo "Data berhasil dihapus";
}
