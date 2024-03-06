<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>HTML elements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="icon" href="favicons/f4.jpg">
    <script src="script.js"></script>
</head>

<body>
    <header>
        <a href="index.php" title="home">
            <img src="assets/images/logo.png" alt="Logo">
            <h1>HTML Übersicht</h1>
        </a>
        <div id="forms-and-links-div">
            <a href="https://github.com/QuantumVortex1/HTML-overview" target="_blank" class="a-nonsense">
                <img src="assets/images/github-mark-white.svg" alt="Github">
            </a>
            <a href="#" class="a-nonsense">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 20 20">
                    <path fill="white" d="M9.76 0C15.417 0 20 4.477 20 10S15.416 20 9.76 20c-3.191 0-6.142-1.437-8.07-3.846a.644.644 0 0 1 .115-.918a.68.68 0 0 1 .94.113a8.96 8.96 0 0 0 7.016 3.343c4.915 0 8.9-3.892 8.9-8.692c0-4.8-3.985-8.692-8.9-8.692a8.961 8.961 0 0 0-6.944 3.255a.68.68 0 0 1-.942.101a.644.644 0 0 1-.103-.92C3.703 1.394 6.615 0 9.761 0Zm.545 6.862l2.707 2.707c.262.262.267.68.011.936L10.38 13.15a.662.662 0 0 1-.937-.011a.662.662 0 0 1-.01-.937l1.547-1.548l-10.31.001A.662.662 0 0 1 0 10c0-.361.3-.654.67-.654h10.268L9.38 7.787a.662.662 0 0 1-.01-.937a.662.662 0 0 1 .935.011Z" />
                </svg>
            </a>
        </div>
    </header>
    <main>

        <div id="contactOverlay" class="overlay">
            <div class="form-container">
                <span class="close-btn" onclick="closeContactOverlay()">&times;</span>
                <h2>Kontaktformular</h2>
                <form action="php/kontakt.php" method="post">
                    <div class="form-contact-div">
                        <div class="input-group">
                            <label class="form-label" for="contact-input-1">Name</label>
                            <input required id="contact-input-1" type="text" name="name" autocomplete="off" class="form-input">
                        </div>
                        <div class="input-group">
                            <label class="form-label" for="contact-input-2">Email</label>
                            <input required id="contact-input-2" type="email" name="email" autocomplete="off" class="form-input">
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

        <?php load_all("elements.xml"); ?>
    </main>
    <footer>
        <p>
            Impressum:
            <br>
            Anschrift: Jonas Dieroff, Elyesa Duru, Chiara [Nachname]
            <br>
            Telefon: +49 1515 5218860
            <br>
            <a href="#" onclick="openContactOverlay()">
                E-Mail: jon.dieroff.23@lehre.mosbach.dhbw.de
            </a>
        </p>
        <p>Alle Rechte vorbehalten. Der Code dieser Website ist Eigentum von Jonas Dieroff, Elyesa Duru und Chiara Kisco. Die Verwendung, Vervielfältigung oder Modifikation des Codes ohne ausdrückliche Genehmigung ist untersagt. Verstöße werden rechtlich verfolgt.</p>
    </footer>

    <?php
    function load_all($source)
    {
        $xml = simplexml_load_file($source);
        $idx = 0;
        foreach ($xml->element as $element) {
            create_card($idx, $element->title, $element->desc, $element->thumbnail, $element->code);
            $idx++;
        }
    }

    function create_card($index, $title, $desc, $thumbnail, $example_code)
    {
        $thumb_code = html_entity_decode($thumbnail);
        echo <<< STR
            <div class="card">
            <div class="content">
                <div class="content-heading">
                    <h2 id='c-t$index'>Beschreibung</h2>
                </div>
                <div class="content-content" id="c-c$index">
                    <p>
                        $desc
                    </p>
                </div>
                <div class="card-nav">
                    <label class="nav-button-left" for="switch-info$index">
                        <!-- base-svg from iconbuddy.app -->
                        <svg class="nav-arr-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5.98 10.761C8.608 5.587 9.92 3 12 3c2.08 0 3.393 2.587 6.02 7.761l.327.645c2.182 4.3 3.274 6.45 2.287 8.022C19.648 21 17.208 21 12.327 21h-.654c-4.88 0-7.321 0-8.307-1.572c-.987-1.572.105-3.722 2.287-8.022l.328-.645Z" />
                        </svg>
                    </label>
                    <div class="toggle-container">
                        <input type="checkbox" class="toggle-input" id="switch-info$index">
                        <!-- partly from https://uiverse.io/njesenberger/friendly-otter-40 -->
                        <!-- thought it would be ok to copy this as we will come back to this element later -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 292 142" class="toggle">
                            <path d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z" class="toggle-background"></path>
                            <circle cx="70" cy="70" r="26" fill="none" stroke="white" stroke-width="12" class="toggle-icon on" />
                            <circle cx="220" cy="70" r="26" fill="none" stroke="white" stroke-width="12" class="toggle-icon off" />
                            <g>
                                <rect fill="#fff" rx="29" height="58" width="116" y="42" x="13" class="toggle-circle-center"></rect>
                                <rect fill="#fff" rx="58" height="114" width="114" y="14" x="14" class="toggle-circle left"></rect>
                                <rect fill="#fff" rx="58" height="114" width="114" y="14" x="164" class="toggle-circle right"></rect>
                            </g>
                        </svg>
                    </div>
                    <label class="nav-button-right" for="switch-info$index">
                            <!-- base-svg from iconbuddy.app -->
                            <svg class="nav-arr-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5.98 10.761C8.608 5.587 9.92 3 12 3c2.08 0 3.393 2.587 6.02 7.761l.327.645c2.182 4.3 3.274 6.45 2.287 8.022C19.648 21 17.208 21 12.327 21h-.654c-4.88 0-7.321 0-8.307-1.572c-.987-1.572.105-3.722 2.287-8.022l.328-.645Z" />
                            </svg>
                    </label>
                </div>
            </div>
            <div class="thumbnail">
                $thumb_code
            </div>
            <div class="bottom">
                <h1>$title</h1>
            </div>
            </div>
            <script>
            document.getElementById('switch-info$index').addEventListener('change', function() {
                if (this.checked) {
                    create_code_part($index, `$example_code`);
                    document.getElementById('c-t$index').innerText = "Beispielcode";
                } else {
                    create_desc_part($index, `$desc`);
                    document.getElementById('c-t$index').innerText = "Beschreibung";
                }
            });
            </script>
            STR;
    }
    ?>
    <script>
        function create_code_part(index, text) {
            let parent = document.getElementById("c-c" + String(index));
            while (parent.firstChild) parent.removeChild(parent.firstChild);
            code_div = document.createElement('div');
            code_div.className = 'code-box';
            code_p = document.createElement('code');
            code_p.appendChild(document.createTextNode(text));
            code_div.appendChild(code_p);
            parent.appendChild(code_div);
        }

        function create_desc_part(index, text) {
            let parent = document.getElementById("c-c" + String(index));
            while (parent.firstChild) parent.removeChild(parent.firstChild);
            p = document.createElement('p');
            p.appendChild(document.createTextNode(text));
            parent.appendChild(p);
        }

        function openContactOverlay() {
            document.getElementById("contactOverlay").style.display = "flex";
        }

        function closeContactOverlay() {
            document.getElementById("contactOverlay").style.display = "none";
        }
    </script>
</body>

</html>