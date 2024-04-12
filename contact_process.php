<?php


    if($_SERVER["REQUEST_METHOD"] == "POST"){

    }

    include("PHPMailer/PHPMailer.php");
    include("PHPMailer/SMTP.php");
    include("PHPMailer/Exception.php");

    try {

       $type = $_POST['type']; //1--> spanish, 2--> english
       $name = $_POST['name'];
       $emailTo = $_POST['email'];
       $email = $_POST['email'];
       $bodyEmail = $_POST['message'];
      //  $message = $_POST['message'];
        $subject = $_POST['subject'];
      //  $mail = $_POST['mail_to'];


      $hello = '';
      $emailLang = '';
      $nameLang = '';
      $messageLang = '';
      $subject = '';
      $headers = '';

        if($type == '1' )
        {
            $hello = 'Hola';
            $emailLang = 'Correo Electrónico:';
            $nameLang = 'Nombre:';
            $messageLang = 'Mensaje:';
            $subject = '¡Alguien está tratando de comunicarse con usted a través de su sitio web de LR Capital!';
            $fromname = "¡Alguien está tratando de comunicarse con usted a través de su sitio web de LR Capital!";

        }
        else if($type == '2'){
            $hello = 'Hello';
            $emailLang = 'Email:';
            $nameLang = 'Name:';
            $messageLang = 'Message:';
            $subject = 'Someone is trying to reach you by using your LR Capital website!';
            $fromname = "Someone is trying to reach you by using your LR Capital website!";

        }

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
        
        $bodyEmail .= '<html><body>';
        $bodyEmail .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
        $bodyEmail .= "<h1>$hello</h1>";
        $bodyEmail .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $bodyEmail .= "<tr style='background: #f7c694;'><td align='right'><strong>$nameLang</strong> </td><td>" . $name . "</td></tr>";
        $bodyEmail .= "<tr><td align='right'><strong> $emailLang</strong> </td><td>" . $email . "</td></tr>";
        $bodyEmail .= "<tr style='background: #f7c694;'><td align='right'><strong>$messageLang</strong> </td><td>" .  trim($_POST["message"]) . "</td></tr>";
        $bodyEmail .= "</table>";
        $bodyEmail .= "</body></html>";

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
                
                echo "Mensaje enviado correctamente."; die();
        }
        else if($type == '2'){
            echo "Your message has been sent."; die();
        }

    } catch (Exception $e) {

    }



/*$mailer->setFrom ($email, "$name");
$mailer->addAddress('crenteria@deviseis.com');
$mailer->Subject = "¡Alguien está tratando de comunicarse con usted a través de su sitio web de LR Capital! $subject";
$mailer->msgHTML($message);
$mailer->ALtBody = strip_tags($message);
$mailer->send();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';
require 'phpmailer/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;

$type = $_POST['type']; //1--> spanish, 2--> english
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

$hello = '';
$emailLang = '';
$nameLang = '';
$messageLang = '';
$subject = '';

if($type == '1' )
{
    $hello = 'Hola';
    $emailLang = 'Correo Electrónico:';
    $nameLang = 'Nombre:';
    $messageLang = 'Mensaje:';
    $subject = '¡Alguien está tratando de comunicarse con usted a través de su sitio web de LR Capital!';

}
else if($type == '2'){
    $hello = 'Hello';
    $emailLang = 'Email:';
    $nameLang = 'Name:';
    $messageLang = 'Message:';
    $subject = 'Someone is trying to reach you by using your LR Capital website!';

}

$image = base64_encode(file_get_contents("img/logo/lrcp-logo-1.png"));
$logo = 'img/logo/lrcp-logo-1.png';
$link = 'https://lrcapitalpacifico.com/';

$message .= '<html><body>';
$message .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
$message .= "<h1>$hello</h1>";
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #f7c694;'><td align='right'><strong>$nameLang</strong> </td><td>" . $name . "</td></tr>";
$message .= "<tr><td align='right'><strong> $emailLang</strong> </td><td>" . $email . "</td></tr>";
$message .= "<tr style='background: #f7c694;'><td align='right'><strong>$messageLang</strong> </td><td>" .  trim($_POST["message"]) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($message)) {
    # Set a 400 (bad request) response code and exit.
    http_response_code(400);
    echo "Please complete the form and try again.";
    exit;
}

$header  = "From: LR Capital Info <noreplylrcapital@gmail.com>" . "\r\n";
$header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$header .= "Mime-Version: 1.0" . "\r\n";
$header .= "Content-Type: text/html; charset=ISO-8859-1". "\r\n";

$mail_to = 'crenteria@deviseis.com';

$success = mail($mail_to, $subject, $message, $header);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
           # echo "Thank You! Your message has been sent.";
            #$type == 1 ? header("Location:contacto.html") : header("Location:contact.html");
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "<p>Oops! Something went wrong, we couldn't send your message.</p>";
        }*/

?>