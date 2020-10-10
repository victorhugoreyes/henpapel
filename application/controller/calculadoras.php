<?php

    // id_modelo = 1
function almejaCalc($base, $alto, $profundidad, $grosor_cajon, $grosor_cartera) {

        $calculadora = array();
                
        $b = $base;
        $h = $alto;
        $p = $profundidad;
        $g = $grosor_cajon;
        $G = $grosor_cartera;

        $e = $g / 20;
        $E = $G / 20;

        // Diseño
        $b1  = $b + (2 * $e);
        $h1  = $h + (2 * $e);
        $p1  = $p + $e;
        $x   = $b1 + (2 * $p1);
        $y   = $h1 + (2 * $p1);
        $x1  = $x + 1.2;
        $y1  = $y + 1.2;
        $x11 = $x + 1;
        $y11 = $y + 1;

        //forro
        $b11 = $x + 2 * ($e + 1.4);
        $h11 = $y + 2 * ($e + 1.4);
        $f   = $b11 + 1.5;
        $k   = $h11 + 1.5;
        //$a11=$a1+$h1+3;
        //$h111=

        //cartera
        $B   = $b1 + 0.2;
        $H   = $h1 + 0.1 + (2 * $e);
        $P   = $p1 + 0.25;
        $Y   = $H + (2 * $P);
        $B1  = $B + 2 * ($E + 1.4);
        $Y1  = $Y + 2 *($E + 1.4);
        $B11 = $B-1;
        $Y11 = $H + ($P - 0.5) + 2.5;

        $calculadora["base"]           = $base;
        $calculadora["alto"]           = $alto;
        $calculadora["profundidad"]    = $profundidad;
        $calculadora["grosor_cajon"]   = $grosor_cajon;
        $calculadora["grosor_cartera"] = $grosor_cartera;
        
        $calculadora["e"] = $e;
        $calculadora["E"] = $E;

        // diseño
        $calculadora["b1"]  = $b1;
        $calculadora["h1"]  = $h1;
        $calculadora["p1"]  = $p1;
        $calculadora["x"]   = $x;
        $calculadora["y"]   = $y;
        $calculadora["x1"]  = $x1;
        $calculadora["y1"]  = $y1;
        $calculadora["x11"] = $x11;
        $calculadora["y11"] = $y11;

        // forro
        $calculadora["b11"] = $b11;
        $calculadora["h11"] = $h11;
        $calculadora["f"]   = $f;
        $calculadora["k"]   = $k;

        // cartera
        $calculadora["B"]   = $B;
        $calculadora["H"]   = $H;
        $calculadora["P"]   = $P;
        $calculadora["Y"]   = $Y;
        $calculadora["B1"]  = $B1;
        $calculadora["Y1"]  = $Y1;
        $calculadora["B11"] = $B11;
        $calculadora["Y11"] = $Y11;

        return $calculadora;
    }


// id_modelo = 2
function circular($diametro, $profundidad, $altura_tapa, $grosor_carton) {
      
    $calculadora = array();

    $d = $diametro;
    $p = $profundidad;
    $P = $altura_tapa;
    $g = $grosor_carton;


    $e = $g / 20;

    /* Base */
    $z     = $d + 1.6;
    $z_1   = $d + 1.4;
    $d_1   = $d + ($e * 2);
    $p_1   = $e + $p;
    $c     = $d_1 * (pi());
    $d_1_1 = (2 * 0.4) + $d_1;
    $r     = $d + 1.4;
    $p_1_1 = $p_1 + $e + (2 * 0.4);
    $c_1   = $c + 1;
    $i     = $p - 0.1;
    $c_1_1 = $c + 0.5;


    /* Tapa */
    $D     = $d_1 + 0.4;
    $Z     = $D + 1.6;
    $Z_1   = $D + 1.4;
    $D_1   = ($e * 2) + $D;
    $C     = $D_1 * (pi());
    $D_1_1 = $D_1 + (2 * 0.4);
    $R     = $D_1_1 + 1.5;
    $P_1   = $P + $e + 0.4;
    $P_1_1 = $P - $e -0.1;
    $C_1   = $C + 1;
    $C_1_1 = $C + 0.5;

    $calculadora["odt"] = $odt;
    $calculadora["d"]   = $d;
    $calculadora["p"]   = $p;
    $calculadora["P"]   = $P;
    $calculadora["g"]   = $g;

    $calculadora["e"] = $e;

    // base
    $calculadora["z"] = $z;
    $calculadora["z_1"] = $z_1;
    $calculadora["d_1"] = $d_1;
    $calculadora["p_1"] = $p_1;
    $calculadora["c"] = $c;
    $calculadora["d_1_1"] = $d_1_1;
    $calculadora["r"] = $r;
    $calculadora["p_1_1"] = $p_1_1;
    $calculadora["c_1"] = $c_1;
    $calculadora["i"] = $i;
    $calculadora["c_1_1"] = $c_1_1;

    // tapa
    $calculadora["D"] = $D;
    $calculadora["Z"] = $Z;
    $calculadora["Z_1"] = $Z;
    $calculadora["D_1"] = $D_1;
    $calculadora["C"] = $C;
    $calculadora["D_1_1"] = $D_1_1;
    $calculadora["R"] = $R;
    $calculadora["P_1"] = $P_1;
    $calculadora["P_1_1"] = $P_1_1;
    $calculadora["C_1"] = $C_1;
    $calculadora["C_1_1"] = $C_1_1;
    
    return $calculadora;
}


// id_modelo = 3
function libro() {


}


// id_modelo = 4
function regalo() {


}


// id_modelo = 5
function marco() {


}


// id_modelo = 6
function cerillera() {


}


// id_modelo =7
function vino() {


}


?>
