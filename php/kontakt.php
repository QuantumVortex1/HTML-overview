<?php
// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten erfassen
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Hier können weitere Aktionen ausgeführt werden, z.B. E-Mails senden, Daten speichern usw.
    
    // Beispiel: E-Mail senden
    $to = "jon.dieroff.23@lehre.mosbach.dhbw.de";
    $subject = "Kontaktformular Nachricht";
    $body = "Name: $name\n";
    $body .= "E-Mail: $email\n";
    $body .= "Nachricht:\n$message";
    mail($to, $subject, $body);

    // Bestätigung an den Benutzer senden
    echo "Vielen Dank für Ihre Nachricht, $name! Wir werden uns bald bei Ihnen melden.";
} else {
    // Wenn das Formular nicht abgesendet wurde, Weiterleitung oder Fehlermeldung anzeigen
    echo "Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut.";
}