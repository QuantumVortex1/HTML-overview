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
    <?php include __DIR__.'/templates/overlay.php'; ?>
    <header class="hide-login">
        <?php include __DIR__.'/templates/header.php'; ?>
    </header>
    <main name="form-filler">
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
        $mail->Password   = 'jibk gyvr eusk bcuo'; // SMTP-Passwort
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; // Port des SMTP-Servers

        // Empfänger
        $mail->setFrom('from@example.com', $name);
        $mail->addAddress('htmlgruppe@gmail.com','HTMLgruppe');

        // Inhalt der E-Mail
        $mail->isHTML(false);
        $mail->Subject = 'Kontaktformular Nachricht';
        $mail->Body    = "Name: $name\nE-Mail: $email\nNachricht:\n$message";

        $mail->send();
        echo <<<STR
            <h2>Vielen Dank für Ihre Nachricht, $name! Wir werden uns bald bei Ihnen melden.</h2>
            <p><strong>Gesendete Email:</strong></p>
            <p><strong>Von </strong> $name ($email)</p>
            <p>$message</p>
            <form action="/HTML-overview/index.php"><input class="form-submit" type="submit" value="Zurück zur Hauptseite" /></form>
            STR;
    } catch (Exception $e) {
        echo "Es ist ein Fehler aufgetreten: {$mail->ErrorInfo}";
    }
} else {
    // Wenn das Formular nicht abgesendet wurde, Weiterleitung oder Fehlermeldung anzeigen
    echo "Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut.";
}
?>
</main>
<footer class="hide-contact">
        <?php include __DIR__.'/templates/footer.php'; ?>
    </footer>
</body>
</html>
