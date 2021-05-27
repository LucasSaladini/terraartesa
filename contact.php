<?php   
    if($_POST) {
        $visitor_name = "";
        $visitor_surname = "";
        $visitor_email = "";
        $visitor_subject = "";
        $visitor_message = "";
        $email_body = "<div>";

        if(isset($_POST['visitor_name'])) {
            $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
            $email_body .= "<div><label><b>Nome do contatante:</b></label>&nbsp;<span>".$visitor_name."</span></div>";
        }
        if(isset($_POST['visitor_name'])) {
            $visitor_surname = filter_var($_POST['visitor_surname'], FILTER_SANITIZE_STRING);
            $email_body .= "<div><label><b>Sobrenome do contatante:</b></label>&nbsp;<span>".$visitor_surname."</span></div>";
        }

        if(isset($_POST['visitor_email'])) {
            $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
            $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
            $email_body .= "<div><label><b>E-mail do contactante:</b></label>&nbsp;<span>".$visitor_email."<span></div>";
        }

        if(isset($_POST['visitor_subject'])) {
            $visitor_subject = filter_var($_POST['visitor_subject'], FILTER_SANITIZE_STRING);
            $email_body .= "<div><label><b>Assunto:</b></label>&nbsp;<span>".$visitor_subject."</span></div>";
        }

        if(isset($_POST['visitor_message'])) {
            $visitor_message = htmlspecialchars($_POST['visitor_message']);
            $email_body .= "<div><label><b>Mensagem:</b></label><div>".$visitor_message."</div></div>";
        }

        $email_body .= "</div>";

        $headers = 'MIME-version: 1.0' . "\r\n" . 'Content-type: text/html; charset=utf-8' . "\r\n" . 'De: ' . $visitor_email . "\r\n";

        $recipient = "lucassaladini@gmail.com";

        if(mail($recipient, $visitor_subject, $email_body, $headers)) {
            echo "<p>Muito obrigado por entrar em contato conosco, $visitor_name. Nós te responderemos o mais breve possível!</p>";
        } else {
            echo "<p>Desculpa mas não foi possível enviar o e-mail.</p>";
        }
    } else {
        echo "<p>Alguma coisa deu errado, tente novamente mais tarde, por favor.</p>";
    }

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lucassaladini@gmail.com';                     //SMTP username
        $mail->Password   = 'Zeca1724@';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom($visitor_email, $visitor_name, $visitor_surname);
        $mail->addAddress('lucassaladini@gmail.com', 'Contato do site');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $visitor_subject;
        $mail->Body    = $email_body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>