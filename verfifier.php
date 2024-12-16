<?php

$mdp = $_POST['password'];
function verifier($mdp){
    $erreur = 0;
    $msge = "";
    $etaille = "La longueur du mot de passe est inférieur à 14 caractères. ";
    $ecar = "\n•Il n'y a pas de minuscule. ";
    $emaj = "\n•Il n'y a pas de majuscule. ";
    $echi = "\n•Il n'y a pas de chiffre. ";
    $espe = "\n•Il n'y a pas de caractère spéciaux. ";
    $car = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
    $maj = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
    $chi = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    $spe = ["!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "=", "+", "[", "]", "{", "}", ";", ":", "'", "\"", ",", ".", "<", ">", "/", "?", "\\", "|", "~", "`"];

    if ($mdp){
        $ncar = $nmaj = $nchi = $nspe = 0;
        if (strlen($mdp) < 14){
            $erreur ++;
            $msge .= $etaille;
        }
        for ($i = 0; $i < strlen($mdp); $i++){
            for ($j = 0; $j < count($car); $j++){
                if ($mdp[$i] == $car[$j]){
                    $ncar ++;
                    break;
                }
            }
            for ($j = 0; $j < count($maj); $j++){
                if ($mdp[$i] == $maj[$j]){
                    $nmaj ++;
                    break;
                }
            }
            for ($j = 0; $j < count($chi); $j++){
                if ($mdp[$i] == $chi[$j]){
                    $nchi ++;
                    break;
                }
            }
            for ($j = 0; $j < count($maj); $j++){
                if ($mdp[$i] == $spe[$j]){
                    $nspe ++;
                    break;
                }
            }
        }
        if ($ncar == 0){
            $erreur ++;
            $msge .=$ecar;
        }
        if ($nmaj == 0){
            $erreur ++;
            $msge .=$emaj;
        }
        if ($nchi == 0){
            $erreur ++;
            $msge .=$echi;
        }
        if ($nspe == 0){
            $erreur ++;
            $msge .=$espe;
        }
    }
    if ($erreur > 0) {
        $msge = "Il y a {$erreur} erreur(s) dans votre mot de passe. " . $msge;
    } else {
        $msge = "Le mot de passe est valide.";
    }
    return $msge;
}
echo "resultat : " . verifier($mdp);
?><html>
<a href="index.html">Generer</a>
<a href="verifier.html">Verifier</a>
</html><?php
?>