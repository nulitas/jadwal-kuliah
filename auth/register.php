<?php

include "../config/dbconn.php";
error_reporting(0);
session_start();


if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($username == $_POST["username"] && $password == $confirmPassword) {
        session_start();
        $result = mysqli_query($conn, "INSERT INTO users(username, password) VALUES('$username', '$password')");
        $_SESSION['register'] = true;
        header("Location: login.php");
    } else {
        echo "<script> alert('Error 404') </script>";
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
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-3xl font-bold text-center text-gray-900 ">
                Register
            </h2>
            <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
                Atau
                <a href="login.php" class="font-medium text-slate-800 hover:text-slate-700 focus:outline-none focus:underline transition ease-in-out duration-150">
                    Login
                </a>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <a href="../index.php" class="border-2 border-black px-5 float-left  hover:text-white hover:bg-black"> X </a>
            <div class="px-4 py-8 bg-white shadow  sm:px-10">

                <form method="POST">
                    <div>
                        <label for="username" class="mt-5 block text-sm font-medium text-gray-700 leading-5">
                            Username
                        </label>

                        <div class="mt-1  shadow-sm">
                            <input id="username" name="username" type="username" required="" autofocus="" class="appearance-none block w-full px-3 py-2 border border-gray-300  placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-black transition duration-150 ease-in-out sm:text-sm sm:leading-5 ">
                        </div>

                    </div>

                    <div class="mt-6">

                        <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                            Password
                        </label>

                        <div class="mt-1  shadow-sm">
                            <input id="password" name="password" type="password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300  placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-black transition duration-150 ease-in-out sm:text-sm sm:leading-5 ">
                        </div>

                    </div>
                    <div class="mt-6">

                        <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                            Confirm Password
                        </label>

                        <div class="mt-1  shadow-sm">
                            <input id="confirmPassword" name="confirmPassword" type="password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300  placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-black transition duration-150 ease-in-out sm:text-sm sm:leading-5 ">
                        </div>

                    </div>

                    <!-- <div class="mt-6">


                        <label for="captcha" class="block text-sm font-medium text-gray-700 leading-5">
                            Captcha
                        </label>

                        <div class="mt-1  shadow-sm">
                            <img src="captcha.php" alt="Captcha">
                        </div>

                        <div class="mt-1  shadow-sm">
                            <input id="captcha" name="captchaInput" type="text" value="" maxlength="6" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300  placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-black transition duration-150 ease-in-out sm:text-sm sm:leading-5 ">
                        </div>

                    </div> -->

                    <div class="mt-6">
                        <span class="block w-full  shadow-sm">
                            <button type="submit" name="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-black bg-white border-2 border-black   hover:bg-black hover:text-white focus:outline-none focus:border-black focus:shadow-outline-indigo active:bg-black transition duration-150 ease-in-out">
                                Sign Up
                            </button>
                        </span>
                    </div>
                </form>



            </div>
        </div>
    </div>




</body>

</html>