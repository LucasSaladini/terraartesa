<?php
    include_once 'config/database.php';
    include_once 'class/subscribe.php';

    $database = new Database();
    $db = $database->getConnection();

    $subscriber = new Subscribe($db);

    if(isset($_POST['subscribe'])) {
        $errorMsg = '';
        $response = array(
            'status' => 'err',
            'msg' => 'Alguma coisa deu errado, por favor, tente novamente mais tarde.'
        );

        if(empty($_POST['name'])) {
            $pre = !empty($msg)?'<br/>':'';
            $errorMsg .= $pre.'Por favor, insira seu nome.';
        }
        if(empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $pre = !empty($msg)?'<br/>':'';
            $errorMsg .= $pre.'Por favor, insira um e-mail válido';
        }
        if(empty($errorMsg)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $verifyToken = md5(uniqid(mt_rand()));

            $subscriber->email = $email;
            if($subscriber->getSubscriber()) {
                $response['msg'] = 'Seu e-mail já está na nossa lista de inscritos';
            } else {
                $subscriber->name = $name;
                $subscriber->verify_token = $verifyToken;
                $insert = $subscriber->insert();

                if($insert) {
                    $siteName = 'Terra Artesã';
                    $siteEmail = 'email@exemplo.com.br';
                    $siteURL = ($_SERVER["HTTPS"] == "on")?'https://':'http://';
                    $siteURL = $siteURL.$_SERVER["SERVER_NAME"].dirname($_SERVER['REQUEST_URI']).'/';
                    $verifyLink = $siteURL.'verify_subscription.php?email.verify='.$verifyToken;
                    $subject = 'Confirmar inscrição no newsletter da Terra Artesã';
                    $message = '<h1 style="font-size: 22px; margin: 18px 0 0; padding: 0; text-align: left; color: #3c7bb9">Confirmação de E-mail</h1>
                    <p style="color: #616471; text-align: left; padding-top: 15px; padding-right: 40px; padding-bottom: 30px; padding-left: 40px; font-size: 15px"> Obrigado por se inscrever na' .$siteName.'! Por favor, confirme seu e-mail clicando no link abaixo.</p>
                    <p style="text-align: center;">
                    <a href="'.$verifyLink.'" style="border-radius: .25em; background-color: #4582e8; font-weight: 400; min-width: 180px; font-size: 16px; line-height: 100%; padding-top: 18px; padding-right: 30px; padding-bottom: 18px; padding-left: 30px; color: #ffffff; text-decoration: none;">Confirmar E-mail</a>
                    </p>
                    <br><p><strong>Equipe da '.$siteName.'</strong></p>';

                    $headers = "MIME-version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "De: $siteName"." <".$siteName.">";

                    $mail = mail($email, $subject, $message, $headers);
                    if($mail) {
                        $response = array(
                            'status' => 'ok',
                            'msg' => 'Um link de verificação foi enviado para o seu e-mail, por favor, verifique sua caixa de entrada e verifique sua conta.'
                        );
                    }
                }
            }
        } else {
            $response['msg'] = $errorMsg;
        }
        echo json_encode($response);
    }
?>