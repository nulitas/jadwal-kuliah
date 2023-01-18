<?php
session_start();
require 'vendor/autoload.php';
require_once "config/dbconn.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['import_file_btn'])) {
    $allowed_ext = ['xls', 'csv', 'xlsx'];
    $fileName = $_FILES['import_file']['name'];
    $checking = explode(".", $fileName);
    $file_ext = end($checking);

    if (in_array($file_ext, $allowed_ext)) {
        $targetPath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $row) {
            $id = $row['0'];
            $hari = $row['1'];
            $slot_waktu = $row['2'];
            $mata_kuliah = $row['3'];
            $dosen = $row['4'];
            $ruang = $row['5'];
            $kelas = $row['6'];
            $tahun = $row['7'];
            $jumlah_jam = $row['8'];
            $semester = $row['9'];

            $checkSchedule = "SELECT id_data FROM data_master WHERE id_data ='$id'";
            $checkSchedule_result = mysqli_query($conn, $checkSchedule);

            if (mysqli_num_rows($checkSchedule_result) > 0) {
                $up_query = "UPDATE data_master SET hari='$hari', slot_waktu ='$slot_waktu' , mata_kuliah='$mata_kuliah', dosen='$dosen', ruang='$ruang', kelas='$kelas', tahun='$tahun', jumlah_jam='$jumlah_jam', semester='$semester' WHERE id_data='$id'";
                $up_result = mysqli_query($conn, $up_query);
            } else {
                $in_query = "INSERT INTO data_master(hari, slot_waktu , mata_kuliah, dosen, ruang, kelas, tahun, jumlah_jam, semester ) VALUES('$hari', '$slot_waktu' , '$mata_kuliah', '$dosen' , '$ruang', '$kelas' ,'$tahun', '$jumlah_jam', '$semester')";
                $in_result = mysqli_query($conn, $in_query);
            }
        }

        // if (isset($msg)) {
        //     $_SESSION['status'] = "File imported successfully";
        //     header("Location: dashboard.php");
        // } else {
        //     $_SESSION['status'] = "File importing failed";
        //     header("Location: dashboard.php");
        // }

        header("Location: dashboard.php");
    } else {
        // $_SESSION['status'] = "invalid file";
        header("Location: dashboard.php");
        exit(0);
    }
}
