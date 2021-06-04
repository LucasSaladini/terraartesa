<!--
<?php
?>
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Painel Administrativo</title>
</head>
<body>
    <h4 class="text-center welcome">&#128075; Olá, {nome do usuário}! Bem-vindo ao painel administrativo. &#128521;</h4>    
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg">
    <a class="navbar-brand" href="#">Terra Artesã Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul id="mainMenu" class="navbar-nav mr-auto navbar-dark">
            <li class="nav-item active">
                <a class="nav-link" href="admin_sys/index.php" ref_sys="sobre">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_sys/how_works.php" ref_sys="cadastrar_equipe">Como funciona</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_sys/plans.php" ref_sys="lista_equipe">Planos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_sys/friends.php" ref_sys="lista_equipe">Nossos Amigos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_sys/about.php" ref_sys="lista_equipe">Sobre Nós</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_sys/contact.php" ref_sys="lista_equipe">Contato</a>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group col-2 px-0 fixed-top">
                        <a href="#" class="list-group-item active" ref_sys="sobre">A Terra Artesã</a>
                        <a href="#" class="list-group-item" ref_sys="slideshow">Slideshow</a>
                        <a href="#" class="list-group-item" ref_sys="o_que_prezamos">O que prezamos</a>
                        <a href="#" class="list-group-item" ref_sys="historias">Conheça nossas histórias</a>
                        <a href="#" class="list-group-item" ref_sys="opcoes_de_compra">Opções de compra</a>
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
                                    <label for="sobre"><b>Texto</b></label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="5">

                                    </textarea>
                                </div>
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="slideshow_section" class="card mt-5">
                    <div class="card-header">
                            <h3 class="card-title">Slideshow</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="slideshow"><b>Imagens</b></label><br>
                                    <form action="img_slideshow.php" enctype="multipart/form-data" method="post">
                                        <input type="file" name="image_slideshow[]" multiple/>
                                    </form>
                                </div>
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="o_que_prezamos_section" class="card mt-5">
                    <div class="card-header">
                            <h3 class="card-title">O que prezamos</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                            <div class="form-group">
                                    <label for="img_prezamos"><b>Imagens</b></label><br>
                                    <form action="img_prezamos.php" enctype="multipart/form-data" method="post">
                                        <input type="file" name="image_prezamos[]"/>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <label for="sobre"><b>Texto</b></label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="5">

                                    </textarea>
                                </div>
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="historias_section" class="card mt-5">
                    <div class="card-header">
                            <h3 class="card-title">Conheça nossas histórias</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                            <div class="form-group">
                                    <label for="img_cestas" class="pb-2"><b>Imagem 1</b></label><br>
                                    <form action="img_cestas.php" enctype="multipart/form-data" method="post">
                                        <input type="file" name="image_prezamos[]"/>
                                    </form><br>
                                    <label for="img_cestas" class="pb-2 pt-2"><b>Imagem 2</b></label><br>
                                    <form action="img_cestas.php" enctype="multipart/form-data" method="post">
                                        <input type="file" name="image_prezamos[]"/>
                                    </form>
                                    <label for="img_cestas" class="pb-2 pt-2"><b>Imagem 3</b></label>
                                    <form action="img_cestas.php" enctype="multipart/form-data" method="post">
                                        <input type="file" name="image_prezamos[]"/>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <label for="sobre" class="pb-2"><b>Texto 1</b></label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="2">
                                    </textarea>
                                    <label for="sobre" class="pb-2 pt-2"><b>Texto 2</b></label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="2">
                                    </textarea>
                                    <label for="sobre" class="pb-2 pt-2"><b>Texto 3</b></label>
                                    <textarea name="sobre" class="form-control" style="resize: none" cols="30" rows="2">
                                    </textarea>
                                </div>
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="opcoes_de_compra_section" class="card mt-5 mb-5">
                    <div class="card-header">
                            <h3 class="card-title">Opções de compra</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="plano1"><b>Plano 1</b></label><br>
                                    <label for="plano1">Nome do plano</label>
                                    <input type="text" class="form-control col-3" name="nome_cesta1" id="" />
                                    <label for="valor_cesta1" class="mt-2">Valor</label>
                                    <input type="text" class="form-control col-3" name="valor_cesta1" id="" />
                                </div>
                                <div class="form-group">
                                    <label for="plano2"><b>Plano 2</b></label><br>
                                    <label for="plano2">Nome do plano</label>
                                    <input type="text" class="form-control col-3" name="nome_cesta2" id="">
                                    <label for="valor_cesta2" class="mt-2">Valor</label>
                                    <input type="text" class="form-control col-3" name=valore_cesta2" id="" />
                                </div>
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
    <script>
    $(function(){
        menuClick();
        scrollItem();

        function menuClick(){
            $('#mainMenu a, .list-group a').click(function(){
                $('#mainMenu li, .list-group a').removeClass('active');
                //console.log('#mainMenu li[ref_sys='+$(this).attr('ref_sys')+']');
                $('#mainMenu a[ref_sys='+$(this).attr('ref_sys')+']').parent().addClass('active');
                $('.list-group a[ref_sys='+$(this).attr('ref_sys')+']').addClass('active');
                return false;
            })
        }

        function scrollItem(){
            $('#mainMenu a, .list-group a').click(function(){
                var ref = '#'+$(this).attr('ref_sys')+'_section';
                var offset = $(ref).offset().top;
                $('html, body').animate({'scrollTop':offset-60});
                if($(window)[0].innerWidth <= 768){
                    $('.navbar-toggler-icon').click();
                }
            })
        }

        $('button.delete-member').click(function(){
            var id_membro = $(this).attr('id_membro');
            var el = $(this).parent().parent();
            $.ajax({
                method: 'post',
                data: {'id_membro':id_membro},
                url: 'delete.php'
            }).done(function(){
                el.fadeOut(function(){
                el.remove();
                })
            })
        })
    })
  </script>
</body>
</html>