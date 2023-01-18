<?php
require 'config/dbconn.php';
$query = mysqli_query($conn, "SELECT * FROM data_master");
$total = mysqli_num_rows($query);




?>



<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    </style>
</head>



<body>
    <div class="container">
        <header class=" p-5 flex justify-between ">
            <h1 class="text-[24px] text-black font-extrabold underline">JadwalApp</h1>
            <?php
            if (!isset($_SESSION['login'])) {
                echo ' <a href="auth/login.php" class="transition  duration-300 ease-in-out font-bold text-black p-2 hover:text-white hover:bg-black">Login</a>';
            } else {
                echo '<a href="auth/login.php" class="font-bold">Dashboard</a>';
            }


            ?>


        </header>

        <section class="my-5 max-w-screen-lg gap-10 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 mx-auto py-10 px-10">
            <?php
            $page = isset($_GET['hal']) ? (int)($_GET['hal']) : 1;
            $perPage = 4;
            if ($page > 1) {
                $start = ($page * $perPage) - $perPage;
            } else {
                $start = 0;
            }

            $rows = mysqli_query($conn, "SELECT * FROM data_master LIMIT $start, $perPage");
            $no = 1;
            ?>

            <?php foreach ($rows as $row) : ?>
                <div class=" bg-white font-inter w-full overflow-hidden shadow-lg transition  duration-300 ease-in-out hover:bg-black hover:text-white">

                    <div class="content p-[25px] flex flex-col" id=<?php echo $row["id_data"]; ?>>

                        <h1 class="font-[600] tracking-[0.33px]">
                            <?php echo $row['mata_kuliah']; ?> <span class="text-white font-[300] text-[10px]"><?php echo $row['jumlah_jam']; ?> Jam</span> </h1>
                        <p class="text-[#a1a1a6] font-[300] leading-[1.5] text-[14px]">
                            <?php echo $row['hari']; ?> <?php echo $row['slot_waktu']; ?> </p>
                        <p class="text-[#a1a1a6] font-[300] leading-[1.5] text-[14px]">
                            <?php echo $row['ruang']; ?></p>
                        <p class="text-[#a1a1a6] font-[300] leading-[1.5] text-[14px]">
                            Kelas <?php echo $row['kelas']; ?></p>

                        <p class="text-[#a1a1a6] font-[300] leading-[1.5] text-[14px]">
                        </p>

                        <div class="mt-[20px] flex items-center">

                            <div class="ml-[10px]">
                                <p class="text-[13px]">
                                    <?php echo $row['dosen']; ?></p>
                                <p class="text-[13px] flex mt-1 text-[#a1a1a6] items-center">
                                    <span>
                                        <?php echo $row['tahun']; ?></span>
                                    <span class="block w-[3px] h-[3px] bg-[#a1a1a6] rounded-full mx-1">
                                    </span>
                                    <span>
                                        Semester <?php echo $row['semester']; ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
            <!-- 
        </table> -->



        </section>
    </div>
    <div align="center" class="border-black border-2  bg-black text-white absolute bottom-0 m-10">

        <?php


        $pages = ceil($total / $perPage);

        if ($page > 1) {
            $link = $page - 1;
            echo "<a href= '?hal=$link' class='mx-2' > Prev </a>";
        } else {
            echo "<span class='mx-2 cursor-default	'>Prev</span>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            echo "<a href='?hal=$i' class='hover:text-slate-50'> </a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            echo "<a href='?hal=$i' class='hover:text-slate-50'>$i </a>";
        }


        if ($page < $pages) {
            $link = $page + 1;
            echo "<a href= '?hal=$link' class='mx-2'> Next </a>";
        } else {
            echo "<span  class='mx-2 cursor-default	' ></span>";
        }


        ?>
    </div>



</body>

</html>