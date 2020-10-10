<?php

class remaquilamodel
{
    function __construct($db) {
      
        try {
            $this->db = $db;
        } catch (PDOException $e) {
          exit('Database connection could not be established.');
        }
    }


    public function savemaqui($id,$fecha,$pre,$ot,$npt,$pc,$pcb,$pca,$tic,$ticb,$tica,$tt){
        
        $user=$_SESSION['user']['id_usuario'];
        $store=$_SESSION['user']['id_tienda'];
        $time=date("H:i:s", time());

        $sql_maquila="INSERT INTO `registros_maquila` (`id_maquila`, `fecha`, `persona_responsable_entrega`, `orden_trabajo`, `nombreypieza_trabajo`, `pliegos_cantidad`, , `pliegos_cortado_base`, `pliegos_cortado_altura`, `tamtotal_impresion_cantidad`, `tamtotal_impresion_cortado_base`, `tamtotal_impresion_cortado_altura`, `tamindividual_total`) VALUES ('$id','$fecha','$pre','$ot','$npt','$pc','$pcb','$pca','$tic','$ticb','$tica','$tt')";
            $query = $this->db->prepare($sql_maquila);

        $inserted=$query->execute();

        if ($inserted) {
          $maquila_id=$this->db->lastInsertId();

          $count=count($options);
          $i=0;

          foreach ($options as  $option) {
          }
    }
}



    public function getRegistrar($post){

      $fecha=$post['fecha'];
      $persona_responsable_entrega=$post['persona_responsable_entrega'];
      $orden_trabajo=$post['orden_trabajo'];
      $nombreypieza_trabajo=$post['nombreypieza_trabajo'];
      $pliegos_cantidad=$post['pliegos_cantidad'];
      $pliegos_cortado_base=$post['pliegos_cortado_base'];
      $pliegos_cortado_altura=$post['pliegos_cortado_altura'];
      $tamtotal_impresion_cantidad=$post['tamtotal_impresion_cantidad'];
      $tamtotal_impresion_cortado_base=$post['tamtotal_impresion_cortado_base'];
      $tamtotal_impresion_cortado_altura=$post['tamtotal_impresion_cortado_altura'];
      $tamindividual_total=$post['tamindividual_total'];

       
 $sql1 = "INSERT INTO registros_maquila (fecha, persona_responsable_entrega, orden_trabajo, nombreypieza_trabajo, pliegos_cantidad, pliegos_cortado_base, pliegos_cortado_altura, tamtotal_impresion_cantidad, tamtotal_impresion_cortado_base, tamtotal_impresion_cortado_altura, tamindividual_total) VALUES ('$fecha', '$persona_responsable_entrega', '$orden_trabajo','$nombreypieza_trabajo','$pliegos_cantidad','$pliegos_cortado_base','$pliegos_cortado_altura','$tamtotal_impresion_cantidad','$tamtotal_impresion_cortado_base','$tamtotal_impresion_cortado_altura','$tamindividual_total')";

$query1 = $this->db->prepare($sql1);
$inserted=$query1->execute();
if (!$inserted) {
  echo "no se inserto";

  echo $sql1;
}

$id_maquila=$this->db->lastInsertId();

foreach ($post["procesos"] as $key => $idma) {
 $name=$post["nombres"][$idma];
 $cep=$post["cantidad_entra"][$idma];
 $cspc=$post["cantidad_sale"][$idma];
 $cpm=$post["merma"][$idma];
 $total=$post["total"][$idma];
 $prov=$post["proveedor"][$idma];
 $fir=$post["firma"][$idma];
 
 
  $sqlgast = "INSERT INTO gastos_especiales (nombre, cantidad_entrada_proceso, cantidad_salida_proceso_correcta, cantidad_proceso_merma, total, proveedor, firma, id_maquila) VALUES ('$name','$cep','$cspc','$cpm','$total','$prov','$fir','$id_maquila')";

 $querymaquilare = $this->db->prepare($sqlgast);
 $inserted2=$querymaquilare->execute();
 if (!$inserted2) {
  echo "<br>no se inserto el gasto<br>";
 echo $sqlgast;
 }
 
}


if ($query1) {
  return true;
}else{
  return false;
   }
 }


public function getmaquila(){        

        $sql = "SELECT * FROM registros_maquila ORDER BY id_maquila ASC";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result=array();
        
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $result[]=$row;
        
    }
        
