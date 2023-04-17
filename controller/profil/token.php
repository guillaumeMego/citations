<?php 

require_once ROOT . '/model/token.model.php';
require_once ROOT . '/inc/config.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require ROOT . '/vendor/autoload.php';
function envoiMail($email, $token){

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = MAIL_HOST;                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = MAIL_USER;                     //SMTP username
      $mail->Password   = MAIL_PASSWORD;                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = MAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
      
      //Recipients
      $mail->setFrom('contact@guillaumeganne.com');
      $mail->addAddress($email);     //Add a recipient
    
    
    
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Token de recupération de mot de passe';
      $mail->Body    = 'Voici votre lien de recuperation : http://localhost:8888/cdaDev/citations/public/index.php?controller=profil&action=verifier&token='. $token;
    
     return $mail->send();
        
    }

    


if(isset($_POST['mail'])){
    if(!empty($_POST['mail'])){
        if(verifieMail($pdo, $_POST['mail'])){
            $token = token($pdo, $_POST['mail']);
                if(envoiMail($_POST['mail'], $token)){
                    $_SESSION['msg'] = [
                        'css' => 'warning',
                        'txt' => 'Si votre mail existe, un mail vous a été envoyé'
                    ];
                }
        }else{
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Si votre mail existe, un mail vous a été envoyé'
            ];
        }
    }else{
        $_SESSION['msg'] = [
            'css' => 'warning',
            'txt' => 'Veuillez remplir le champ mail'
        ];
    }
}


require ROOT . '/view/profil/token.php';












