<?php
$type = $_POST['type']; //1--> spanish, 2--> english
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
//$subject = $_POST['subject'];

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
    $subject = '¡Alguien está tratando de comunicarse con usted a través de su sitio web de CYD!';
}
else if($type == '2'){
    $hello = 'Hello';
    $emailLang = 'Email:';
    $nameLang = 'Name:';
    $messageLang = 'Message:';
    $subject = 'Someone is trying to reach you by using your CYD website!';
}
//$image = base64_encode(file_get_contents("http://localhost/img/cyd2.png"));

$message .= '<html><body>';
$message .= "<h1>$hello</h1>";
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #EDFAFD;'><td align='right'><strong>$nameLang</strong> </td><td>" . $name . "</td></tr>";
$message .= "<tr><td align='right'><strong> $emailLang</strong> </td><td>" . $email . "</td></tr>";
$message .= "<tr style='background: #EDFAFD;'><td align='right'><strong>$messageLang</strong> </td><td>" .  trim($_POST["message"]) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($message)) {
    # Set a 400 (bad request) response code and exit.
    http_response_code(400);
    echo "Please complete the form and try again.";
    exit;
}

$header  = "From: CYD Info <noreplylrcapital@gmail.com>" . "\r\n";
$header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$header .= "Mime-Version: 1.0" . "\r\n";
$header .= "Content-Type: text/html; charset=ISO-8859-1". "\r\n";

$mail_to = 'crenteria@deviseis.com';

$success = mail($mail_to, $subject, $message, $header);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
            $type == 1 ? header("Location:contacto.html") : header("Location:contact.html");
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "<p>Oops! Something went wrong, we couldn't send your message.</p>";
        }

?>