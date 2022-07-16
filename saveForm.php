<?php

$frase = $_POST['frase'];

if ($frase == "") {
    header('Location: index.html');
} else {
    $frase = $frase. "\n";

    $file = fopen("decks/suggestion.deck", "a");
    fwrite($file, $frase);
    fclose($file);
    
    require_once "saveForm.html";
}