<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erfolgreich angemeldet</title>
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="icon" href="../favicons/f4.jpg">
    <script src="../script.js"></script>
</head>
<body>
    <header>
    <?php include '../php/templates/header.php'; ?>
    </header>
    
</body>
</html>

<?php 
$loginusername = $_POST['loginusername'];
$loginemail = $_POST['loginemail'];
$password = $_POST['password'];
echo "Vielen Dank fürs Anmelden, $loginusername! <br>Hier sind ihre Anmeldedaten: <br><br>"; 
        
echo "<strong>Ihr Name lautet:</strong> $loginusername <br> <strong>Ihre E-Mail lautet:</strong> $loginemail<br> <strong> Ihr sehr starkes Passwort lautet:</strong> $password";
?>