        return $result;
    }

public function getmodif($post)
    {
      $id=$_POST['id'];
      $fecha=$_POST['fecha'];
      $persona_responsable_entrega=$_POST['persona_responsable_entrega'];
      $orden_trabajo=$_POST['orden_trabajo'];
      $nombreypieza_trabajo=$_POST['nombreypieza_trabajo'];
      $pliegos_cantidad=$_POST['pliegos_cantidad'];
      $pliegos_cortado_base=$_POST['pliegos_cortado_base'];
      $pliegos_cortado_altura=$_POST['pliegos_cortado_altura'];
      $tamtotal_impresion_cantidad=$_POST['tamtotal_impresion_cantidad'];
      $tamtotal_impresion_cortado_base=$_POST['tamtotal_impresion_cortado_base'];
      $tamtotal_impresion_cortado_altura=$_POST['tamtotal_impresion_cortado_altura'];
      $tamindividual_total=$_POST['tamindividual_total'];
      
       $sql = "UPDATE registros_maquila SET fecha='$fecha',
             persona_responsable_entrega='$persona_responsable_entrega',
             orden_trabajo='$orden_trabajo',  
             nombreypieza_trabajo='$nombreypieza_trabajo',
             pliegos_cantidad='$pliegos_cantidad',
             pliegos_cortado_base='$pliegos_cortado_base',
             pliegos_cortado_altura='$pliegos_cortado_altura',  
             tamtotal_impresion_cantidad='$tamtotal_impresion_cantidad',
             tamtotal_impresion_cortado_base='$tamtotal_impresion_cortado_base',
             tamtotal_impresion_cortado_altura='$tamtotal_impresion_cortado_altura',
             tamindividual_total='$tamindividual_total'
             WHERE id_maquila=$id";
        $query = $this->db->prepare($sql);
     if ( $query->execute()) {
         return true;
     }else{
        return false;
     }   
 }


    public function getadjust($id)
    {
       $sql= "SELECT * FROM registros_maquila WHERE id_maquila=$id";
       $query = $this->db->prepare($sql);
       $query->execute();
       $result=array();
        
       $row = $query->fetch(PDO::FETCH_ASSOC);
       return $row;
    }


    public function getBorrar($id){
       $sql = "DELETE FROM registros_maquila WHERE id_maquila=$id";
       $query = $this->db->prepare($sql);
       if ( $query->execute()) {
         return true;
     }else{
        return false;
     }
 }


 public function getcoma($post){
 
          
          $fecha=$_POST['fecha'];
          $persona_responsable_entrega=$_POST['persona_responsable_entrega'];
          $orden_trabajo=$_POST['orden_trabajo'];
          $nombreypieza_trabajo=$_POST['nombreypieza_trabajo'];
          $pliegos_cantidad=$_POST['pliegos_cantidad'];
          $pliegos_cortado_base=$_POST['pliegos_cortado_base'];
          $pliegos_cortado_altura=$_POST['pliegos_cortado_altura'];
          $tamtotal_impresion_cantidad=$_POST['tamtotal_impresion_cantidad'];
          $tamtotal_impresion_cortado_base=$_POST['tamtotal_impresion_cortado_base'];
          $tamtotal_impresion_cortado_altura=$_POST['tamtotal_impresion_cortado_altura'];
          $tamindividual_total=$_POST['tamindividual_total'];


       $sql_maquila = "INSERT INTO registros_maquila (`fecha`, `persona_responsable_entrega`, `orden_trabajo`, `nombreypieza_trabajo`, `pliegos_cantidad`, `pliegos_cortado_base`, `pliegos_cortado_altura`, `tamtotal_impresion_cantidad`, `tamtotal_impresion_cortado_base`, `tamtotal_impresion_cortado_altura`, `tamindividual_total`) VALUES ('$fecha', '$persona_responsable_entrega', '$orden_trabajo','$nombreypieza_trabajo','$pliegos_cantidad','$pliegos_cortado_base','$pliegos_cortado_altura','$tamtotal_impresion_cantidad','$tamtotal_impresion_cortado_base','$tamtotal_impresion_cortado_altura','$tamindividual_total')";
          
        $query = $this->db->prepare($sql_maquila);
     if ( $query->execute()) {
         return true;

     }else{
        return false;
     }

    }


