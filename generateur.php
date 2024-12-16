<?php
// 1- 14 caractères
// 2- 1 Maj
// 3- 1 Min
// 4- 1 Chiffre

$taille = $_POST['password'];

function generer($taille){
    $car = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
    $maj = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
    $chi = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    $spe = ["!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "=", "+", "[", "]", "{", "}", ";", ":", "'", "\"", ",", ".", "<", ">", "/", "?", "\\", "|", "~", "`"];


    $nb_car = $nb_maj = $nb_chi = $nb_spe = $rand = 0;
    $mdp= "";
    if ($taille >= 14){
        echo "la taille du mot de passe est " . $taille;
    while(strlen($mdp) < $taille){
        $rand = rand(1, 4);
        switch ($rand){
            case 1 :
                if ($nb_car < 1 || ($nb_maj > 0 && $nb_chi > 0 && $nb_spe > 0)){
                    $rand = rand(0,25);
                    $mdp = $mdp.$car[$rand];
                    $nb_car = $nb_car + 1;
                }
                break;

            case 2 :
                if ($nb_maj < 1 || ($nb_car > 0 && $nb_chi > 0 && $nb_spe > 0)){
                    $rand = rand(0,25);
                    $mdp = $mdp.$maj[$rand];
                    $nb_maj = $nb_maj + 1;
                }
                break;
            case 3 :
                if ($nb_chi < 1 || ($nb_car > 0 && $nb_maj > 0 && $nb_spe > 0)){
                    $rand = rand(0,9);
                    $mdp = $mdp.$chi[$rand];
                    $nb_chi = $nb_chi + 1;
                }
                break;
            case 4 :
                if ($nb_spe < 1 || ($nb_car > 0 && $nb_maj > 0 && $nb_chi > 0)){
                    $rand = rand(0,31);
                    $mdp = $mdp.$spe[$rand];
                    $nb_spe = $nb_spe + 1;
                }
                break;
        }
    }
    return "Le mot de passe est : " . $mdp;
    }
    else {
        return "Le mot de passe doit faire au moins 14 caractères";
    }
}
echo "\n" . generer($taille);
?><html>
<a href="index.html">Generer</a>
<a href="verifier.html">Verifier</a>
</html><?php
?>



