<?php

$conn = mysqli_connect("localhost","root","","school_management");

if(!$conn){
die("Connection Failed: ".mysqli_connect_error());
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if(isset($_POST['submit'])){

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO contact (name,email,subject,message)
VALUES ('$name','$email','$subject','$message')";

$query = mysqli_query($conn,$sql);

if($query){

$mail = new PHPMailer(true);

try{

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'facharaanjali@gmail.com'; 
$mail->Password = 'hamehwbnahiwpcwv'; 
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('facharaanjali@gmail.com','School Management');
$mail->addAddress($email,$name);

$mail->Subject = "Thank you for contacting us";

$mail->Body = "
Hello $name,

Thank you for contacting us.

We received your message:

Subject: $subject
Message: $message

We will contact you soon.

Regards,
School Management Team
";

$mail->send();

header("Location: contact.php?msg=success");

}
catch(Exception $e){
echo "Mailer Error: ".$mail->ErrorInfo;
}

}
else{
echo "Error: ".mysqli_error($conn);
}

}
?>