public function getinfo(){        

        $sql = "SELECT * FROM registros_maquila WHERE id_maquila=$id";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result=array();
        
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $result[]=$row;    
    }  
        return $result;
    }



public function getremaquila()
 {        

     $sql= "SELECT * FROM registros_maquila";
 
       $query = $this->db->prepare($sql);
       $query->execute();
       $result=array();

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $result[]=$row;     
    }       
       return $result;
    }



public function getIn($post){

      $fecha=$post['fecha'];
      $persona_responsable_entrega=$post['persona_responsable_entrega'];
      $orden_trabajo=$post['orden_trabajo'];
      $nombreypieza_trabajo=$post['nombreypieza_trabajo'];
      $pliegos_cantidad=$post['pliegos_cantidad'];
      $pliegos_cortado_base=$post['pliegos_cortado_base'];
      $pliegos_cortado_altura=$post['pliegos_cortado_altura'];
      $tamtotal_impresion_cantidad=$post['tamtotal_impresion_cantidad'];
      $tamtotal_impresion_cortado_base=$post['tamtotal_impresion_cortado_base'];
      $tamtotal_impresion_cortado_altura=$post['tamtotal_impresion_cortado_altura'];
      $tamindividual_total=$post['tamindividual_total'];

       
 $sql1 = "INSERT INTO registros_maquila (fecha, persona_responsable_entrega, orden_trabajo, nombreypieza_trabajo, pliegos_cantidad, pliegos_cortado_base, pliegos_cortado_altura, tamtotal_impresion_cantidad, tamtotal_impresion_cortado_base, tamtotal_impresion_cortado_altura, tamindividual_total) VALUES ('$fecha', '$persona_responsable_entrega', '$orden_trabajo','$nombreypieza_trabajo','$pliegos_cantidad','$pliegos_cortado_base','$pliegos_cortado_altura','$tamtotal_impresion_cantidad','$tamtotal_impresion_cortado_base','$tamtotal_impresion_cortado_altura','$tamindividual_total')";

$query1 = $this->db->prepare($sql1);
$inserted=$query1->execute();
if (!$inserted) {
  echo "no se inserto";

  echo $sql1;
}

$id_maquila=$this->db->lastInsertId();

foreach ($post["id_maquila"] as $key => $idma) {
 $name=$post["nombres"][$idma];
 $cep=$post["cantidad_entra"][$idma];
 $cspc=$post["cantidad_sale"][$idma];
 $cpm=$post["merma"][$idma];
 $total=$post["total"][$idma];
 $prov=$post["proveedor"][$idma];
 $fir=$post["firma"][$idma];
 
 
  $sqlgast = "INSERT INTO gastos_especiales (nombre, cantidad_entrada_proceso, cantidad_salida_proceso_correcta, cantidad_proceso_merma, total, proveedor, firma, id_maquila) VALUES ('$name','$cep','$cspc','$cpm','$total','$prov','$fir','$id_maquila')";

 $querymaquilare = $this->db->prepare($sqlgast);
 $inserted2=$querymaquilare->execute();
 if (!$inserted2) {
  echo "<br>no se inserto el gasto<br>";
 echo $sqlgast;
 }
 
}


if ($query1) {
  return true;
}else{
  return false;
   }
 }



}
