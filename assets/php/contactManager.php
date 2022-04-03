<?php

if(isset($_POST["submit"])){
    $subject = $_POST["subject"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];


    // temporarily sending messages to a discord channel.
    // TODO: move to a database and add an adminpanel later
    sendDiscordMessage(json_encode([
        //"content" => "Neue Nachricht vom Portfolio!",
        "username" => "Portfolio Nachrichten",
        "tts" => false,
    
        "embeds" => [
            [
                "title" => "Neue Nachricht vom Portfolio!",
                "type" => "rich",
                "timestamp" => date("c", strtotime("now")),
                "color" => hexdec("ff6a00"),
                "fields" => [
                    [
                        "name" => "Betreff",
                        "value" => $subject,
                        "inline" => false
                    ],
                    [
                        "name" => "Name",
                        "value" => $name,
                        "inline" => true
                    ],
                    [
                        "name" => "Email",
                        "value" => $email,
                        "inline" => true
                    ],
                    [
                        "name" => "Datum",
                        "value" => date("d.m.Y H:i:s"),
                        "inline" => true
                    ],
                    [
                        "name" => "Nachricht",
                        "value" => $message,
                        "inline" => false
                    ]
                ]
            ]
        ]
    
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ));

    echo "<script> 
            window.alert('Erfolgreich Nachricht gesendet!'); 
            window.open('../../#contact', '_self');
            </script>";
}

function sendDiscordMessage($json_data){
    $webhookurl = "https://discord.com/api/webhooks/956634119520018472/u-7CHSdb-IOnLnx67U7ltduxeG9jwH2phBSoZNrFjWInAy2P4VsMnMl02E7F6NTs7N5s";

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