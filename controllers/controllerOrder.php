<?php
    include('../config/config.php');

    $cardToken = $_POST['cardToken'];
    $cardHash = $_POST['cardHash'];
    $installmentsQuantity = $_POST['installmentsQuantity'];

    $Data["email"] = EMAIL_PAGSEGURO;
    $Data["token"] = TOKEN_SANDBOX;

    $Dara["paymentMode"] = "creditCard";
    $Dara["receiverEmail"] = EMAIL_PAGSEGURO;
    $Data["currency"] = "BRL";
    $Data["itemId1"] = "1";
    $Data["notificationURL"] = "www.terraartesa.com.br/notification.php";
    $Data["itemDescription1"] = "Exemplo 1";
    $Data["itemAmount1"] = "100.00";
    $Data["itemQuantity"] = "1";
    $Data["itemWeight1"] = "1000";
    $Data["reference"] = "83783783737";
    $Data["senderName"] = "Terra Artesã";
    $Data["senderAreaCode"] = "11";
    $Data["senderPhone"] = "983557139";
    $Data["senderEmail"] = "lucassaladini@gmail.com";
    $Data["senderHash"] = $cardHash;
    $Data["shippingType"] = "1";
    $Data["shippingAddressStree"] = "Rua 1";
    $Data["shippingAddressNumber"] = "10";
    $Data["shippingAddressComplement"] = "41";
    $Data["shippingAddressDistrict"] = "Vila Mariana";
    $Data["shippingAddressPostalCode"] = "12345678";
    $Data["shippingAddressCity"] = "São Paulo";
    $Data["shippingAddressState"] = "SP";
    $Data["shippingAddressCountry"] = "BRA";
    $Data["shippingCost"] = "0.00";
    $Data["creditCardToken"] = $cardToken;
    $Data["creditCardToken"] = $installmentsQuantity;
    $Data["noInterestInstallmentQuantity"] = 3;
    //$Data["installmentValue"] = ;

    $buildQuery = http_build_query($Data);
    $url = "https://ws.pagseguro.uol.com.br/v2/transactions";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded; charset=UTF-8"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $buildQuery);

    $return = curl_exec($curl);
    curl_close($curl);

    $xml = simplexml_load_string($return);
    echo $xml->code;
?>