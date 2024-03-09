<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>HTML elements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="thumbnails.css">
    <link rel="icon" href="favicons/f4.jpg">
    <script src="script.js"></script>
</head>

<body>
    <header>
        <?php include __DIR__ . '/php/templates/header.php'; ?>

    </header>
    <main id="index-main" name="index-main">

        <?php include __DIR__ . '/php/templates/overlay.php'; ?>
        <?php load_all(""); ?>
    </main>

    <footer>
        <?php include __DIR__ . '/php/templates/footer.php'; ?>
    </footer>


    <?php
    function load_all($filter_str)
    {
        require_once __DIR__ . '/php/loader.php';
        if ($filter_str == "") {
            $xml = get_all_elements();
            $idx = 0;
            foreach ($xml->element as $element) {
                create_card($idx, $element->title, $element->desc, $element->thumbnail, $element->code);
                $idx++;
            }
        } else {
            $resp = get_elements($filter_str);
            $idx = 0;
            echo $resp[2];
            echo "<br>";
            foreach ($resp[0] as $element) echo $element;
            foreach ($resp[1] as $element) echo $element;
            // foreach ($resp[0]->element as $element) {
            // create_card($idx, $element->title, $element->desc, $element->thumbnail, $element->code);
            // $idx++;
            // }
            // $idx = 0;
            // foreach ($resp[1]->element as $element) {
            // create_card($idx, $element->title, $element->desc, $element->thumbnail, $element->code);
            // $idx++;
            // }
        }
    }

    function create_card($index, $title, $desc, $thumbnail, $example_code)
    {
        $thumb_code = html_entity_decode($thumbnail);
        echo <<<STR
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
        function update_cards(search_val) {
            var main = document.getElementById("index-main");
            console.log(main);
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "index.php?wert=" + search_val, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    for (var i = 2; i < main.childNodes.length; i++) main.removeChild(main.childNodes[i]);
                    // main.innerHTML += "< ?php echo load_all($_POST['search-input']); ?>"
                    main.innerHTML = "<?php echo load_all($_POST['search-input']); ?>"
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>