<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nachricht Erfolgreich gesendet!</title>
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="icon" href="../favicons/f4.jpg">
    <script src="../script.js"></script>
</head>
<body>
<?php include '../php/templates/overlay.php'; ?>
    <header class="hide-login">
        <?php include '../php/templates/header.php'; ?>
    </header>
    <main id="form-filler">
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer\src\Exception.php';
require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';
// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten erfassen
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    // Beispiel: E-Mail senden
    $mail = new PHPMailer(true);
    try {
        //Server-Einstellungen
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP-Server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'htmlgruppe@gmail.com'; // SMTP-Benutzername
        $mail->Password   = 'iubl liax bahi sole'; // SMTP-Passwort
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port       = 465; // Port des SMTP-Servers
        // Empfänger
        $mail->setFrom('from@example.com', $name);
        $mail->addAddress('htmlgruppe@gmail.com','HTMLgruppe');
        // Inhalt der E-Mail
        $mail->isHTML(false);
        $mail->Subject = 'Kontaktformular Nachricht';
        $mail->Body    = "Name: $name\nE-Mail: $email\nNachricht:\n$message";
        $mail->send();
    } catch (Exception $e) {}
    echo <<<STR
        <h2>Vielen Dank für Ihre Nachricht, $name! Wir werden uns bald bei Ihnen melden.</h2>
        <p><strong>E-mail gesendet an:</strong> htmlgruppe@gmail.com</p>
        <p><strong>Von: </strong> $name ($email)</p>
        <p><strong>Ihre Nachricht:</strong></p>
        <p>$message</p>
        <form action="../index.php"><input class="form-submit" type="submit" value="Zurück zur Hauptseite" /></form>
        STR;
} else {
    // Wenn das Formular nicht abgesendet wurde, Weiterleitung oder Fehlermeldung anzeigen
    echo "Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut.";
}
?>
</main>
<footer class="hide-contact">
        <?php include '../php/templates/footer.php'; ?>
    </footer>

</body>
</html>