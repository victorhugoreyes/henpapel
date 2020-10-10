<?php


class Calculadora extends Controller {
    
    public function index() {
        
    	echo "Uh? Algo no funciona...";

    }


    // id_modelo = 1
    public function almeja() {

        session_start();

        $login = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');

        if($login->isLoged()){

            if (!empty($_SESSION['calculo'])) {

                $odt = (isset($_SESSION['calculo']['odt']))? $_SESSION['calculo']['odt']: '--';
                
                $b = $_SESSION['calculo']['base'];
                $h = $_SESSION['calculo']['alto'];
                $p = $_SESSION['calculo']['profundidad'];
                $g = $_SESSION['calculo']['grosor-cajon'];
                $G = $_SESSION['calculo']['grosor-cartera'];

                /* 
                $ancho_pliego = $_SESSION['calculo']['ancho_pliego'];
                $largo_pliego = $_SESSION['calculo']['largo_pliego'];
                */ 

                $e = $g / 20;
                $E = $G / 20;

                /* Diseño */
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


                require 'application/views/templates/head.php';
                require 'application/views/templates/top_menu.php';
                require 'application/views/calculadora/almeja3.php';
                require 'application/views/templates/footer.php';
            } else {

                header("Location:" . URL . 'cajas/');
            }
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    // id_modelo = 2
    public function circular() {

        session_start();
        $login = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');

        if($login->isLoged()) {

            if (!empty($_SESSION['calculo'])) {
      
                $odt = (isset($_SESSION['calculo']['odt']))? $_SESSION['calculo']['odt']: '--';
      
                $d = $_SESSION['calculo']['diametro'];     
                $p = $_SESSION['calculo']['profundidad'];
                $P = $_SESSION['calculo']['altura-tapa'];
                $g = $_SESSION['calculo']['grosor-carton'];
                
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

                require 'application/views/templates/head.php';
                require 'application/views/templates/top_menu.php';
                require 'application/views/calculadora/circular3.php';
                require 'application/views/templates/footer.php';
            } else {

                header("Location:" . URL . 'cajas/');
            }
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    // id_modelo = 3
    public function libro() {
        
        session_start();
        
        $login = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');

        if($login->isLoged()){

            if (!empty($_SESSION['calculo'])) {
        
                $odt = (isset($_SESSION['calculo']['odt']))? $_SESSION['calculo']['odt']: '--';
                
                $b = $_SESSION['calculo']['base'];
                $h = $_SESSION['calculo']['alto'];
                $p = $_SESSION['calculo']['profundidad'];
                $g = $_SESSION['calculo']['grosor-carton'];
                $G = $_SESSION['calculo']['grosor-cartera'];


                $e = $g / 20;
                $E = $G / 20;


                $b1  = $b + (2 * $e);
                $h1  = $h + (2 * $e);
                $p1  = $p + $e;
                $x   = (2 * $p1) + $b1;
                $y   = (2 * $p1) + $h1;
                $x1  = $x + 1.2;
                $y1  = $y + 1.2;
                $x11 = $x + 1;
                $y11 = $y + 1;
                $b11 = $x + 2 * ($e + 1.4);
                $h11 = $y + 2 * ($e + 1.4);
                $f   = $b11 + 1.5;
                $k   = $h11 + 1.5;
                $p11 = $p1 + ($e + 1.4) + 1.5;
                $l   = $b1 + $h1 + (2 * 1.5);
                $l1  = $b1 + $h1;
                $l11 = $l + 1.5;
                $r   = (2 * $p11) + 1.5;

                //cartera
                //$E=0;
                $B   = $b1 + 1;
                $H   = $h1 + 0.5 + $e;
                $P   = $p1 + (2 * $E) + 0.1;
                $Y   = (2 * $H) +$P;
                $B1  = $B + 2 *($E + 1.4);
                $Y1  = $Y + 2 * ($E + 1.4);
                $B11 = $B - 1;
                $Y11 = $H + $P + 2.5;

                require 'application/views/templates/head.php';
                require 'application/views/templates/top_menu.php';
                require 'application/views/calculadora/libro3.php';
                require 'application/views/templates/footer.php';
            } else {

                header("Location:" . URL . 'cajas/');
            }
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    // id_modelo = 4
    public function regalo() {
        
        session_start();
        
        $login = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');

        if($login->isLoged()) {

            if (!empty($_SESSION['calculo'])) {
      
                $odt = (isset($_SESSION['calculo']['odt']))? $_SESSION['calculo']['odt']: '--';
                
                $g = $_SESSION['calculo']['grosor-cajon'];
                $G = $_SESSION['calculo']['grosor-tapa'];
                $b = $_SESSION['calculo']['base'];
                $h = $_SESSION['calculo']['alto'];
                $p = $_SESSION['calculo']['profundidad-cajon'];
                $T = $_SESSION['calculo']['profundidad-tapa'];

                $e = $g / 20;
                $E = $G / 20;

                $b1  = $b + (2 * $e);
                $h1  = $h + (2 * $e);
                $p1  = $p + $e;
                $x   = (2 * $p1) + $b1;
                $y   = (2 * $p1) + $h1;
                $x1  = $x + 1.2;
                $y1  = $y + 1.2;
                $x11 = $x + 1;
                $y11 = $y + 1;
                $b11 = $x + 2 * ($e + 1.4);
                $h11 = $y + 2 * ($e + 1.4);
                $f   = $b11 + 1.5;
                $k   = $h11 + 1.5;

                //tapa
                $B   = $b1 + (2 * 0.15);
                $H   = $h1 + (2 * 0.15);
                $B1  = $B + (2 * $E);
                $H1  = $H + (2 * $E);
                $T;
                $X   = (2 * $T) + $B1;
                $Y   = (2 * $T) + $H1;
                $X1  = $X + 1.2;
                $Y1  = $Y + 1.2;
                $X11 = $X + 1;
                $Y11 = $X + 1;
                $B11 = $X + 2 * ($E + 1.4);
                $H11 = $Y + 2 * ($E + 1.4);
                $F   = $B11 + 1.5;
                $K   = $H11 + 1.5;

                require 'application/views/templates/head.php';
                require 'application/views/templates/top_menu.php';
                require 'application/views/calculadora/regalo3.php';
                require 'application/views/templates/footer.php';
            } else {

                header("Location:" . URL . 'cajas/');
            }
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    // id_modelo = 5 
    public function marco() {
        
        session_start();
        
        $login = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');

        if($login->isLoged()) {

            if (!empty($_SESSION['calculo'])) {
      
                $odt = (isset($_SESSION['calculo']['odt']))? $_SESSION['calculo']['odt']: '--';
                
                $b = $_SESSION['calculo']['base'];
                $h = $_SESSION['calculo']['alto'];
                $p = $_SESSION['calculo']['profundidad-cajon'];
                $g = $_SESSION['calculo']['grosor-carton'];
                
                //$G = $_SESSION['calculo']['grosor-tapa'];
                //se usa mismo espesor, si se cambia coloca aqui
                
                $G = $g;  

                $e = $g / 20;
                $E = $G / 20;

                // Fórmulas Marco Interno
                $q   = ($p / 2) + 1.5;
                $m   = $b + (2 * $e);
                $n   = $h + (2 * $e);
                $l   = $m + $n + 1.2;
                $l1  = $m + $n;
                $q1  = (2 * $q) + 2;
                $q11 = $q1 + 2 * ($e + 2);


                // Fórmula Cajón
                $m1  = $m + 0.1;
                $n1  = $n + 0.1;
                $m11 = $m1 + (2 * $e);
                $n11 = $n1 + (2 * $e);
                $p1  = $e + ($p / 2);
                $x   = $m11 + (2 * $p1);
                $y   = $n11 + (2 * $p1);
                $x1  = $x + 1.2;
                $y1  = $y + 1.2;
                $x11 = $x + 1;
                $y11 = $y + 1;
                $f   = $x + 2 * ($e + 1.4);
                $j   = $y + 2 * ($e + 1.4);
                $f1  = $m1 + 1.5;
                $j1  = $n1 + 1.5;


                // Fórmulas Tapa
                $B   = $m1;
                $H   = $n1;
                $T   = $p1;
                $X   = $x;
                $Y   = $y;
                $X1  = $X + 1.2;
                $Y1  = $Y + 1.2;
                $X11 = $X + 1;
                $Y11 = $X + 1;
                $B1  = $X + 2 * ($E + 1.4);
                $H1  = $Y + 2 * ($E + 1.4);
                $B11 = $B1 + 1.5;
                $H11 = $H1 + 1.5;

                require 'application/views/templates/head.php';
                require 'application/views/templates/top_menu.php';
                require 'application/views/calculadora/marco3.php';
                require 'application/views/templates/footer.php';
            } else {

                header("Location:" . URL . 'cajas/');
            }
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    // id_modelo = 6 
    public function cerillera() {
        
        session_start();
        
        $login = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');

        if($login->isLoged()) {

            if (!empty($_SESSION['calculo'])) {
      
                $odt = (isset($_SESSION['calculo']['odt']))? $_SESSION['calculo']['odt']: '--';
                
                $b = $_SESSION['calculo']['base'];
                $h = $_SESSION['calculo']['alto'];
                $p = $_SESSION['calculo']['profundidad-cajon'];
                $T = $_SESSION['calculo']['profundidad-tapa'];
                $g = $_SESSION['calculo']['grosor-cajon'];
                $G = $_SESSION['calculo']['grosor-tapa'];
                
                $e = $g/20;
                $E = $G/20;

                // Fórmulas Cajón
                $b1  = $b + (2 * $e);
                $h1  = $h + (2 * $e);
                $p1  = $p + $e;
                $x   = (2 * $p1) + $b1;
                $y   = (2 * $p1) + $h1;
                $x1  = $x + 1.2;
                $y1  = $y + 1.2;
                $x11 = $x + 1;
                $y11 = $y + 1;
                $b11 = $x + 2 * ($e + 1.4);
                $h11 = $y + 2 * ($e + 1.4);
                $f   = $b11 + 1.5;
                $k   = $h11 + 1.5;


                // Fórmulas Tapa Deslizable
                $B   = $b1 + (2 * 0.15);
                $H   = $h1 + 0.15;
                $P   = $p1 + (2 * 0.15);
                $B1  = $B + (2 * $E);
                $P1  = $P + (2 * $E);
                $L   = (2 * $B1) + (2 * $P1);
                $L1  = $L + 1.2;
                $H1  = $H + 1.2;
                $L11 = $L + 1;
                $H11 = $H + 1;
                $X   = $L + 1.5;
                $Y   = $H + 2 * ($E + 1.4);
                $X1  = $X + 1.5;
                $Y1  = $Y + 1.5;


                require 'application/views/templates/head.php';
                require 'application/views/templates/top_menu.php';
                require 'application/views/calculadora/cerillera3.php';
                require 'application/views/templates/footer.php';
            } else {

                header("Location:" . URL . 'cajas/');
            }
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    // id_modelo = 7 
    public function vino() {
        
        session_start();
        
        $login = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');

        if($login->isLoged()) {

            if (!empty($_SESSION['calculo'])) {
      
                $odt = (isset($_SESSION['calculo']['odt']))? $_SESSION['calculo']['odt']: '--';
                
                $b = $_SESSION['calculo']['base'];
                $h = $_SESSION['calculo']['alto'];
                $p = $_SESSION['calculo']['profundidad-cajon'];
                $g = $_SESSION['calculo']['grosor-cajon'];

                $e = $g/20;

                // Fórmulas Cajón
                $b1  = $b + (2 * $e);
                $h1  = $h + (2 * $e);
                $p1  = $p + $e;
                $b11 = $b1 + 1.2;
                $h11 = $h1 + 1.2;
                $m   = $b1 + 1;
                $n   = $h1 + 1;
                $l   = (2 * $b1) + (2 * $h1);
                $l1  = $l + 1.2;
                $p11 = $p1 + 1.2;
                $l11 = $l + 1;
                $k   = $p1 + 1;
                
                // Fórmulas Forro Cajón
                $f   = $l + 1.5;
                $k1  = 1.4 + $e + $p1 + 1.5;
                $f1  = $f + 1.5;
                $k11 = $k1 + 1.5;

                // Fórmula Tapa
                $B   = $b1 + 0.15;
                $H   = $h1 + 0.15;

                // Fórmulas Forro Tapa
                $B11 = $b + 2 * ($e + 1.4);
                $H11 = $h + 2 * ($e + 1.4);
                $X   = $b - 0.1;
                $Y   = $h - 0.1;

                require 'application/views/templates/head.php';
                require 'application/views/templates/top_menu.php';
                require 'application/views/calculadora/vino3.php';
                require 'application/views/templates/footer.php';
            } else {

                header("Location:" . URL . 'cajas/');
            }
        } else {

            header("Location:" . URL . 'login/');
        }
    }

 }

