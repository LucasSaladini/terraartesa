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
  <div class="cart">
    Você tem X produtos no carrinho
  </div>
  <div class="product">
    <div class="product_title"></div>
    <div class="product_image"></div>
    <div class="product_desc"></div>
    <div class="product_btn"></div>
  </div>

    <form action="controllers/controllerOrder.php" id="buyForm" name="buyForm" method="post">
      <input type="hidden" name="cardHash" id="cardHash">
      <input type="hidden" name="cardToken" id="cardToken">
      <?php
        $conn = new PDO("mysql:host=localhost;dbname=cart", "root", "");
        $crud = $conn->prepare("SELECT * FROM `cart`");
        $crud->execute();

        $final_value = 0;
        
        while($fetch = $crud->fetch(PDO::FETCH_ASSOC)) {
          $final_value = $final_value + ($fetch['quantity'] * $fetch['value']);
        }
      ?>
      <input type="hidden" name="total" id="total" value="<?php echo $final_value ?>">
      
      <!-- Buyer details -->
      <div class="row">
        <div class="col-6">
          <strong class="text-center">Dados do comprador</strong>
          <div class="form-group">
            <label for="buyerName">Nome do comprador</label>
            <input type="text" name="buyerName" id="buyerName" aria-describedbt="buyerName" required class="form-control">
          </div>

          <div class="form-group">
            <label for="buyerCPF">CPF do comprador</label>
            <input type="text" name="buyerCPF" id="buyerCPF" aria-describedbt="buyerCPF" onkeyup="cpfCheck(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );" required class="form-control" ><span id="cpfResponse"></span>
          </div>

          <div class="form-group">
            <label for="buyerCode">DDD</label>
            <input type="tel" name="buyerCode" id="buyerCode" aria-describedbt="buyerCode" maxlength="2" required class="form-control">

            <label for="buyerPhone">Telefone</label>
            <input type="tel" name="buyerPhone" id="buyerPhone" aria-describedbt="buyerPhone" maxlength="10" required class="form-control">
          </div>
        </div>
      <!-- End Buyer details -->

      <!-- Delivery Info -->
        <div class="col-6">
          <div class="form-group">
            <label for="cep">CEP de entrega</label>
            <input type="text" name="cep" id="cep" aria-describedby="cep" required class="form-control" >
          </div>

          <div class="form-group">
            <label for="buyerAddress">Endereço</label>
            <input type="text" aria-describedby="buyerAddress" id="buyerAddress" name="buyerAddress" required class="form-control">
          </div>

          <div class="form-group">
            <label for="buyerNumber">Número</label>
            <input type="number" aria-describedby="buyerNumber" id="buyerNumber" name="buyerNumber" required class="form-control">
          </div>

          <div class="form-group">
            <label for="buyerComplement">Complemento</label>
            <input type="text" aria-describedby="buyerComplement" id="buyerComplement" name="buyerComplement" class="form-control">
          </div>

          <div class="form-group">
            <label for="buyerNeighborhood">Bairro</label>
            <input type="text" name="buyerNeighborhood" id="buyerNeighborhood" aria-describedby="buyerNeighborhood" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="buyerCity">Cidade</label>
            <input type="text" name="buyerCity" id="buyerCity" aria-describedby="buyerCity" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="buyerState">Estado</label>
            <input type="text" name="buyerState" id="buyerState" aria-describedby="buyerState" maxlength="2" class="form-control" required>
          </div>
        </div>
      </div>
      <!-- End Delivery Info -->

      <!-- Credit Card Info -->
      <div class="row">
        <div class="col-6">
          <strong>Dados do cartão</strong>
          <strong class="text-center">Dados do cartão</strong>
          <div class="form-group">
            <label for="cardNumber">Número do cartão</label>
            <input type="number" name="cardNumber" id="cardNumber" aria-describedby="cardNumber" maxlength="12" class="form-control" required
            <div class="cardBrand"></div>
            <input class="cardBrand" type="hidden" id="cardBrand" name="cardBrand">
          </div>

          <div class="form-group">
            <label for="cardName">Nome impresso no cartão</label>
            <input type="text" name="cardName" id="cardName" aria-describedby="cardName" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="monthExpiration">Mês de validade</label>
            <input type="number" name="monthExpiration" id="monthExpiration" aria-describedby="monthExpiration" maxlength="2" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="yearExpiration">Ano de validade</label>
            <input type="number" name="yearExpiration" id="yearExpiration" aria-describedby="yearExpiration" maxlength="4" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="number" name="cvv" id="cvv" aria-describedby="cvv" maxlength="3" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label for="installmentQuantity">Quantidade de parcelas</label>
            <select name="installmentQuantity" id="installmentQuantity" aria-describedby="installmentQuantity" required>
              <option value="">Selecione</option>
            </select>
          </div>

          <div class="form-group">
            <label for="cpfCard">CPF do titular</label>
            <input type="number" name="cpfCard" id="cpfCard" aria-describedby="cpfCard" maxlenght="11" class="form-control">
          </div>
        </div>
      </div>

      <!-- End Credit Card Info -->
      
      <input type="submit" value="Comprar" name="btn-Buy" id="btn-Buy">

    </form>
  </div>
    
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
    <script>
    function is_cpf (c) {

      if((c = c.replace(/[^\d]/g,"")).length != 11)
        return false

      if (c == "00000000000")
        return false;

      var r;
      var s = 0;

      for (i=1; i<=9; i++)
        s = s + parseInt(c[i-1]) * (11 - i);

      r = (s * 10) % 11;

      if ((r == 10) || (r == 11))
        r = 0;

      if (r != parseInt(c[9]))
        return false;

      s = 0;

      for (i = 1; i <= 10; i++)
        s = s + parseInt(c[i-1]) * (12 - i);

      r = (s * 10) % 11;

      if ((r == 10) || (r == 11))
        r = 0;

      if (r != parseInt(c[10]))
        return false;

      return true;
    }


    function fMasc(objeto,mascara) {
      obj=objeto
      masc=mascara
      setTimeout("fMascEx()",1)
    }

    function fMascEx() {
      obj.value=masc(obj.value)
    }

    function mCPF(cpf){
      cpf=cpf.replace(/\D/g,"")
      cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
      cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
      cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
      return cpf
    }

    cpfCheck = function (el) {
      document.getElementById('cpfResponse').innerHTML = is_cpf(el.value)? '<span style="color:green">válido</span>' : '<span style="color:red">inválido</span>';
      if(el.value=='') document.getElementById('cpfResponse').innerHTML = '';
    }
    </script>

    <script type="text/javascript">
      $("#cep").focusout(function(){
        //Início do Comando AJAX
        $.ajax({
          //O campo URL diz o caminho de onde virá os dados
          //É importante concatenar o valor digitado no CEP
          url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
          //Aqui você deve preencher o tipo de dados que será lido,
          //no caso, estamos lendo JSON.
          dataType: 'json',
          //SUCESS é referente a função que será executada caso
          //ele consiga ler a fonte de dados com sucesso.
          //O parâmetro dentro da função se refere ao nome da variável
          //que você vai dar para ler esse objeto.
          success: function(resposta){
            //Agora basta definir os valores que você deseja preencher
            //automaticamente nos campos acima.
            $("#buyerAddress").val(resposta.logradouro);
            $("#buyerComplement").val(resposta.complemento);
            $("#buyerNeighborhood").val(resposta.bairro);
            $("#buyerCity").val(resposta.localidade);
            $("#buyerState").val(resposta.uf);
            //Vamos incluir para que o Número seja focado automaticamente
            //melhorando a experiência do usuário
            $("#buyerNumber").focus();
          }
        });
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js" integrity="sha512-yVcJYuVlmaPrv3FRfBYGbXaurHsB2cGmyHr4Rf1cxAS+IOe/tCqxWY/EoBKLoDknY4oI1BNJ1lSU2dxxGo9WDw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
      $(document).ready(function(){
	      $("#cep").mask("99999-999");
    });
    </script>

    <script>
      function mascara(o,f){
          v_obj=o
          v_fun=f
          setTimeout("execmascara()",1)
      }
      function execmascara(){
          v_obj.value=v_fun(v_obj.value)
      }
      function mtel(v){
          v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
          v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
          return v;
      }
      function id( el ){
        return document.getElementById( el );
      }
      window.onload = function(){
        id('buyerPhone').onkeyup = function(){
          mascara( this, mtel );
        }
      }
    </script>


    
    <!-- End Scripts -->
</body>
</html>