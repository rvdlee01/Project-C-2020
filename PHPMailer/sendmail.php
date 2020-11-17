<?php
    session_start();
    // Send email
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Include encryption function
    include('encrypt_decrypt.php');

    $username = $_SESSION['username'];
    $email = $_SESSION['mail'];
    $key = strlen($username);

    // Encrypt username with length of username as key
    $encrypted_txt = encrypt_decrypt('encrypt', $username, $key);

    $mail = new PHPMailer();

    //Server settings
    $mail->SMTPDebug = false;                                           // Enable verbose debug output
    $mail->isSMTP();                                                    // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                               // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                            // Enable SMTP authentication
    $mail->Username   = 'FleurtOpMail2@gmail.com';                       // SMTP username
    $mail->Password   = 'FleurtOpMail222';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                               // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('FleurtOpMail2@gmail.com', 'Fleurt Op');
    $mail->addAddress("$email", "$username");     // Add a recipient

    // Content
    $mail->isHTML(true);                                                  // Set email format to HTML
    $mail->Subject = 'Email verificatie';

    $mail->Body = "Beste $username,<br><br>
                   Om uw registratie te voltooien kunt u op de onderstaande link klikken.<br>
                   Bevestig je account: <a href='https://www.roy-van-der-lee.nl/fleurtop/verify.php?accountverification=$encrypted_txt&key=$key'>Registreer account</a><br><br>
                   Met vriendelijk groet,<br>
                   Fleurt Op";

    $mail->send();

    echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
    exit();
?>