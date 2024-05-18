<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'vendor/autoload.php';

use src\core\Input as input;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//print_r($_SERVER['REQUEST_URI']);return;

$errors = [];
$data = [];
$check = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'&& $_SERVER['REQUEST_URI'] =='/auth.api/process.php?q=auth_start'){
    // check if token has access
    // echo json_encode($_POST);die();
    // $body = file_get_contents('php://input');
    // $d = json_decode($body);
    // var_dump($d);return;
    // $data['name'] = input::get('name');
    // $data['email'] = input::get('email');
    // aname is name ---> the Javascript dynamic requires a static grab of values from the form
    // bname is email
    if(input::exists()){

        $data['aname'] = !empty(input::get('aname')) ?  input::get('aname') : $errors['name'] = 'Name is required';
        $data['bname'] = !empty(input::get('bname')) ? input::get('bname') : $errors['email'] = 'Email is required';
        // print_r($errors); 
        // print_r($data); die();
        if (!empty($errors)) {
            //Send back all errors
            $data['message'] = 'Missing input';
            $data['errors'] = $errors;
            http_response_code(401);
            echo json_encode($data);
            return;
        }
        $data = $data + $_POST;
    } else {
        $body = file_get_contents('php://input');
        $data = json_decode($body,true);
        $data['aname'] = !empty($data['aname']) ? $data['aname'] : $errors['name'] = 'Name is required';
        $data['bname'] = !empty($data['bname']) ? $data['bname'] : $errors['email']  = 'Email is required';
        if (!empty($errors)) {
            //Send back all errors
            $data['message'] = 'Missing input';
            $data['errors'] = $errors;
            http_response_code(401);
            echo json_encode($data);
            return;
        }
    }
    logEvent('The user ' . $data['aname'] . '  with email '. $data['bname'] . ' requested access');
    $check = substr($data['bname'],-11);

    if($check === '@ncjfcj.org'){
        try{
            $pin = rand(1001,9999);
            $data['pin'] = crypt($pin,'587b7b8330NCJFCJ');
            if(email($data['bname'], $pin, $data['aname'])){
                http_response_code(200);
                $data['message'] = 'Check your email for pin confirmation';
                //$data['rname'] = $data['bname'];
                echo json_encode($data);
                return;
                //Generate a rendom pin
                //keep it as md5
                //send the pin back to FrontEnd
                //header("Location: process_b.php");
            } else {
                $data['message']= 'Sorry the system failed to send email';
                echo json_encode($data);
                //header("Location: index.html");
                return;
            }
        }catch(Exception $e){
            logEvent('The error of this request is : name => ' . $data['aname'] . '  and email '. $data['bname']);
            echo json_encode($e->getMessage());
            //return $e->getMessage();
            return;
        }
    } else{
        logEvent('The error of this request is : name => ' . $data['aname'] . '  and email '. $data['bname']);
        echo json_encode(['message'=>'Authentication Failed']);
        return;
    }
    echo json_encode(['message'=>'Wrong request format']);
    return;
} if($_SERVER['REQUEST_METHOD'] == 'POST'&& $_SERVER['REQUEST_URI'] =='/auth.api/process.php?q=pincheck'){
    
    // echo json_encode($_POST);die();
    // $body = file_get_contents('php://input');
    // $d = json_decode($body);
    // var_dump($d);return;
    // $data['name'] = input::get('name');
    // $data['email'] = input::get('email');
    // aname is pinin ---> the Javascript dynamic requires a static grab of values from the form
    // bname is pincode
    if(input::exists()){

        $data['aname'] = !empty(input::get('aname')) ?  input::get('aname') : $errors['aname'] = 'No pin Provided, pin is required';
        $data['bname'] = !empty(input::get('bname')) ? input::get('bname') : $errors['bname'] = 'Pincode error';
        // print_r($errors); 
        // print_r($data); die();
        if (!empty($errors)) {
            //Send back all errors
            $data['message'] = 'Error in input';
            $data['errors'] = $errors;
            http_response_code(401);
            echo json_encode($data);
            return;
        }
        $data = $data + $_POST;
    } else {
        $body = file_get_contents('php://input');
        $data = json_decode($body, true);
        
    }
    //print_r($data); return;
    $md5pin = crypt($data["aname"],'587b7b8330NCJFCJ');
    //echo $md5pin; return;
    if($md5pin == $data["bname"]) {
        logEvent("Code " . $data["aname"] . " Guaranteed access");
        // Authanticated Code MD5(PIN)
        // Get Redirect url from database
        echo json_encode(["message"=>"You are authenticated","rid_url"=>"https://ncjfcj.org/media/tps.php"], JSON_UNESCAPED_SLASHES);
        //echo json_encode("You are authenticated");
        return;
        // header('https://ncjfcj.org/tps');
    } else{
        $data['message']='Wrong PIN';
        $data['errors'] =['pinin' => 'Wrong Authentication Code. Enter the right code or Refresh the page and restart'];
        echo json_encode($data);
        return;
    }
}
else {
        http_response_code(404);
        echo json_encode(['message'=>'Bad request 07']);
        return;
    }

function verifyemail($email=null){
    echo substr($email,-11);
}

//function email($to, $pin, $name)
//{
//    $msg_pin = 'Hello ' . $name . ', here is the pin to verify your identity //PIN : '. $pin .' Thank you.';
//        if(! mail($to,'Access Verification', $msg_pin,'Authantication@ncjfcj.org')){
//            throw new Exception("Email was not sent".$msg_pin);
//        }
//    return true;
//}

function email($to, $pin, $name)
{
    
    $mail = new PHPMailer(true);

    try{
        $mail->SMTPDebug = 0;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'a2plcpnl0390.prod.iad2.secureserver.net';      
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'auth@ifinder.online';         //SMTP username
            $mail->Password   = 'MucyoCyusA0!#';             //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                    

            //Recipients
            $mail->setFrom('Authentication@access.ncjfcj.org', 'Authentication NCJFCJ');
            $mail->addAddress($to, $name);
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Access Verification PIN';
            $mail->Body    = 'Hello <b>' . $name . '</b>, use the following pin to verify your identity. <br> <h2> PIN : '. $pin .'</h2>
                                <br>Thank you, <br> Authentication NCJFCJ<br>https://access.ncjfcj.org';
            $mail->AltBody = 'Hello '.$name.', the following is your pin. Use :'.$pin.' to confirm your identity.';

            $mail->send();
            //echo 'Message has been sent';
            return true;
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            throw new Exception("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
}

function logEvent($message) {
    if ($message != '') {
        // Add a timestamp to the start of the $message
        $message = date("Y/m/d H:i:s").': '.$message;
        $fp = fopen('accesslog.txt', 'a');
        fwrite($fp, $message."\n");
        fclose($fp);
    }
}