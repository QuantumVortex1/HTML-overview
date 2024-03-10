<?php 
    if (str_ends_with($_SERVER['PHP_SELF'], "index.php")) $path_to_data = "php/datenschutz.php";
    else $path_to_data = "../php/datenschutz.php";
?>
<div>
  <?php include __dir__.'/../impressum.php'; ?>
  <p><a href=<?php echo $path_to_data; ?>>Datenschutz</a></p>
</div>