<!--<?php
?>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Painel Administrativo</title>
</head>
<body>
    <h4 class="text-center welcome">&#128075; Olá, {nome do usuário}! Bem-vindo ao painel administrativo. &#128521;</h4>    
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg">
    <a class="navbar-brand" href="#">Terra Artesã</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul id="mainMenu" class="navbar-nav mr-auto navbar-dark">
            <li class="nav-item active">
                <a class="nav-link" href="#" ref_sys="sobre">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" ref_sys="cadastrar_equipe">Como funciona</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" ref_sys="lista_equipe">Planos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" ref_sys="lista_equipe">Nossos Amigos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" ref_sys="lista_equipe">Sobre Nós</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" ref_sys="lista_equipe">Contato</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li>
                <a class="nav-link" href="?sair">Sair</a>
            </li>
        </ul>
    </div>
    </nav>
    <!-- End Navbar -->

    <section class="principal">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="" class="list-group-item active" ref_sys="sobre">A Terra Artesã</a>
                        <a href="" class="list-group-item" ref_sys="cadastrar_equipe">Slideshow</a>
                        <a href="" class="list-group-item" ref_sys="lista_equipe">O que prezamos</a>
                        <a href="" class="list-group-item" ref_sys="lista_equipe">Conheça nossas histórias</a>
                        <a href="" class="list-group-item" ref_sys="lista_equipe">Opções de compra</a>
                        <a href="" class="list-group-item" ref_sys="lista_equipe">Rodapé</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="sobre_section" class="card">
                        <div class="card-header">
                            <h3 class="card-title">A Terra Artesã</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Texto</label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="5">

                                    </textarea>
                                </div>
                                <input type="hidden" name="editar_sobre" value="">
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="cadastrar_equipe_section" class="card mt-5">
                    <div class="card-header">
                            <h3 class="card-title">Slideshow</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Imagens</label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="5">

                                    </textarea>
                                </div>
                                <input type="hidden" name="editar_sobre" value="">
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="cadastrar_equipe_section" class="card mt-5">
                    <div class="card-header">
                            <h3 class="card-title">O que prezamos</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                            <div class="form-group">
                                    <label for="email">Imagens</label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="5">

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="email">Texto</label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="5">

                                    </textarea>
                                </div>
                                <input type="hidden" name="editar_sobre" value="">
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="cadastrar_equipe_section" class="card mt-5">
                    <div class="card-header">
                            <h3 class="card-title">Conheça nossas histórias</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                            <div class="form-group">
                                    <label for="email">Imagens</label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="5">

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="email">Texto</label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="5">

                                    </textarea>
                                </div>
                                <input type="hidden" name="editar_sobre" value="">
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="cadastrar_equipe_section" class="card mt-5">
                    <div class="card-header">
                            <h3 class="card-title">Opções de compra</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Texto</label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="5">

                                    </textarea>
                                </div>
                                <input type="hidden" name="editar_sobre" value="">
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="cadastrar_equipe_section" class="card mt-5">
                    <div class="card-header">
                            <h3 class="card-title">Rodapé</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Texto</label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="5">

                                    </textarea>
                                </div>
                                <input type="hidden" name="editar_sobre" value="">
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>