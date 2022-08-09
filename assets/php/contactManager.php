<?php

require 'config.php';
$config = reloadConfig("../data/config.json");

if(isset($_POST["submit"])){
    $subject = $_POST["subject"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $timestamp = time();
    $id = substr(hash("sha256", "Oliver Portfolio Message $subject $name $email $message $timestamp"), 0, 10);

    $data = [
        "id" => $id,
        "date" => $timestamp,
        "name" => $name,
        "email" => $email,
        "subject" => $subject,
        "message" => $message
    ];

    file_put_contents("../data/messages/$id.json", json_encode($data));

    echo "<script> 
            window.alert('Erfolgreich Nachricht gesendet!'); 
            window.open('../../#contact', '_self');
            </script>";
}
?>