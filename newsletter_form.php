<?php

include("PHPMailer/PHPMailer.php");
include("PHPMailer/SMTP.php");
include("PHPMailer/Exception.php");

try {


    $type = $_POST['type']; //1--> spanish, 2--> english
    $emailTo = $_POST['email'];
    $email = $_POST['email'];
  //  $bodyEmail = $_POST['message'];
   // $message = $_POST['message'];


    $hello = '';
    $emailLang = '';
    $messageLang = '';
    $subject = '';
    $headers = '';
    $bodyEmail = '';

    if($type == '1' )
    {
        $hello = 'Hola';
        $emailLang = 'Correo Electrónico:';
        $subject = '¡Alguien está tratando de comunicarse con usted a través de su sitio web de LR Capital!';
        $fromname = "¡Alguien está tratando de comunicarse con usted a través de su sitio web de LR Capital!";      

    }
    else if($type == '2'){
        $hello = 'Hello';
        $emailLang = 'Email:';
        $subject = 'Someone is trying to reach you by using your LR Capital website!';
        $fromname = "Someone is trying to reach you by using your LR Capital website!";       

    }
        
    //$image = base64_encode(file_get_contents("http://localhost/img/cyd2.png"));


    $headers  = "From: LR Capital Info <noreplylrcapital@gmail.com>" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "Mime-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8". "\r\n";

    $fromemail = "noreplylrcapital@gmail.com";

    $host = "smtp.gmail.com";
    $port = "587";
    $SMTPAuth = "login";
    $SMTPSecure = "tls";
    $Username = "noreplylrcapital@gmail.com";
    $Password = "tvex jnpw pkuu rama";
    $emailTo = 'informacion@lrcapitalpacifico.com'; 
      /*   $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );*/

    $image = base64_encode(file_get_contents("img/logo/lrcp-logo-1.png"));
    $logo = 'img/logo/lrcp-logo-1.png';
    $link = 'https://lrcapitalpacifico.com/';
        
    //  $bodyEmail .= '<html><body>';
    //    $bodyEmail .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
    $bodyEmail .= "<h1>$hello</h1>";
        // $bodyEmail .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        // $bodyEmail .= "<tr style='background: #f7c694;'><td align='right'><strong>$nameLang</strong> </td><td>" . $name . "</td></tr>";
    $bodyEmail .= "<tr><td align='right'><strong> $emailLang</strong> </td><td>" . $emailTo . "</td></tr>";
    //$bodyEmail .= "<tr><strong>$messageLang</strong> </td><td>" .  trim($_POST["message"]) . "</td></tr>";
      //  $bodyEmail .= "</table>";
     //   $bodyEmail .= "</body></html>";

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = $host;
    $mail->Port = $port;
    $mail->SMTPAuth = $SMTPAuth;
    $mail->SMTPSecure = $SMTPSecure;
    $mail->Username = $fromemail;
    $mail->Password = $Password;

    $mail->setFrom($fromemail,'LR Capital Info');
    $mail->addAddress($emailTo);
    $mail->Subject = $subject;

    $mail->msgHTML($bodyEmail);
    $mail->AltBody = strip_tags($bodyEmail);
    $mail->CharSet = 'UTF-8';
    $mail->send();


    $mail->isHTML(true);

    if(!$mail->send()){
        if($type == '1' ){
            error_log("Mailer Error: No se pudo enviar el correo! " . $mail->ErrorInfo); die();
        }
        else if($type == '2'){
            error_log("Mailer Error: We couldn't send your message! " . $mail->ErrorInfo); die();
        }    
    }
    if($type == '1' ){
        echo "<html>";
        echo "<div style='color: #C7C7C7;margin-left: 15px;margin-bottom: 15px;font-size: 14px;'>Mensaje enviado correctamente.</div>";die();
    }
    else if($type == '2'){
        echo "<html>";
        echo "<div style='color: #C7C7C7;margin-left: 15px;margin-bottom: 15px;font-size: 14px;'>Your message has been sent.</div>";die();
    }    
    
    } catch (Exception $e) {

    }
  
?>