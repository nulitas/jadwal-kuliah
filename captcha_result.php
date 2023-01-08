<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Hasil login</h1>

    <p>


        <?php
        session_start();
        if ($_SESSION["captcha"] != $_POST["captcha"]) {
            echo "Username anda " . $_POST["username"];
            echo "<br>";
            echo "Password anda " . $_POST["password"];
            echo "<br>";
            echo "Kode captcha lu salah";
        } else {
            echo "Username anda " . $_POST["username"];
            echo "<br>";
            echo "Password anda " . $_POST["password"];
            echo "<br>";
            echo "Kode captcha lu bener";
        }



        ?>
    </p>
</body>

</html>