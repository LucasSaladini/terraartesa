<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dashboard.css">
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