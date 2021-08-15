<?php
    //vídeo 14
    include('../config/config.php');

    $cardToken = $_POST['cardToken'];
    $cardHash = $_POST['cardHash'];
    $installmentsQuantity = filter_input(INPUT_POST, 'installmentQuantity', FILTER_SANITIZE_SPECIAL_CHARS);
    $installmentValue = filter_input(INPUT_POST, 'installmentValue', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpfCard = filter_input(INPUT_POST, 'cpfCard', FILTER_SANITIZE_SPECIAL_CHARS);
    $buyerName = filter_input(INPUT_POST, 'buyerName', FILTER_SANITIZE_SPECIAL_CHARS);
    $buyerCPF = filter_input(INPUT_POST, 'buyerCPF', FILTER_SANITIZE_SPECIAL_CHARS);
    $buyerCode = filter_input(INPUT_POST, 'buyerCode', FILTER_SANITIZE_SPECIAL_CHARS);
    $buyerPhone = filter_input(INPUT_POST, 'buyerPhone', FILTER_SANITIZE_SPECIAL_CHARS);
    $cardName = filter_input(INPUT_POST, 'cardName', FILTER_SANITIZE_SPECIAL_CHARS);
    $buyerAddress = filter_input(INPUT_POST, 'buyerAddress', FILTER_SANITIZE_SPECIAL_CHARS);
    $buyerNumber = filter_input(INPUT_POST, 'buyerNumber', FILTER_SANITIZE_SPECIAL_CHARS);
    $buyerComplement = filter_input(INPUT_POST, 'buyerComplement', FILTER_SANITIZE_SPECIAL_CHARS);
    $buyerNeighborhood = filter_input(INPUT_POST, 'buyerNeighborhood', FILTER_SANITIZE_SPECIAL_CHARS);
    $buyerCity = filter_input(INPUT_POST, 'buyerCity', FILTER_SANITIZE_SPECIAL_CHARS);
    $buyerState = filter_input(INPUT_POST, 'buyerState', FILTER_SANITIZE_SPECIAL_CHARS);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);

    $Data["email"]=Email_Pagseguro;
    $Data["token"]=Token_Pagseguro;
    $Data["paymentMode"]="default";
    $Data["paymentMethod"]="creditCard";
    $Data["receiverEmail"]=Email_Pagseguro;
    $Data["currency"]="BRL";

    $conn = new PDO("mysql:host=localhost;dbname=cart", "root", "");
    $crud = $conn->prepare("SELECT * FROM `cart`");
    $crud->execute();

    $i = 1;
    while($fetch = $crud->fetch(PDO::FETCH_ASSOC)) {
        $Data["itemId{$i}"] = $fetch['id'];
        $Data["itemDescription{$i}"] = $fetch['description'];
        $Data["itemAmount{$i}"] = $fetch['value'];
        $Data["itemQuantity{$i}"] = $fetch['quantity'];
        $i++;
    }

    $Data["notificationURL="]="https://www.meusite.com.br/notificacao.php";
    $Data["reference"]="83783783737";
    $Data["senderName"]=$buyerName;
    $Data["senderCPF"]=$buyerCPF;
    $Data["senderAreaCode"]=$buyerCode;
    $Data["senderPhone"]=$buyerPhone;
    $Data["senderEmail"]="c51994292615446022931@sandbox.pagseguro.com.br";
    $Data["senderHash"]=$cardHash;
    $Data["shippingType"]="1";
    $Data["shippingAddressStreet"]=$buyerAddress;
    $Data["shippingAddressNumber"]=$buyerNumber;
    $Data["shippingAddressComplement"]=$buyerComplement;
    $Data["shippingAddressDistrict"]=$buyerNeighborhood;
    $Data["shippingAddressPostalCode"]=$cep;
    $Data["shippingAddressCity"]=$buyerCity;
    $Data["shippingAddressState"]=$buyerState;
    $Data["shippingAddressCountry"]="BRA";
    $Data["shippingType"]="1";
    $Data["shippingCost"]="0.00";
    $Data["creditCardToken"]=$cardToken;
    $Data["installmentQuantity"]=$installmentQuantity;
    $Data["installmentValue"]=$installmentValue;
    $Data["noInterestInstallmentQuantity"]=2;
    $Data["creditCardHolderName"]=$cardName;
    $Data["creditCardHolderCPF"]=$cpfCard;
    $Data["creditCardHolderBirthDate"]='27/10/1987';
    $Data["creditCardHolderAreaCode"]=$buyerCode;
    $Data["creditCardHolderPhone"]=$buyerPhone;
    $Data["billingAddressStreet"]=$buyerAddress;
    $Data["billingAddressNumber"]=$buyerNumber;
    $Data["billingAddressComplement"]=$buyerComplement;
    $Data["billingAddressDistrict"]=$buyerNeighborhood;
    $Data["billingAddressPostalCode"]=$cep;
    $Data["billingAddressCity"]=$buyerCity;
    $Data["billingAddressState"]=$buyerState;
    $Data["billingAddressCountry"]="BRA";

    $BuildQuery=http_build_query($Data);
    $Url="https://ws.pagseguro.uol.com.br/v2/transactions";

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