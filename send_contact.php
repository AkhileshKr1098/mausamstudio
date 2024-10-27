<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $mail = new PHPMailer(true);

  try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tech.kr.akhi@gmail.com';  // Your Gmail
    $mail->Password = 'nfvs ksza vhtn rfib';  
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; // TCP port to connect to

    // Sender and recipient settings
    $mail->setFrom('mausamstudio78@gmail.com', 'Mousam Stdio');
    $mail->addAddress('mausamstudio78@gmail.com', '');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'You have new Enquiry Mousam Stdio';
    $mail->Body = '<table style="padding: 10px;">
    <tr >
        <th style="text-align: start;">Name:</th>
        <td>' . $name . '</td>
    </tr>
    
      <tr>
        <th style="text-align: start;">Mobile:</th>
        <td>' . $phone . '</td>
    </tr>

    
     <tr >
        <th style="text-align: start;">Email:</th>
        <td>' . $email . '</td>
    </tr

      <tr>
        <th style="text-align: start;">Subject:</th>
        <td>' . $subject . '</td>
    </tr>
       <tr>
        <th style="text-align: start;">Message:</th>
        <td>' . $message . '</td>
    </tr>
    
</table>';

    // Send email
    $mail->send();
    echo '';
  } catch (Exception $e) {
    echo "Oops! Something went wrong: {$mail->ErrorInfo}";
  }
}
?>