<?php
$empfaenger = "hendrikschaefer82@googlemail.com";
$betreff = "Eine neue Mail";
$from = "From: Hendrik Schäfer <hendrik_schaefer@gmx.net>";
$from .= "Content-Type: text/html\r\n";
$text = $_POST['vorname'] . "<b>" . $_POST['alter'];

mail($empfaenger, $betreff, $text, $from);
?>
