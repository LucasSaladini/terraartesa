<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dashboard-hw.css">
    <title>Terra Artesã Admin</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg">
    <a class="navbar-brand" href="#">Terra Artesã Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul id="mainMenu" class="navbar-nav mr-auto navbar-dark">
            <li class="nav-item active">
                <a class="nav-link" href="admin_sys/index.php">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_sys/how_works.php">Como funciona</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_sys/plans.php">Planos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_sys/friends.php">Nossos Amigos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_sys/about.php">Sobre Nós</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_sys/contact.php">Contato</a>
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
                        <a href="#" class="list-group-item active" ref_sys="presentation">Apresentação</a>
                        <a href="#" class="list-group-item" ref_sys="baskets">Cestas</a>
                        <a href="#" class="list-group-item" ref_sys="">Produtos</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="presentation_section" class="card">
                        <div class="card-header">
                            <h3 class="card-title">Apresentação</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="" id="first_section_hw">
                                <div class="form-group">
                                    <label for="img_hw"><b>Imagem</b></label><br>
                                    <input type="file" name="image_hw[]"/><br>
                                    <label for="text-hw"><b>Texto</b></label>
                                    <textarea name="text-hw" class="form-control" style="resize: none" cols="30" rows="5">
                                    </textarea>
                                </div>
                                <input type="hidden" name="editar_sobre" value="">
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="baskets_section" class="card mt-5">
                    <div class="card-header">
                            <h3 class="card-title">Cestas</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" id="" action="">
                                <div class="form-group">
                                    <label for="email"><b>Primeira Cesta</b></label><br>
                                    <form action="img_slideshow.php" enctype="multipart/form-data" method="post">
                                        <input type="file" name="image_slideshow[]" multiple/>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <label for="email"><b>Segunda Cesta</b></label><br>
                                    <form action="img_slideshow.php" enctype="multipart/form-data" method="post">
                                        <input type="file" name="image_slideshow[]" multiple/>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <label for="email"><b>Terceira Cesta</b></label><br>
                                    <form action="img_slideshow.php" enctype="multipart/form-data" method="post">
                                        <input type="file" name="image_slideshow[]" multiple/>
                                    </form>
                                </div>
                                <input type="hidden" name="editar_sobre" value="">
                                <button type="submit" name="acao" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="o_que_prezamos_section" class="card mt-5">
                    <div class="card-header">
                            <h3 class="card-title">Produtos</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                            <div class="form-group">
                                    <label for="email"><b>Imagens</b></label><br>
                                    <form action="img_prezamos.php" enctype="multipart/form-data" method="post">
                                        <input type="file" name="image_prezamos[]"/>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <label for="email"><b>Texto</b></label>
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