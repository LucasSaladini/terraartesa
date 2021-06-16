<!--<?php

?>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/login.css">
    <title>Terra Artesã Admin</title>
</head>
<body>
    <h2 class="text-center">Login</h2>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center">
            <form action="" method="post" class="col-4 text-center justify-content-center">
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
            </form>
        </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>