<?php
    include('../config/config.php');

    $URL = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=".Email_Pagseguro."&token=".Token_Pagseguro_SB."";
    $CURL = curl_init($URL);

    curl_setopt($CURL, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded; charset=UTF-8"));
    curl_setopt($CURL, CURLOPT_POST, 1);
    curl_setopt($CURL, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);

    $return = curl_exec($CURL);

    curl_close($CURL);

    $XML = simplexml_load_string($return);
    var_dump($XML);
?>