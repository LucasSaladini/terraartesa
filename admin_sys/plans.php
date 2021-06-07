<!--php-->
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dashboard-plans.css">
    <title>Painel Administrativo</title>
</head>
</head>
<body>
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

    <section class="principal">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group col-2 px-0 fixed-top">
                        <a href="#" class="list-group-item active" ref_sys="plans_details">Detalhes dos Planos</a>
                        <a href="#" class="list-group-item" ref_sys="plans">Planos</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card" id="plans_details_section">
                        <div class="card-header">
                            <h3 class="card-tile">Detalhes dos Planos</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <label for="card1_tile" class="mt-2"><b>Título Cartão 1</b></label>
                                <textarea name="card1_tile" class="form-control" style="resize: none" cols="10" rows="1"></textarea>

                                <label for="text_card1" class="mt-2"><b>Texto Cartão 1</b></label>
                                <textarea name="text_card1" class="form-control mb-5" style="resize: none" cols="10" rows="5"></textarea>

                                <label for="card1_title" class="mt-2"><b>Título Cartão 2</b></label>
                                <textarea name="card1_title" class="form-control" style="resize: none" cols="10" rows="1"></textarea>

                                <label for="text_card2" class="mt-2"><b>Texto Cartão 2</b></label>
                                <textarea name="text_card2" class="form-control mb-5" style="resize: none" cols="10" rows="5"></textarea>

                                <label for="card3_title" class="mt-2"><b>Título Cartão 3</b></label>
                                <textarea name="card3_title" class="form-control" style="resize: none" cols="10" rows="1"></textarea>

                                <label for="text_card3" class="mt-2"><b>Texto Cartão 3</b></label>
                                <textarea name="text_card3" class="form-control mb-5" style="resize: none" cols="10" rows="5"></textarea>

                                <button type="submit" class="btn btn-success">Atualizar</button>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-5 mb-5" id="plans_section">
                        <div class="card-header">
                            <h3 class="card-tile">Planos</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                            <label for="card1_tile_plan" class="mt-2"><b>Título Cartão 1</b></label>
                                <textarea name="card1_tile_plan" class="form-control" style="resize: none" cols="10" rows="1"></textarea>

                                <label for="text_card1_plan" class="mt-2"><b>Texto Cartão 1</b></label>
                                <textarea name="text_card1_plan" class="form-control mb-5" style="resize: none" cols="10" rows="5"></textarea>

                                <label for="card1_title_plan" class="mt-2"><b>Título Cartão 2</b></label>
                                <textarea name="card1_title_plan" class="form-control" style="resize: none" cols="10" rows="1"></textarea>

                                <label for="text_card2_plan" class="mt-2"><b>Texto Cartão 2</b></label>
                                <textarea name="text_card2_plan" class="form-control mb-5" style="resize: none" cols="10" rows="5"></textarea>

                                <label for="card3_title_plan" class="mt-2"><b>Título Cartão 3</b></label>
                                <textarea name="card3_title_plan" class="form-control" style="resize: none" cols="10" rows="1"></textarea>

                                <label for="text_card3_plan" class="mt-2"><b>Texto Cartão 3</b></label>
                                <textarea name="text_card3_plan" class="form-control mb-5" style="resize: none" cols="10" rows="5"></textarea>
                                
                                <button type="submit" class="btn btn-success">Atualizar</button>
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