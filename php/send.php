<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
//correo para autenticarme, esta cuenta debe tener acceso a aplicaciones menos seguras
$email_user = 'agroservicio.ranchito123@gmail.com';
$email_password = 'agro12345';
$the_subject = strip_tags($_POST['asunto']);
$address_to = strip_tags($_POST['correo']);
$from_name = $_POST['nombre'];
$mensaje = $_POST['mensaje'];
$mail = new PHPMailer;
$mail->SMTPDebug = 0;
$mail->isSMTP();                                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $email_user;                            // SMTP username
$mail->Password = $email_password;                           // SMTP password
$mail->SMTPSecure = 'tls'; 
$mail->Port = 587;//465;//587                           // Enable encryption, 'ssl' also accepted
$mail->setFrom($address_to, $from_name);                            // Enable encryption, 'ssl' also accepteds
//para activar la respuesta hacia el usuario que nos escribe
$mail->addReplyTo($address_to, $from_name);
//acá escribo el correo al cual deseo recibir los mensajes (puede ser el mismo que estoy usuando para autenticarme, aunque lo ideal es que sea uno diferente)
$mail->addAddress('agroservicio.ranchito123@gmail.com');




$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $the_subject;
//sacamos el nombre del usuario del correo que nos escribe
$pos = strpos( $address_to, "@");

$username = substr($address_to, 0, $pos);
$mail->msgHTML('<h3>Nombre de la Empresa</h3> <p>Mensaje del sitio web:</p>: ' .$mensaje);
//definimos un mensaje alternativo
$mail->AltBody = 'Mensaje de mi sitio web';
//si el mensaje se envió mostramos un mensaje
if(!$mail->send()) {
    echo '<div class="alert alert-danger"><i class="fa fa-close fa-2x"></i> ERROR!!! Intentelo mas tarde.</div>';
}else{
    echo '<div class="alert alert-success"><i class="fa fa-info-circle fa-2x"></i> El mensaje ha sido enviado, Gracias por escribirnos.</div>'; 
}



?>