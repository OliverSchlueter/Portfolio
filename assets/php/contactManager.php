<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    require 'libs/PHPMailer/src/PHPMailer.php';
    require 'libs/PHPMailer/src/SMTP.php';
    require 'libs/PHPMailer/src/Exception.php';

if(isset($_POST["submit"])){
    $subject = $_POST["subject"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $timestamp = time();
    $id = substr(hash("sha256", "Oliver Portfolio Message $subject $name $email $message $id $timestamp"), 0, 10);

    $config = json_decode(file_get_contents("config.json"));

    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = "mail.dnslinq.de";
        $mail->SMTPAuth = true;
        $mail->Username = "mail@schlueter-oliver.de";
        $mail->Password = $config->{"mail-password"};
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
    
        //Recipients
        $mail->setFrom("mail@schlueter-oliver.de", "Portfolio");
        $mail->addAddress("mail@schlueter-oliver.de");
        $mail->addCC("mail@schlueter-oliver.de");
    
        //Content
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";
        $mail->Encoding = "base64";
        $mail->Subject = "Neue Portfolio-Nachricht (#$id)";
        $mail->Body = "Name: $name<br>Email: $email<br>Betreff: $subject<br>Nachricht:<br>$message";
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


    // sendDiscordMessage(json_encode([
    //     "username" => "Portfolio Nachrichten",
    //     "tts" => false,
    
    //     "embeds" => [
    //         [
    //             "title" => "Neue Nachricht vom Portfolio!",
    //             "type" => "rich",
    //             "timestamp" => date("c", strtotime("now")),
    //             "color" => hexdec("ff6a00"),
    //             "fields" => [
    //                 [
    //                     "name" => "Betreff",
    //                     "value" => $subject,
    //                     "inline" => false
    //                 ],
    //                 [
    //                     "name" => "Name",
    //                     "value" => $name,
    //                     "inline" => true
    //                 ],
    //                 [
    //                     "name" => "Email",
    //                     "value" => $email,
    //                     "inline" => true
    //                 ],
    //                 [
    //                     "name" => "Datum & Zeit",
    //                     "value" => date("d.m.Y H:i:s"),
    //                     "inline" => true
    //                 ],
    //                 [
    //                     "name" => "Nachricht",
    //                     "value" => $message,
    //                     "inline" => false
    //                 ]
    //             ]
    //         ]
    //     ]
    
    // ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ));

    echo "<script> 
            window.alert('Erfolgreich Nachricht gesendet!'); 
            window.open('../../#contact', '_self');
            </script>";
}

function sendDiscordMessage($json_data){
    $webhookurl = $config->{"discord-webhook-link"};

    $ch = curl_init( $webhookurl );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec( $ch );
    // echo $response;
    curl_close( $ch );
}

?>