<?php
    header('Content-type: application/json');

    $site = file_get_contents("https://github.com/users/OliverSchlueter/contributions");

//    echo $site;

    $pos = strpos($site, "contributions", 50);

    $lengthOfNumber = 5; // change when amount gets > 999

    $contributions = substr($site, $pos-12, $lengthOfNumber);

    $contributions = str_replace(",", "", $contributions);

    echo json_encode([
        "contributions" => $contributions,
    ]);
    
?>