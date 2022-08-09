<?php

    $config = null;

    function reloadConfig($path){
        $config = json_decode(file_get_contents($path));
        return $config;
    }
?>