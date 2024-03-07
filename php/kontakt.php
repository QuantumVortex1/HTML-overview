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
        echo "Vielen Dank für Ihre Nachricht, $name! Wir werden uns bald bei Ihnen melden.<br><br>"; 
        
        echo "<strong>Ihre Name lautet:</strong> $name <br> <strong>Ihre E-Mail lautet:</strong> $email<br> <strong>Ihre Nachricht lautet:</strong> <br> $message";
    } catch (Exception $e) {
        echo "Es ist ein Fehler aufgetreten: {$mail->ErrorInfo}";
    }
} else {
    // Wenn das Formular nicht abgesendet wurde, Weiterleitung oder Fehlermeldung anzeigen
    echo "Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut.";
}
?>
