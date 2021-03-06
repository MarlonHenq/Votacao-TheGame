<?php

$deck1Size = 61;
$deck2Size = 18;

$decks = $_GET['decks'];
$cards = $_GET["cards"];

if ($cards == 0) {
    $cards = array();
}

if ($decks == 1){
    if (count($cards) == $deck1Size){
        $frase = "Você jogou todas as cartas do modo, Obrigado!";
    }
    else{
        do{
            $rand = rand(0, $deck1Size-1);
        }while (in_array($rand, $cards));

        $id = $rand;
        $deck1 = file("decks/1.deck");
        $frase = $deck1[$id];
    }
}
else if ($decks == 2){
    if (count($cards) == $deck2Size){
        $frase = "Você jogou todas as cartas do modo, Obrigado!";
    }
    else{
        do{
            $rand = rand(0, $deck2Size-1);
        }while (in_array($rand, $cards));

        $id = $rand;
        $deck2 = file("decks/2.deck");
        $frase = $deck2[$id];
    }
}
else{
    $decksSize = $deck1Size + $deck2Size-1;

    if (count($cards) == $decksSize){
        $frase = "Você jogou todas as cartas do modo, Obrigado!";
    }
    else{
        do{
            $rand = rand(0, $decksSize-1);
        }while (in_array($rand, $cards));

        $id = $rand;
        if ($id < $deck1Size){
            $deck1 = file("decks/1.deck");
            $frase = $deck1[$id];
        }
        else{
            $deck2 = file("decks/2.deck");
            $frase = $deck2[$id - $deck1Size];
        }
    }
}

//Generate URI for next card

$uri = "decks=$decks";
foreach ($cards as $card){
    $uri .= "&cards[]=$card";
}
$uri .= "&cards[]=$id";

require_once "gameVisual.php";