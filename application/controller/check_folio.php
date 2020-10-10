<?php

$regExp  = "/^[A-Z][\d]{4}[A-Z]*[\d]*$/";
$regExp1 = "/^[6][\d]{4}[A-Z]*[\d]*$/";
$regExp2 = "/^[D]{1}[\d]{3}[A-Z]*[\d]*$/";

// valida las letras asignadas a las tiendas
function check_letra() {

    $ok = false;

    $c = "";

    $c = $_POST['odt'];
    $c = strtoupper($c);
    $c = substr($c, 0, 1);

    switch($c) {

        case "B":

            $ok = true;
            break;
        case "D":

            $ok = true;
            break;
        case "E":

            $ok = true;
            break;
        case "F":

            $ok = true;
            break;
        case "G":

            $ok = true;
            break;
        case "H":

            $ok = true;
            break;
        case "I":

            $ok = true;
            break;
        case "J":

            $ok = true;
            break;
        case "K":

            $ok = true;
            break;
        case "L":

            $ok = true;
            break;
        case "M":

            $ok = true;
            break;
    }

    return $ok;
}

// checa la validez del folio de la ODT
function checkRegExp($odt) {

    $odt = strtoupper($odt);

    $Ok_return = true;

    $regExp  = "/^[A-Z][\d]{4}[A-Z]*[\d]*$/";
    $regExp1 = "/^[6][\d]{4}[A-Z]*[\d]*$/";

    if (strlen($odt) < 5) {

        $Ok_return = false;

        return $Ok_return;
    }

    $letra = substr($odt, 0, 1);

    if ( check_letra($letra) ) {

        if ( !preg_match($regExp, $odt) ) {

            $Ok_return = false;
        }
    } elseif ( preg_match($regExp1, $odt) ) {

        if ($d1 != "6") {

            return $Ok_return = false;
        }
    } else {

        $Ok_return = false;
    }

    return $Ok_return;
}



?>
