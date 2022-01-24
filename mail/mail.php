<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$title = $_POST['title'];
$email = $_POST['email'];
$content = $_POST['content'];

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mail.ru';                         //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'testmail-1995@mail.ru';                     //SMTP username
    $mail->Password   = 'sdgfgrdrg3i9u843h';                               //SMTP password
    $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet    = 'UTF-8';
    
    
    //Recipients
    $mail->setFrom('testmail-1995@mail.ru', 'Заявка с сайта');
    $mail->addAddress('testmail-1995@mail.ru', 'Администратор');     //Add a recipient
    $mail->addAddress('timurabdulvohidov@gmail.com');               //Name is optional
    

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $title;
    $mail->Body    = "<div style=\"border: 5px solid red; padding: 20px;\">
    <h2 style=\"text-align: center; color: blue; text-transform: uppercase;\">Тема письма: $title</h2>
    <h3 style=\"text-align: center; color: green; font-weight: 600;\">Почта отправителя: $email</h3>
    <p style=\"text-align: justify; color: grey; font-size: 20px; text-transform: capitalize;\">$content</p>
    <img src=\"https://историческая-самара.рф/i/priroda/Fauna-Krkniga/20.jpg\" alt=\"\" style=\"border-radius: 20px; text-align: center;\">
</div>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("location: /?route=contact");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

/* 
prwb1930@mail.ru
sdgfgrdrg3i9u843h

*/