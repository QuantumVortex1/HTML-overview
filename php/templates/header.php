<?php 
    if (str_ends_with($_SERVER['PHP_SELF'], "index.php")) $path_to_index = "#";
    else $path_to_index = "../index.php";
?>
    <a href=<?php echo $path_to_index; ?> title="home">
    <img src="assets/images/logo.png" alt="Logo" onerror="this.src='../assets/images/logo.png';">
    <h1>HTML Übersicht</h1>
</a>
<div id="forms-and-links-div" class="header-sub-div">
    <input id="search-input" type="text" name="search-input" autocomplete="off" class="form-input" placeholder="Finde dein Element" onkeyup="update_cards(this.value)">
    <a href="https://github.com/QuantumVortex1/HTML-overview" target="_blank" class="a-nonsense">
        <img src="assets/images/github-mark-white.svg" onerror="this.src='../assets/images/github-mark-white.svg';" alt="Github">
    </a>
    <a href="#" class="a-nonsense" onclick="openLoginOverlay()">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 20 20">
            <path fill="white" d="M9.76 0C15.417 0 20 4.477 20 10S15.416 20 9.76 20c-3.191 0-6.142-1.437-8.07-3.846a.644.644 0 0 1 .115-.918a.68.68 0 0 1 .94.113a8.96 8.96 0 0 0 7.016 3.343c4.915 0 8.9-3.892 8.9-8.692c0-4.8-3.985-8.692-8.9-8.692a8.961 8.961 0 0 0-6.944 3.255a.68.68 0 0 1-.942.101a.644.644 0 0 1-.103-.92C3.703 1.394 6.615 0 9.761 0Zm.545 6.862l2.707 2.707c.262.262.267.68.011.936L10.38 13.15a.662.662 0 0 1-.937-.011a.662.662 0 0 1-.01-.937l1.547-1.548l-10.31.001A.662.662 0 0 1 0 10c0-.361.3-.654.67-.654h10.268L9.38 7.787a.662.662 0 0 1-.01-.937a.662.662 0 0 1 .935.011Z" />
        </svg>
    </a>
</div>