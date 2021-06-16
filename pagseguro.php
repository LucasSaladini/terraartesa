<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="images/favicon/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="images/favicon/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="images/favicon/favicon-16x16.png"
    />

    <link rel="manifest" href="images/favicon/site.webmanifest" />
    <link rel="stylesheet" href="css/pagseguro.css">
    <title>Teste PagSeguro</title>
</head>
<body>
    <form action="controllers/controllerOrder.php" method="POST" id="purchaseForm" name="purchaseForm">
        <input type="text" name="cardNumber" id="cardNumber">
        <input type="text" name="cardToken" id="cardToken">
        <input type="text" name="cardHash" id="cardHash">
        <select name="installmentsQuantity" id="installmentsQuantity" class="display-none">
          <option value="">Selecione</option>
        </select>
        <input type="text" name="installmentValue" id="installmentValue">
        <input type="submit" value="Comprar" id="buy" name="buy">
    </form>
    <div class="cardBrand mt-2"></div>
    <div class="credit-card">
        <div class="title">Cartão de Crédito</div>
    </div>
    <div class="boleto">
        <div class="title">Boleto</div>
    </div>
    <div class="debit">
        <div class="title">Débito Online</div>
    </div>
    
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src=
    "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script src="js/pagseguro.js"></script>
    <!-- End Scripts -->
</body>
</html>