<?php
    session_start();

    require_once "../../assets/php/config.php";
    $config = reloadConfig("../../assets/data/config.json");

    if(isset($_POST['login'])){
        if($config->{"admin-password"} != hash("SHA512", $_POST['login'])){
            $_SESSION['admin'] = "";
            include "loginFailed.html";
            die();
        } else {
            $_SESSION['admin'] = $_POST['login'];
            header("Location: ../");
            die();
        }
    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Oliver Schlüter | Admin Login</title>
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/snackbar.css">
    <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>
    <style>
        main{
            position: absolute;
            width: 50%;
            padding: 50px;
            top: 50%;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
            background-color: var(--background-color2);
            border-radius: 10px;
        }

        form{
            padding-top: 50px;
        }
    </style>
    <main>
        <h1>Admin Login</h1>
        <form method="POST">
            <label for="login">PASSWORD</label>
            <input type="password" name="login" placeholder="Admin password">

            <button type="submit">Senden</button>
        </form>
    </main>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/snackbar.js"></script>
</body>
</html>