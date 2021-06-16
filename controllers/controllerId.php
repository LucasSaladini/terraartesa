<?php
    include('../config/config.php');

    $URL = "https://ws.pagseguro.uol.com.br/v2/sessions?email=".Email_Pagseguro."&token=".Token_Pagseguro."";
    $CURL = curl_init($URL);

    curl_setopt($CURL, CURLOPT_HTTPHEADER, array('<?xml version="1.0" encoding="ISO-8859-1"?>'));
    curl_setopt($CURL, CURLOPT_POST, 1);
    curl_setopt($CURL, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);

    $return = curl_exec($CURL);
    curl_close($CURL);

    $XML = simplexml_load_string($return);
    echo json_encode($XML);
?>