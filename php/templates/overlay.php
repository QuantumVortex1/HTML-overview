<div id="contactOverlay" class="overlay">
    <div class="form-container">
        <span class="close-btn" onclick="closeContactOverlay()">&times;</span>
        <h2>Kontaktformular</h2>
        <form action="/HTML-overview/php/kontakt.php" method="post">
            <div class="form-contact-div">
                <div class="input-group">
                    <label class="form-label" for="contact-input-1">Name</label>
                    <input required id="contact-input-1" type="text" name="name" autocomplete="off"
                        class="form-input">
                </div>
                <div class="input-group">
                    <label class="form-label" for="contact-input-2">E-mail</label>
                    <input required id="contact-input-2" type="email" name="email" autocomplete="off"
                        class="form-input">
                </div>
            </div>
            <div class="input-group form-message">
                <label class="form-label" for="form-message">Nachricht</label>
                <textarea class="form-input" name="message" id="form-message" rows="6" required></textarea>
            </div>
            <button class="form-submit" type="submit">Senden</button>
        </form>
    </div>
</div>
<div id="loginOverlay" class="overlay">
    <div class="form-container-login">
        <span class="close-btn" onclick="closeLoginOverlay()">&times;</span>
        <h2>Login</h2>
        <form action="/HTML-overview/php/login.php" method="post">
        <div class="form-login-div">
            <div class="input-group">
                <label class="form-label" for="login-input-1">Benutzername</label>
                <input required id="login-input-1" type="text" name="loginusername" autocomplete="off"
                    class="form-input">
            </div>
            <div class="input-group">
                <label class="form-label" for="login-input-2">E-Mail</label>
                <input required id="login-input-2" type="email" name="loginemail" autocomplete="off"
                    class="form-input">
            </div>
            <div class="input-group">
                <label class="form-label" for="login-input-3">Passwort</label>
                <input required id="login-input-3" type="password" name="password" autocomplete="off"
                    class="form-input">
            </div>
            </div>
            <button class="form-submit" type="submit">Einloggen</button>
        </form>
    </div>
</div>