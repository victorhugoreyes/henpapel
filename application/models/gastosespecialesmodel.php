<?php

class gastosespecialesmodel
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


    public function saveFileInfo($id,$name,$cep,$cspc,$cpm,$total,$prov,$fir,$idma){
        
        $user=$_SESSION['user']['id_usuario'];
        $store=$_SESSION['user']['id_tienda'];
        $time=date("H:i:s", time());

        $sql_gastos = "INSERT INTO gastos_especiales (id_tipotec, nombre, cantidad_entrada_proceso, cantidad_salida_proceso_correcta, cantidad_proceso_merma, total, proveedor, firma, id_maquila) VALUES ('$id','$pre','$name','$cep','$cspc','$cpm','$total','$prov','$fir','$idma')";
        $query = $this->db->prepare($sql_gastos);

        $inserted=$query->execute();

        if ($inserted) {
          $gastosmaquila_id=$this->db->lastInsertId();

          $count=count($options);
          $i=0;

          foreach ($options as  $option) {

          }   
    }
}


public function getgastos(){        

        $sql = "SELECT * FROM gastos_especiales ORDER BY id_tipotec ASC";
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
      $nombre=$_POST['nombre'];
      $cantidad_entrada_proceso=$_POST['cantidad_entrada_proceso'];
      $cantidad_salida_proceso_correcta=$_POST['cantidad_salida_proceso_correcta'];
      $cantidad_proceso_merma=$_POST['cantidad_proceso_merma'];
      $total=$_POST['total'];
      $proveedor=$_POST['proveedor'];
      $firma=$_POST['firma'];


      
       $sql = "UPDATE gastos_especiales SET nombre='$nombre',
             cantidad_entrada_proceso='$cantidad_entrada_proceso',  
             cantidad_salida_proceso_correcta='$cantidad_salida_proceso_correcta',
             cantidad_proceso_merma='$cantidad_proceso_merma',
             total='$total',
             proveedor='$proveedor',  
             firma='$firma'
             WHERE id_tipotec=$id";
        $query = $this->db->prepare($sql);
     if ( $query->execute()) {
         return true;
     }else{
        return false;
     }   
 }
 

     public function getadjust($id)
    {
       $sql= "SELECT * FROM gastos_especiales WHERE id_tipotec=$id";
       $query = $this->db->prepare($sql);
       $query->execute();
       $result=array();
        
       $row = $query->fetch(PDO::FETCH_ASSOC);
       return $row;
    }




public function getPapers(){        

        $sql = "SELECT * FROM gastos_especiales";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result=array();
        
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $result[]=$row;
        
    }
        
        return $result;
    }

 public function getBorrar($id){
    $sql = "DELETE FROM gastos_especiales WHERE id_tipotec=$id";
    $query = $this->db->prepare($sql);
     if ( $query->execute()) {
         return true;
     }else{
        return false;
     }
 }


 public function getRegistrar($post){
 
          
          $nombre=$_POST['nombre'];
          $cantidad_entrada_proceso=$_POST['cantidad_entrada_proceso'];
          $cantidad_salida_proceso_correcta=$_POST['cantidad_salida_proceso_correcta'];
          $cantidad_proceso_merma=$_POST['cantidad_proceso_merma'];
          $total=$_POST['total'];
          $proveedor=$_POST['proveedor'];
          $firma=$_POST['firma'];
          $id_maquila=$_POST['id_maquila'];


       $sql_gastos = "INSERT INTO gastos_especiales (`nombre`, `cantidad_entrada_proceso`, `cantidad_salida_proceso_correcta`, `cantidad_proceso_merma`, `total`, `proveedor`, `firma`, `id_maquila`) VALUES ('$nombre','$cantidad_entrada_proceso','$cantidad_salida_proceso_correcta','$cantidad_proceso_merma','$total','$proveedor','$firma','$id_maquila')";
          
        $query = $this->db->prepare($sql_gastos);
     if ( $query->execute()) {
         return true;

     }else{
        return false;
     }

    }




}