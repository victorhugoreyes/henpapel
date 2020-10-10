<?php
if (session_status() == PHP_SESSION_NONE) {

    session_start();
} elseif (session_status == PHP_SESSION_DISABLED) {
    
    echo "Uh?... Las sesiones estan deshabilitadas!";
    
    exit();
}

class Cajas extends Controller {
    
    public function index() {

        $login       = $this->loadController('login');
        $login_model = $this->loadModel('LoginModel');

        $options_model = $this->loadModel('OptionsModel');
        $models        = $options_model->getBoxModels();

        if($login->isLoged()) {
    
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cajas/index.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }

    
    public function guardados() {
        
        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');
        
        $rows = $options_model->getSavedCalcs();

        if( $login->isLoged() ) {

            unset($_SESSION['calculo']);

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cajas/guardados.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function getForm() {

        $options_model = $this->loadModel('OptionsModel');

        $model = $_POST['model'];

        $html = '';
        $i = 1;

        $options = $options_model->getOptionsByModel($model);

        foreach ($options as $option) {
    
            $even  = ($i & 1)? 'even':'';
            $html .= '<div class="cajas-input-group '.$even.'">';
            $html .= '<div class="cajas-col-input left"><span>'.$option['nombre'].': </span></div>';

            $html .= '<div class="cajas-col-input right">';

            $values = $options_model->getValuesByOption($option['id_variante']);

            switch ($option['tipo_opcion']) {
        
                case 'text':
            
                    foreach ($values as $value) {
            
                        $html .= '<input type="text" step="any" required placeholder="cm" class="cajas-input" name="' . $option['name'] . '">';
                    }
          
                    break;
        
                case 'number':
        
                    foreach ($values as $value) {
          
                        $html .= '<input type="number" step="any" required placeholder="cm" class="cajas-input" name="' . $option['name'] . '">';
                    }
          
                    break;
        
                case 'radio':
        
                    foreach ($values as $value) {
          
                        $html .= '<input type="radio" id="' . $value['id_valor'] . '" required  name="' . $option['name'] . '" value="' . $value['valor'] . '" ><label for="' . $value['id_valor'] . '" >' . $value['valor'] . ' </label>';
                    }
          
                    break;
        
                case 'select':
          
                        $html .= '<select class="cajas-input" name="' . $option['name'] . '" >';
                        $html .= '<option selected disabled>Elige una opcion</option>';
        
                    foreach ($values as $value) {
          
                        $html .= '<option value="' . $value['valor'] . '">' . $value['valor'] . '</option>';
                        }
                        
                        $html.='</select>';
          
                        break;
        
                default:
                    # code...
                    break;
            }

            $html .= '</div></div>';
            
            $i++;
        }

        $html.='<input class="cajas-form-submitter" type="submit" value="CALCULAR">';

        if ($model=='1') {
       
            echo $html;
        } else {
      
            echo "<p style='font-weight:bold;'>En desarrollo</p>";
        }
    }


    public function getAllForms($model, $options_model) {
    
        $html = '';
        $i = 1;
        $options = $options_model->getOptionsByModel($model);
    
        foreach ($options as $option) {
            
            $even=($i & 1)? 'even':'';
            $html.='<div class="cajas-input-group ' . $even.'">';
            $html .= '<div class="cajas-col-input left"><span>' . $option['nombre'].': </span></div>';

            $html .= '<div class="cajas-col-input right">';

            $values = $options_model->getValuesByOption($option['id_variante']);

            switch ($option['tipo_opcion']) {
        
                case 'text':
                    
                    foreach ($values as $value) {
            
                        $html.='<input type="text" step="any" required placeholder="cm" class="cajas-input" name="'.$option['name'].'">';
                    }
          
                    break;
        
                case 'number':
        
                    foreach ($values as $value) {
                        
                        $html .= '<input type="number" step="any" required placeholder="cm" class="cajas-input" name="'.$option['name'].'">';
                    }
          
                    break;
        
                case 'radio':
        
                    foreach ($values as $value) {
                        
                        $html .= '<input type="radio" id="'.$value['id_valor'].'" required  name="'.$option['name'].'" value="'.$value['valor'].'" ><label for="'.$value['id_valor'].'" >'.$value['valor'].' </label>';
                    }
          
                    break;
                
                case 'select':
          
                    $html .= '<select class="cajas-input" name="'.$option['name'].'" >';
                    $html .= '<option selected disabled>Elige una opcion</option>';
        
                    foreach ($values as $value) {
          
                        $html .= '<option value="'.$value['valor'].'">'.$value['valor'].'</option>';
                    }
                    
                    $html .= '</select>';
                    
                    break;
        
                default:
                
                    # code...
                break;
            }

            $html .= '</div></div>';
     
            $i++;
        }

        $html .= '<input class="cajas-form-submitter" type="submit" value="CALCULAR">';

        if ($model=='1') {
       
            return $html;
        } else {
      
            return "<p style='font-weight:bold;padding:30px;'>En desarrollo</p>";
        }
    }
  
    // Obtiene los modelos de cajas
    public function admin() {

        $options_model = $this->loadModel('OptionsModel');
        $models        = $options_model->getBoxModels();

        require 'application/views/templates/head.php';
        require 'application/views/templates/top_menu.php';
        require 'application/views/cajas/admin.php';
        require 'application/views/templates/footer.php';
    }

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

    // inserta(guarda) los cálculos en el array datos y llama a saveCalc()
    public function setCalc() {
        
        $login = $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');
        
        $options_model = $this->loadModel('OptionsModel');
        
        $response = array();

        if($login->isLoged()) {
    
            $_SESSION['calculo'] = $_POST;

            $datos = array();

            $id_modelo = $_POST['modelo'];
            $id_modelo = intval($id_modelo);

            switch ($id_modelo) {
                
                case 1:

                    $datos['base']           = $_POST['base'];
                    $datos['alto']           = $_POST['alto'];
                    $datos['profundidad']    = $_POST['profundidad'];
                    $datos['grosor-cajon']   = $_POST['grosor-cajon'];
                    $datos['grosor-cartera'] = $_POST['grosor-cartera'];

                    break;
                case 2:
        
                    $datos['diametro']      = $_POST['diametro'];
                    $datos['profundidad']   = $_POST['profundidad'];
                    $datos['altura-tapa']   = $_POST['altura-tapa'];
                    $datos['grosor-carton'] = $_POST['grosor-carton'];

                    break;
                case 3:
        
                    $datos['base']           = $_POST['base'];
                    $datos['alto']           = $_POST['alto'];
                    $datos['profundidad']    = $_POST['profundidad'];
                    $datos['grosor-carton']  = $_POST['grosor-carton'];
                    $datos['grosor-cartera'] = $_POST['grosor-cartera'];

                    break;
                case 4:
        
                    $datos['base']              = $_POST['base'];
                    $datos['alto']              = $_POST['alto'];
                    $datos['profundidad-cajon'] = $_POST['profundidad-cajon'];
                    $datos['profundidad-tapa']  = $_POST['profundidad-tapa'];
                    $datos['grosor-cajon']      = $_POST['grosor-cajon'];
                    $datos['grosor-tapa']       = $_POST['grosor-tapa'];

                    break;
                case 5:

                    $datos['base']              = $_POST['base'];
                    $datos['alto']              = $_POST['alto'];
                    $datos['profundidad-cajon'] = $_POST['profundidad-cajon'];
                    $datos['grosor-carton']     = $_POST['grosor-carton'];

                    break;
                case 6:

                    $datos['base']              = $_POST['base'];
                    $datos['alto']              = $_POST['alto'];
                    $datos['profundidad-cajon'] = $_POST['profundidad-cajon'];
                    $datos['profundidad-tapa']  = $_POST['profundidad-tapa'];
                    $datos['grosor-cajon']      = $_POST['grosor-cajon'];
                    $datos['grosor-tapa']       = $_POST['grosor-tapa'];

                    break;
                case 7:

                    $datos['base']              = $_POST['base'];
                    $datos['alto']              = $_POST['alto'];
                    $datos['profundidad-cajon'] = $_POST['profundidad-cajon'];
                    $datos['grosor-cajon']      = $_POST['grosor-cajon'];

                    break;
            }

            $odt = "";
            $odt = $_POST['odt'];
            $odt = strval($odt);
            $odt = trim($odt);
            $odt = strtoupper($odt);
           
            $odt_resp = $odt;

            $Ok_RegExp = "";
            $letra     = "";

            $letra = substr($odt, 0, 1);

            $ok_letra = false;

            switch($letra) {

                case "B":

                    $ok_letra = true;
                    break;
                case "D":

                    $ok_letra = true;
                    break;
                case "E":

                    $ok_letra = true;
                    break;
                case "F":

                    $ok_letra = true;
                    break;
                case "G":

                    $ok_letra = true;
                    break;
                case "H":

                    $ok_letra = true;
                    break;
                case "I":

                    $ok_letra = true;
                    break;
                case "J":

                    $ok_letra = true;
                    break;
                case "K":

                    $ok_letra = true;
                    break;
                case "L":

                    $ok_letra = true;
                    break;
                case "M":

                    $ok_letra = true;
                    break;
            }

            $regExp  = "/^[A-Z][\d]{4}[A-Z]*[\d]*$/";
            $regExp1 = "/^[6][\d]{4}[A-Z]*[\d]*$/";
            $regExp2 = "/^[D]{1}[\d]{3}[A-Z]*[\d]*$/";

            $Ok_folio = false;

            if (strlen($odt) < 5) {

                $Ok_folio = false;
            } elseif( $letra == "E" ) {

                $es_digit_temp = substr($odt, 1, 3);

                $es_digito = is_numeric( $es_digit_temp );

                $e_sufijo = substr($odt, 4, 1);

                if ( $es_digito and $e_sufijo = "D" ) {

                    $Ok_folio = true;
                }
            } elseif ( preg_match($regExp, $odt) ) {

                $Ok_folio = true;
            } elseif ( preg_match($regExp1, $odt) ) {

                $Ok_folio = true;

                $d1 = substr($odt, 0, 1);

                if ($d1 != "6") {

                    $Ok_folio = false;
                }
            } else {

                $Ok_folio = false;
            }

            $dato_sufijo = "";

            $ok_sufijo = false;

            // desabilita la verificacion del folio
            $ok_letra = true;
            $Ok_folio = true;

/*
            if ( ($ok_letra and $Ok_folio) and (strlen($odt) > 5) ) {

                $sufijo = substr($odt, 5);

                switch($sufijo) {

                    case substr($sufijo, 0, 1) == "D":

                        $dato_sufijo = "D";

                        $ok_sufijo = true;
                        break;
                    case substr($sufijo, 0, 2) == "OT":

                        $dato_sufijo = "OT";

                        $ok_sufijo = true;
                        break;
                    case substr($sufijo, 0, 2) == "EC":

                        $dato_sufijo = "EC";

                        $ok_sufijo = true;
                        break;
                    case substr($sufijo, 0, 2) == "RT":

                        $dato_sufijo = "RT";

                        $ok_sufijo = true;
                        break;
                    case substr($sufijo, 0, 1) == "R":

                        $dato_sufijo = "R";

                        $ok_sufijo = true;
                        break;
                    case substr($sufijo, 0, 1) == "E":

                        $dato_sufijo = "E";

                        $ok_sufijo = true;
                        break;
                    case substr($sufijo, 0, 1) == "V":

                        $dato_sufijo = "V";

                        $ok_sufijo = true;
                        break;

                    default: 

                        $dato_sufijo = "";
                        $ok_sufijo = false;
                        break;
                }
            }

            $contador = 0;

            $odt_buscar = substr($odt, 0, 5);

            $contador = $options_model->checkODT($odt_buscar);
            
            $contador = intval($contador);

            if ( $contador <= 0) {

                $odt = $odt_buscar;

                $_POST['odt'] = $odt;
            } else {

                // falta agregar el resto de los sufijos (si los hay)
                $odt = $odt_buscar . $dato_sufijo . strval($contador);
            }
*/

            if ( $ok_letra and $Ok_folio ) {

                $_POST['odt'] = $odt;

                // $options_model->saveCalc($_POST['odt'], $_POST['modelo'], $datos);
                $options_model->saveCalc($odt, $_POST['modelo'], $datos);

                $response['result'] = 'correct';
            } else {

                $response['result'] = $odt;
            }
        } else {
       
            $response['result']='logout';
        }

        echo json_encode($response);
    }
  
    // guarda los cálculos en variables de sesion
    public function viewCalc() {
        
        $_SESSION['calculo'] = array();
        
        $options_model = $this->loadModel('OptionsModel');

        $cal_info = $options_model->getCalcDetails($_POST['id']);

        $id_model = $_POST['id_model'];
        $id_model = intval($id_model);

        switch ($id_model) {
            case 1:

                $_SESSION['calculo']['odt']            = $cal_info['odt'];
                $_SESSION['calculo']['base']           = $cal_info['base'];
                $_SESSION['calculo']['alto']           = $cal_info['alto'];
                $_SESSION['calculo']['profundidad']    = $cal_info['profundidad'];
                $_SESSION['calculo']['grosor-cajon']   = $cal_info['grosor-cajon'];
                $_SESSION['calculo']['grosor-cartera'] = $cal_info['grosor-cartera'];
                
                break;
            case 2:
            
                $_SESSION['calculo']['odt']           = $cal_info['odt'];
                $_SESSION['calculo']['diametro']      = $cal_info['diametro'];
                $_SESSION['calculo']['profundidad']   = $cal_info['profundidad'];
                $_SESSION['calculo']['altura-tapa']   = $cal_info['altura-tapa'];
                $_SESSION['calculo']['grosor-carton'] = $cal_info['grosor-carton'];
                
                break;
            case 3:
            
                $_SESSION['calculo']['odt']            = $cal_info['odt'];
                $_SESSION['calculo']['base']           = $cal_info['base'];
                $_SESSION['calculo']['alto']           = $cal_info['alto'];
                $_SESSION['calculo']['profundidad']    = $cal_info['profundidad'];
                $_SESSION['calculo']['grosor-carton']  = $cal_info['grosor-carton'];
                $_SESSION['calculo']['grosor-cartera'] = $cal_info['grosor-cartera'];
                
                break;
            case 4:
            
                $_SESSION['calculo']['odt']               = $cal_info['odt'];
                $_SESSION['calculo']['base']              = $cal_info['base'];
                $_SESSION['calculo']['alto']              = $cal_info['alto'];
                $_SESSION['calculo']['profundidad-cajon'] = $cal_info['profundidad-cajon'];
                $_SESSION['calculo']['profundidad-tapa']  = $cal_info['profundidad-tapa'];
                $_SESSION['calculo']['grosor-cajon']      = $cal_info['grosor-cajon'];
                $_SESSION['calculo']['grosor-tapa']       = $cal_info['grosor-tapa'];
                
                break;
            case 5:
            
                $_SESSION['calculo']['odt']               = $cal_info['odt'];
                $_SESSION['calculo']['base']              = $cal_info['base'];
                $_SESSION['calculo']['alto']              = $cal_info['alto'];
                $_SESSION['calculo']['profundidad-cajon'] = $cal_info['profundidad-cajon'];
                $_SESSION['calculo']['grosor-carton']      = $cal_info['grosor-carton'];
                
                break;
            case 6:
            
                $_SESSION['calculo']['odt']               = $cal_info['odt'];
                $_SESSION['calculo']['base']              = $cal_info['base'];
                $_SESSION['calculo']['alto']              = $cal_info['alto'];
                $_SESSION['calculo']['profundidad-cajon'] = $cal_info['profundidad-cajon'];
                $_SESSION['calculo']['profundidad-tapa']  = $cal_info['profundidad-tapa'];
                $_SESSION['calculo']['grosor-cajon']      = $cal_info['grosor-cajon'];
                $_SESSION['calculo']['grosor-tapa']       = $cal_info['grosor-tapa'];
                
                break;
            case 7:
            
                $_SESSION['calculo']['odt']               = $cal_info['odt'];
                $_SESSION['calculo']['base']              = $cal_info['base'];
                $_SESSION['calculo']['alto']              = $cal_info['alto'];
                $_SESSION['calculo']['profundidad-cajon'] = $cal_info['profundidad-cajon'];
                $_SESSION['calculo']['grosor-cajon']      = $cal_info['grosor-cajon'];
                
                break;
        }
    }


    // guarda los cálculos en variables de sesion
    public function editCalc() {
        
        $_SESSION['calculo'] = array();
        
        $options_model = $this->loadModel('OptionsModel');

        $cal_info = $options_model->getCalcDetails($_POST['id']);

        $id_modelo = $_POST['id_model'];
        $id_modelo = intval($id_modelo);

        switch ($id_modelo) {
            case 1:

                $_SESSION['calculo']['odt']            = $cal_info['odt'];
                $_SESSION['calculo']['base']           = $cal_info['base'];
                $_SESSION['calculo']['alto']           = $cal_info['alto'];
                $_SESSION['calculo']['profundidad']    = $cal_info['profundidad'];
                $_SESSION['calculo']['grosor-cajon']   = $cal_info['grosor-cajon'];
                $_SESSION['calculo']['grosor-cartera'] = $cal_info['grosor-cartera'];

                break;
            case 2:
            
                $_SESSION['calculo']['odt']           = $cal_info['odt'];
                $_SESSION['calculo']['diametro']      = $cal_info['diametro'];
                $_SESSION['calculo']['profundidad']   = $cal_info['profundidad'];
                $_SESSION['calculo']['altura-tapa']   = $cal_info['altura-tapa'];
                $_SESSION['calculo']['grosor-carton'] = $cal_info['grosor-carton'];

                break;
            case 3:
            
                $_SESSION['calculo']['odt']            = $cal_info['odt'];
                $_SESSION['calculo']['base']           = $cal_info['base'];
                $_SESSION['calculo']['alto']           = $cal_info['alto'];
                $_SESSION['calculo']['profundidad']    = $cal_info['profundidad'];
                $_SESSION['calculo']['grosor-carton']  = $cal_info['grosor-carton'];
                $_SESSION['calculo']['grosor-cartera'] = $cal_info['grosor-cartera'];

                break;
            case 4:
            
                $_SESSION['calculo']['odt']               = $cal_info['odt'];
                $_SESSION['calculo']['base']              = $cal_info['base'];
                $_SESSION['calculo']['alto']              = $cal_info['alto'];
                $_SESSION['calculo']['profundidad-cajon'] = $cal_info['profundidad-cajon'];
                $_SESSION['calculo']['profundidad-tapa']  = $cal_info['profundidad-tapa'];
                $_SESSION['calculo']['grosor-cajon']      = $cal_info['grosor-cajon'];
                $_SESSION['calculo']['grosor-tapa']       = $cal_info['grosor-tapa'];

                break;
            case 5:
            
                $_SESSION['calculo']['odt']               = $cal_info['odt'];
                $_SESSION['calculo']['base']              = $cal_info['base'];
                $_SESSION['calculo']['alto']              = $cal_info['alto'];
                $_SESSION['calculo']['profundidad-cajon'] = $cal_info['profundidad-cajon'];
                $_SESSION['calculo']['grosor-carton']      = $cal_info['grosor-carton'];
                //$_SESSION['calculo']['grosor-tapa']       = $cal_info['grosor-tapa'];
                //$_SESSION['calculo']['profundidad-tapa']  = $cal_info['profundidad-tapa'];

                break;
            case 6:
            
                $_SESSION['calculo']['odt']               = $cal_info['odt'];
                $_SESSION['calculo']['base']              = $cal_info['base'];
                $_SESSION['calculo']['alto']              = $cal_info['alto'];
                $_SESSION['calculo']['profundidad-cajon'] = $cal_info['profundidad-cajon'];
                $_SESSION['calculo']['profundidad-tapa']  = $cal_info['profundidad-tapa'];
                $_SESSION['calculo']['grosor-cajon']      = $cal_info['grosor-cajon'];
                $_SESSION['calculo']['grosor-tapa']       = $cal_info['grosor-tapa'];

                break;
            case 7:
            
                $_SESSION['calculo']['odt']               = $cal_info['odt'];
                $_SESSION['calculo']['base']              = $cal_info['base'];
                $_SESSION['calculo']['alto']              = $cal_info['alto'];
                $_SESSION['calculo']['profundidad-cajon'] = $cal_info['profundidad-cajon'];
                $_SESSION['calculo']['grosor-cajon']      = $cal_info['grosor-cajon'];

                break;
        }
    } 


    public function updateCajas() {

        $id = intval($_POST['id']);
        $id_calculo = $id;

        $options_model = $this->loadModel('OptionsModel');
        $updated       = $options_model->updateCalculo();

        $m_url = "";
        $m_url = strval(URL);
        $m_url = trim($m_url);
        $m_url = $m_url . "cajas/guardados";

?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php

        if ($updated) {

            echo '<br /><div class="container col-md-4">';
            echo '<div class="modal-content" style="font-family: Arial,Helvetica,sans-serif; font-size: 1em; color: rgba(255, 255, 255, 1); background-color: white">
                    
                    <!-- Modal Header -->
                    <div class="modal-header" style="background-color: rgba(51, 153, 0, 1)">
                        <h4 class="modal-title"><span  style="color: white">Correcto</span></h4>
                        <button type="button" class="close" data-dismiss="modal">x</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" style="color: black">
                        <h5>Datos actualizados con éxito...</h5>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">
                            <a href="' . $m_url . '"><span style="color: white" >OK</span>
                            </a>
                        </button>
                    </div>
                </div>';
            echo '</div>';
        } else {

            echo '<br /><br />';
            echo '<br /><div class="container col-md-4">';
            echo '<div class="modal-content" style="font-family: Arial,Helvetica,sans-serif;">
                    
                    <!-- Modal Header -->
                    <div class="modal-header" style="color: white; background-color: red">
                        <h4 class="modal-title">Error</h4>
                        <button type="button" class="close" data-dismiss="modal">x</button></div>
                    
                    <!-- Modal body -->
                    <div class="modal-body" style="color: rgba(55, 55, 55, 1); background-color: rgba(250, 250, 250, 1.0)"">
                        <h5>Error de actualización...</h5>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer" style="color: rgba(55, 55, 55, 1); background-color: rgba(250, 250, 250, 1.0)"">
                        <button type="button" class="alert alert-danger" data-dismiss="modal" style="font-size: 1.1em; color: rgba(50, 50, 50, 1); background-color: rgba(200, 200, 200, 1)">
                            <a href="' . $m_url . '">Cerrar</a>
                        </button>
                    </div>
                </div>';
            echo '</div>';
        }

//        header("Location:" . URL . 'cajas/guardados');

    }


    // Actualiza cálculos en las tablas cajas_calculadas y detalles_calculo
    public function updateCalc() {

        $options_model = $this->loadModel('OptionsModel');
        $updated       = $options_model->updateCalculo($_POST['id']);

        if ($updated) {

            echo "Actualizados correctamente";
        } else {
    
            echo "Error al actualizar los datos";
        }
    }

    // Terminar esta función
    // Aún no existe el modelo getODT()
    public function getOdt($odt) {

        $options_model = $this->loadModel('OptionsModel');
        $existe        = $options_model->checkODT($odt);

        return $existe;
    }


    // Elimina la ODT (Tablas: cajas_calculadas, detalles_calculo)
    public function deleteCalc() {

        $options_model = $this->loadModel('OptionsModel');
        $deleted       = $options_model->deleteCalculo($_POST['id']);

        if ($deleted) {

            echo "Correcto...";
        } else {
    
            echo "Error!";
        }
    }


    public function newOption() {
        
        $options_model = $this->loadModel('OptionsModel');

        $saved = $options_model->addNewOption($_POST);

        if ($saved) {

            echo "Datos guardados";
        } else {
    
            echo "algo salio mal";
        }
    }

}

