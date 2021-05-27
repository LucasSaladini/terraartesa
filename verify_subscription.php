<?php
    include_once 'config/database.php';
    include_once 'class/subscribe.php';

    $database = new Database();
    $db = $database->getConnection();

    $subscriber = new Subscribe($db);
    $statusMsg = '';
    if(!empty($_GET['email_verify'])) {
        $verifyToken = $_GET['email_verify'];
        $subscriber->verify_token = $verifyToken;
        if($subscriber->verifyToken()) {
            $subscriber->is_verified = 1;
            if($subscriber->update()) {
                $statusMsg = '<p class="success">Seu e-mail foi verificado com sucesso!</p>';
            } else {
                $statusMsg = '<p class="error">Ocorreu um problema durante a verificação do seu e-mail. Por favor, tente novamente.</p>';
            }
        } else {
            $statusMsg = '<p class="error">Você clicou no link errado, por favor, verifique seu e-mail e tente novamente.</p>';
        }
    }
?>