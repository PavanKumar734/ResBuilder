<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../Asset/class/database.class.php';
require '../Asset/class/function.class.php';
require '../Asset/packages/phpmailer/src/Exception.php';
require '../Asset/packages/phpmailer/src/PHPMailer.php';
require '../Asset/packages/phpmailer/src/SMTP.php';


if($_POST)
{
$post=$_POST;

if($post['email_id'])
{
    $email_id=$db->real_escape_string($post['email_id']);
  
    $result=$db->query("SELECT id,full_name  FROM users where (email_id='$email_id')");

    $result = $result->fetch_assoc();
   if($result){
    $otp = rand(100000,999999);
    
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'khb.amasebail@gmail.com';                     //SMTP username
        $mail->Password   = 'fizqayalwyupcqqa';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('verify@resumebuilder.com', 'Resume Builder');

        $mail->addAddress($email_id);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Forgot Password ?';
        $mail->Body    = 'Your 6 digit verification  Code: <b>'.$otp.'</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; //only req in keypad phones
    
        $mail->send();

        
        $fn->setSession('otp',$otp);
        $fn->setSession('email',$email_id);
        $fn->redirect('../verification.php');
        // echo 'Message has been sent';
    } catch (Exception $e) {
        $fn->setError($mail->ErrorInfo);
        $fn->redirect('../forgot-password.php');
    }

   }


   else{
    $fn->setError($email_id.'is not registered');
    $fn->redirect('../forgot-password.php');
   }
    


   
}
else{
    $fn->setError('Please enter email id');
    $fn->redirect('../forgot-password.php');
}
}
else{
    $fn->redirect('../forgot-password.php');
}
?>