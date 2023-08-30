<?php
    unlink("img/".$_GET["id"]);
    unlink("img/".$_GET["id"].".ini");
    Header("Location: index.php ");
?>