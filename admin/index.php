<?php
    session_start();

    require_once "../assets/php/config.php";
    $config = reloadConfig("../assets/data/config.json");

    if(!isset($_SESSION['admin']) || $config->{"admin-password"} != hash("SHA512", $_SESSION['admin'])){
        die("Not logged in");
    }

    $messagesDir = dir("../assets/data/messages/");
    $messages = [];

    while (($file = $messagesDir->read()) !== false){
        if(str_starts_with($file, ".")) continue;
        $msg = json_decode(file_get_contents("../assets/data/messages/$file"));
        array_push($messages, $msg);
    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Oliver Schlüter | Admin</title>
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/snackbar.css">
    <link rel="stylesheet" href="../assets/css/dialog.css">
</head>
<body>
    <?php
        // dialogs for the messages
        foreach($messages as $msg){
            echo "
            <div class='dialog-container' id='msg-".$msg->id."'>
                <dialog open>
                    <button onclick=\"hideDialog('msg-".$msg->id."')\" class='hideBtn'>&#9747;</button>
                    <h2>".$msg->subject."</h2>
                    <p>".$msg->message."</p>
                </dialog>
            </div>
            ";
        }
    ?>
    <main>
        <h1>Adminbereich</h1>
        <h2>Nachrichten vom Kontaktformular</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Datum</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Betreff</th>
                <th>Nachricht</th>
            </tr>
            <?php
                $messagesDir = dir("../assets/data/messages/");

                foreach($messages as $msg){
                    echo "<tr>";
                    echo "<td class='clickable courier_new' onclick=\"showDialog('msg-".$msg->id."')\">".$msg->id."</td>";
                    echo "<td>".date("d.m.y H:i:s", $msg->date)."</td>";
                    echo "<td>".$msg->name."</td>";
                    echo "<td>".$msg->email."</td>";
                    echo "<td>".$msg->subject."</td>";
                    echo "<td>".substr($msg->message, 0, 20)." ...</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </main>
    
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/snackbar.js"></script>
    <script src="../assets/js/dialogManager.js"></script>
</body>
</html>