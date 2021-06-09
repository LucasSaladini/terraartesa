<!--<?php

?>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/login.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="libraries/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="libraries/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="../images/favicon/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="../images/favicon/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../images/favicon/favicon-16x16.png"
    />
    <link rel="manifest" href="images/favicon/site.webmanifest" />
    <title>Terra Artesã Admin</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col" id="logo">
                <img src="../images/logo.png" alt="" class="d-block mx-auto">
            </div>
        </div>
    </div>
    <h2 class="text-center">Login</h2>
    <div class="container-fluid mt-3">
        <div class="row justify-content-center align-items-center">
            <form id="formLogin" method="post" class="col-4 text-center justify-content-center">
                <div class="form-group">
                    <label>Usuário</label>
                    <input type="text" name="username" class="form-control " value="">
                    <span class="invalid-feedback"></span>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control">
                    <span class="invalid-feedback"></span>
                </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-login">
            </div>
            <button class="btn btn-info"><a href="enter_email.php">Esqueci a senha</a></button>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      $('#loginForm').on('submit', function(e){
        $.ajax({
          type: 'POST',
          url: "action.php",
          data: $(this).serialize(),
          dataType: "json",
          success: function (respose) {
            if(response.success == 1) {
              location.href = "index.php";
            } else {
              $('#errorMessage').text(response.message);
              $('#errorMessage').removeClass('hidden');
            }
          }
        });
        return false;
      });
    </script>
    <!-- End Script -->
</body>
</html>