<?php

$type = $_POST['type']; //1--> spanish, 2--> english
//$companyname = $_POST['companyname'];
$name = $_POST['name'];
//$lastname = $_POST['lastname'];
$email = $_POST['email'];
//$phonenumber = $_POST['phonenumber'];
//$country = $_POST['country'];
//$employees = $_POST['employees'];
$message = $_POST['message'];

$hello = '';
//$companynameLang = '';
$nameLang = '';
$emailLang = '';
//$lastnameLang = '';
//$phonenumberLang = '';
//$countryLang = '';
//$employeesLang = '';
$messageLang = '';
$subject = '';

if($type == '1' )
{
    $hello = 'Hola';
    $nameLang = 'Nombre:';
    //$companynameLang = 'Nombre de la empresa:';
    $emailLang = 'Correo Electrónico:';
  //  $lastnameLang = 'Apellido:';
  //  $phonenumberLang = 'Número Teléfonico:';
  //  $countryLang = 'Pais:';
 //   $employeesLang = 'Empleados:';
    $messageLang = 'Mensaje:';
    $subject = '¡Alguien está interesado en sus servicios no pierdas esta oportunidad!';
}
else if($type == '2'){
    $hello = 'Hello';
    $nameLang = 'Name:';
  //  $companynameLang = 'Company Name:';
    $emailLang = 'Email:';
  //  $lastnameLang = 'Last Name:';
  //  $phonenumberLang = 'Phone Number:';
  //  $countryLang = 'Country:';
  //  $employeesLang = 'Employees:';
    $messageLang = 'Message:';
    $subject = 'Someone is interested in your services do not miss this opportunity ! ';
}
//$image = base64_encode(file_get_contents("http://localhost/img/cyd2.png"));

$message .= '<html><body>';
$message .= "<h1>$hello</h1>";
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
//$message .= "<tr style='background: #f7c694;'><td align='right'><strong>$companynameLang</strong> </td><td>" . $companyname . "</td></tr>";
$message .= "<tr><td align='right'><strong>$nameLang</strong> </td><td>" . $name . "</td></tr>";
//$message .= "<tr style='background: #f7c694;'><td align='right'><strong>$lastnameLang</strong> </td><td>" . $lastname . "</td></tr>";
//$message .= "<tr><td align='right'><strong> $phonenumberLang</strong> </td><td>" . $phonenumber . "</td></tr>";
//$message .= "<tr style='background: #f7c694;'><td align='right'><strong> $countryLang</strong> </td><td>" . $country . "</td></tr>";
//$message .= "<tr><td align='right'><strong> $employeesLang</strong> </td><td>" . $employees . "</td></tr>";
$message .= "<tr style='background: #f7c694;'><td align='right'><strong> $emailLang</strong> </td><td>" . $email . "</td></tr>";
$message .= "<tr><td align='right'><strong>$messageLang</strong> </td><td>" .  trim($_POST["message"]) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

if ( 
empty($name) 
OR !filter_var($email, FILTER_VALIDATE_EMAIL) 
#OR empty($lastname) OR empty($employees)
#OR empty($country) 
OR empty($message)) {
#OR empty($phonenumber) OR empty($companyname) ) {
    # Set a 400 (bad request) response code and exit.
    http_response_code(400);
    echo "Please complete the form and try again.";
    exit;
}

$header  = "From: LR Capital Info <noreplylrcapital@gmail.com>" . "\r\n";
$header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$header .= "Mime-Version: 1.0" . "\r\n";
$header .= "Content-Type: text/html; charset=ISO-8859-1". "\r\n";

$mail_to = 'informacion@lrcapitalpacifico.com';

$success = mail($mail_to, $subject, $message, $header);
    //    if ($success) {
      //      # Set a 200 (okay) response code.
      //      http_response_code(200);
       //     echo "Su mensaje ha sido enviado. Muchas gracias.";
            #$type == 1 ? header("Location:index.html") : header("Location:home.html");
       // } else {
       //     # Set a 500 (internal server error) response code.
       //     http_response_code(500);
        //    echo "<p>Oops! Something went wrong, we couldn't send your message.</p>";
       // }
        

?>