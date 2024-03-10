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
    <header class="hide-login">
    <?php include __DIR__.'/templates/header.php'; ?>
    </header>
    <main id="form-filler">
        <?php 
        $loginusername = $_POST['loginusername'];
        $loginemail = $_POST['loginemail'];
        $password = $_POST['password'];
        echo <<<STR
        <h2>Herzlich willkommen, $loginusername!</h2> 
        <p>Bitte überprüfen Sie ihre Anmeldedaten:</p>
        <p><strong>Ihr Name lautet:</strong> $loginusername</p>
        <p><strong>Ihre E-Mail lautet:</strong> $loginemail</p>
        <p><strong> Ihr sehr starkes Passwort lautet:</strong> $password</p>
        <form action="../index.php"><input class="form-submit" type="submit" value="Passt alles, zurück zur Hauptseite" /></form>
        STR ?>
    </main>
    <footer class="hide-contact">
        <?php include __DIR__.'/templates/footer.php'; ?>
    </footer>
</body>
</html>
