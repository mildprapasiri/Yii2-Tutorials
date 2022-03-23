<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('Etc/UTC');

require 'vendor/autoload.php';


$mail = new PHPMailer(true);
//Tell PHPMailer to use SMTP


$alert = ' ';

if(isset($_POST['submit'])){
    $order_name = $_POST['order_name'];
    $order_email =  $_POST['order_email'];
    $order_phone =  $_POST['order_phone'];
    $order_address = $_POST['order_address'];
    $order_city = $_POST['order_city'];
    $order_state =  $_POST['order_state'];
    $order_zipcode =  $_POST['order_zipcode'];
try{
$mail->isSMTP();
//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';

//$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->SMTPAuth = true;
$mail->Username = 'kankeaw2542@gmail.com';
$mail->Password = 'k0808389651';

$mail->setFrom('kankeaw2542@gmail.com', 'Order Form');
$mail->addAddress('thanyaret.tyr098@gmail.com');

$mail->isHTML(true);
$mail->Subject = 'Order';
$mail->Body    = "<p>$order_email</p> <h3>OPTION 2</h3> <p><b>name</b><br> $order_name<br><br><p><b>address</b><br>$order_address <br>$order_city <br>$order_state <br>$order_zipcode </p>";

$mail->send();
$alert = '<div class="alert success">
<span class="closebtn" onclick="this.parentElement.style.display=none;">&times;</span> 
<h5><i>Thank you for ordering directly from us.<br>Your invoice will be sent by email shortly.<br><br>Order summary:<br>
// Thai heirloom black rice<br>at $78 for 25lb (pack of 4)<br><br>This invoice redirects to a secure, third party payment portal to enter your credit card information.<br>Paypal option can be activated on request.</i></h5>
</div>';
} catch (Exception $e){
$alert = '<div class="alert-error">
            <span>'.$e->getMessage().'</span>
          </div>';
}
}
