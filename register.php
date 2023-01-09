<?php

require 'dbconn.php';
error_reporting(0);
session_start();


$query = mysqli_query($conn, "SELECT * FROM users where username='$username'");
if (mysqli_num_rows($query) > 0) {
    echo "<script>alert('Username Already Exists')</script>";
    exit;
}

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['passwordRepeat']);

    if ($password == $cpassword) {
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $query);

        if (!$result->num_rows > 0) {
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password') ";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script> alert('Regis selesai') </script>";
                $username = "";
                $_POST['password'] = "";
                $_POST['passwordRepeat'] = "";
            } else {
                echo "<script> alert('Salah') </script>";
            }
        }
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>

<body>

    <div class="wrapper justify-center h-screen flex bg-gray-100">
        <div class="form-wrapper bg-white p-10 m-auto w-96 shadow">
            <h2 class="text-3xl font-bold py-5 mb-5 text-black uppercase">Register (masih belum bisa)</h3>
                <form action="POST" class="flex flex-col gap-5 justify-center items-center">
                    <input type="hidden" name="type" value="register" />

                    <input type="text" name="username" placeholder="Username" class="appearance-none block w-full px-3 py-2 border border-gray-300  placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-black transition duration-150 ease-in-out sm:text-sm sm:leading-5 " />


                    <input type="password" name="password" placeholder="Password" class="appearance-none block w-full px-3 py-2 border border-gray-300  placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-black transition duration-150 ease-in-out sm:text-sm sm:leading-5 " />

                    <input type="password" name="passwordRepeat" placeholder="Repeat Password" class="appearance-none block w-full px-3 py-2 border border-gray-300  placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-black transition duration-150 ease-in-out sm:text-sm sm:leading-5 " />

                    <button type="submit" name="submit" class="w-full mt-5 px-3 py-2 hover:bg-black hover:text-white bg-white border-black border-2 text-black active:bg-black">
                        Register
                    </button>

                    <span class="mt-6   text-center text-gray-900"> Sudah punya akun ? <a href="login.php" class="font-bold text-slate-800 hover:text-slate-700 focus:outline-none focus:underline transition ease-in-out duration-150">Login</a></span>
                </form>
        </div>
    </div>

</body>

</html>