<?php


class Disenio extends Controller
{
    
    public function index(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $options_model = $this->loadModel('OptionsModel');
        $models=$options_model->getBoxModels();
if($login->isLoged()){
    
    require 'application/views/templates/head.php';
    require 'application/views/templates/top_menu.php';
    require 'application/views/disenio/index.php';
    require 'application/views/templates/footer.php';
  
    }else{

        header("Location:".URL.'login/');

    }



    }

    public function getForm(){

    $options_model = $this->loadModel('OptionsModel');

    $model=$_POST['model'];

    $html='';
    $i=1;
    $options=$options_model->getOptionsByModel($model);
    
    

    foreach ($options as $option) {
      $even=($i & 1)? 'even':'';
      $html.='<div class="cajas-input-group '.$even.'">';
      $html.='<div class="cajas-col-input left"><span>'.$option['nombre'].': </span></div>';

      $html.='<div class="cajas-col-input right">';

      $values=$options_model->getValuesByOption($option['id_variante']);


      switch ($option['tipo_opcion']) {
        case 'text':
          foreach ($values as $value) {
            $html.='<input type="text" step="any" required placeholder="cm" class="cajas-input" name="'.$option['name'].'">';
          }
          
          break;
        case 'number':
        foreach ($values as $value) {
          $html.='<input type="number" step="any" required placeholder="cm" class="cajas-input" name="'.$option['name'].'">';
          }
          break;
        case 'radio':
        foreach ($values as $value) {
          $html.='<input type="radio" id="'.$value['id_valor'].'" required  name="'.$option['name'].'" value="'.$value['valor'].'" ><label for="'.$value['id_valor'].'" >'.$value['valor'].' </label>';
          }
          break;
        case 'select':
          $html.='<select class="cajas-input" name="'.$option['name'].'" >';
          $html.='<option selected disabled>Elige una opcion</option>';
        foreach ($values as $value) {
          $html.='<option value="'.$value['valor'].'">'.$value['valor'].'</option>';
          }
          $html.='</select>';
          break;
        default:
          # code...
          break;
      }

      $html.='</div></div>';
     $i++;
      

    }

    $html.='<input class="cajas-form-submitter" type="submit" value="CALCULAR">';

    if ($model=='1') {
       echo $html;
    }else{
      echo "<p style='font-weight:bold;'>En desarrollo</p>";
    }
   


  }


    

    

    


  
    
}
