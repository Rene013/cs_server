<?php

require 'vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use src\core\Input as input;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Ramsey\Uuid\Uuid;


if($_SERVER['REQUEST_METHOD'] == 'GET'){
        try{
            if(email('rkirezicyimanzi@ncjfcj.org', '454555445554', 'TESTAR')):
            echo 'sent';

            endif;

        } catch(Exception $e){
            echo $e->getMessage();
        }
    } else {
        echo json_encode("NOT HERE MY MAN");
    }


function email($to, $pin, $name)
{
    
    $mail = new PHPMailer(true);

    try{
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                            
            $mail->Host       = '******************';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = '**************************************';         //SMTP username
            $mail->Password   = '*********************';             //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                    

            //Recipients
            $mail->setFrom('authentication@auggie.ncjfcj.org', 'Authentication NCJFCJ');
            $mail->addAddress($to, $name);
            //$mail->addAddress('');
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('');
            //$mail->addBCC('');
            //Attachments
            //$mail->addAttachment('');         //Add attachments
            //$mail->addAttachment('');    //Optional name
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Access Verification PIN';
            $mail->Body    = 'Hello ' . $name . ', here is the pin to verify your identity. <br> <h2> PIN : '. $pin .'</h2>
                                <br>Thank you, <br> Authentication NCJFCJ<br>https://ncjfcj.org';
            $mail->AltBody = 'Hello '.$name.', the following is your pin. Use :'.$pin.' to confirm your identity.';

            $mail->send();
            //echo 'Message has been sent';
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //return false;
        }
}
