<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
</head>
<body>
    <?php

$email = $_REQUEST["email"];
require 'connectivity.php';
$sql = "select * from login1 where email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//Load Composer's autoloader
require 'PHPMailer_5.2.0/class.phpmailer.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'biren.arora16@siesgst.ac.in';                 // SMTP username
    $mail->Password = 'Hb26@1997';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('biren.arora16@siesgst.ac.in', 'Rudra Medico');
    $mail->addAddress($row["email"]);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Forgot Password';
    $mail->Body    = '<strong>Your Password is:</strong>'.$row["password"];
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<script type='text/javascript'> window.swal('Good job!', 'Email Sent Successfully!', 'success');window.location.href='http://localhost/InP/MainPage.html';</script>";
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    // header('location: forgot_psw.php');
}
?>
</body>
</html>


<!-- Dont forget to turn off allow apps less secure in accounts->account prefernces->apps with account access-> allow apps with less secure-OFF(It should be turned off , we r just turning it on to test wheter mail is going throuhg PHPMailer) -->