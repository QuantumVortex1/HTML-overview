<?php 
$loginusername = $_POST['loginusername'];
$loginemail = $_POST['loginemail'];
$password = $_POST['password'];
echo "Vielen Dank fürs Anmelden, $loginusername! <br>Hier sind ihre Anmeldedaten: <br><br>"; 
        
echo "<strong>Ihr Name lautet:</strong> $loginusername <br> <strong>Ihre E-Mail lautet:</strong> $loginemail<br> <strong> Ihr sehr starkes Passwort lautet:</strong> $password";
?>