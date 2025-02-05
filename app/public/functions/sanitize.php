<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function escape($string) {
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function email($to, $subject, $body){
	//mail($to, $subject, $body,'From: webmaster@betopcorporation.com');
	mailer($to, $subject, $body);
}
function output_errors($errors){
	return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
}

function get_slug($url) {
	
	$pos = strrpos($url, '/');
	$slug = substr($url, $pos + 1);
	
	return $slug;
	
}

function selected($value1, $value2, $return) {
	
	if($value1 == $value2) {
		echo $return;
	}

}

function nav_main(){
	
	$nav = DB::getInstance()->query("SELECT* FROM navigation WHERE parent_position = ? ORDER BY position ASC", array(0));

	foreach ($nav->results() as $navigation){
		
		$slug = get_slug($navigation->url);
			?>
			<li class=" dropdown <?php selected(Config::get('uri_parts/last'), $slug,' active') ?>">
				<a title="<?php echo $navigation->label;?>" class="dropdown-toggle" href="<?php echo Config::get('uri_parts/base').$navigation->url;?>" data-toggle="dropdown" aria-haspopup="true" aria-expended="false"><?php echo $navigation->label;?></a>
					<ul class="dropdown-menu">
						<?php	
						$tp = $navigation->id;
						$row = DB::getInstance()->query("SELECT * FROM navigation WHERE parent_position = ? ORDER BY position ASC",array($tp));
						foreach($row->results() as $rownav) {
							$rowslug = get_slug($rownav->url);
									?>
										<li><a title="<?php echo  $rownav->label;?>" class="dropdown-toggle" href="<?php echo Config::get('uri_parts/base').$rownav->url; ?>"><?php echo $rownav->label;?></a></li>
									<?php
								}
							?>
					</ul>
			</li>

			<?php }
}

function mailer($to, $subject, $body)
{
    
    $mail = new PHPMailer(true);

    try{
        $mail->SMTPDebug = false; // SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                            
            $mail->Host       = '*******************';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = '**************************';         //SMTP username
            $mail->Password   = '********************';             //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 587;                                    

            //Recipients
            $mail->setFrom('renmer03@betopcorporation.com', 'Betop Corporation Service');
            $mail->addAddress($to, 'Customer');
            //$mail->addAddress('');
            //$mail->addReplyTo('info@ncjfcj.org', 'Information');
            //$mail->addCC('');
            //$mail->addBCC('');
            //Attachments
            //$mail->addAttachment('');         //Add attachments
            //$mail->addAttachment('');    //Optional name
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = $body;

            $mail->send();
            //echo 'Message has been sent';
            return true;
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
}
