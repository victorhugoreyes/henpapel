<?php

class EmpresarialModel
{
    
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


    public function saveFileInfo($odt,$catego,$filename){
        
        $user=$_SESSION['user']['id_usuario'];
        $store=$_SESSION['user']['id_tienda'];
        $time=date("H:i:s", time());

        $sql = "INSERT INTO archiempr (odt, categoria, archivo, tienda) VALUES ('$odt','$catego','$filename', '$store')";

        $query = $this->db->prepare($sql);
        $inserted=$query->execute();

        if ($inserted) {
          
          return true;
        }else{
          return false;
            }
  
  }

  public function saveListInfo($odt,$comments,$filename,$numlist,$qty){
        
        $user=$_SESSION['user']['id_usuario'];
        $store=$_SESSION['user']['id_tienda'];
        $time=date("H:i:s", time());

        $sql = "INSERT INTO rotulacion (usuario,odt, cliente, archivo, tienda, numlista, cantidadrot) VALUES ('$user','$odt','$comments','$filename','$store',$numlist,$qty)";

        $query = $this->db->prepare($sql);
        $inserted=$query->execute();

        if ($inserted) {
          
          return true;
        }else{
          return false;
            }
  
  }


  public function getInfoNumRows(){

        $sql = "SELECT COUNT(*) AS total FROM info";
        $query = $this->db->prepare($sql);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['total'];
    }


    // esta función está duplicada y no se usa la tabla info!
    public function getInfoByStore($store,$start,$limit){

        $sql = "SELECT * FROM info WHERE Tienda = '" . $store . "' limit  $start , $limit";
        $query = $this->db->prepare($sql);
        $query->execute();
               

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
        $result[]=$row;
        
    }

        return $result;


    }

    public function getProductsNumRows(){

        $sql = "SELECT COUNT(*) AS total FROM productos_catalogo";
        $query = $this->db->prepare($sql);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['total'];
    }

public function getProductsByStore($start,$limit){

        $sql = "SELECT * FROM productos_catalogo limit  $start , $limit";
        $query = $this->db->prepare($sql);
        $query->execute();
               

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
        $result[]=$row;
        
    }

        return $result;


    }



    public function getInvitNumRows(){

        $sql = "SELECT COUNT(*) AS total FROM invitaciones";
        $query = $this->db->prepare($sql);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['total'];
    }

public function getInvitations($start,$limit){

        $sql = "SELECT * FROM invitaciones limit  $start , $limit";
        $query = $this->db->prepare($sql);
        $query->execute();
               

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
        $result[]=$row;
        
    }

        return $result;


    }

    public function getFilesNumRows(){

        $sql = "SELECT COUNT(*) AS total FROM archivos";
        $query = $this->db->prepare($sql);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['total'];
    }

public function getFiles($start,$limit){

        $sql = "SELECT * FROM archivos ORDER BY idrotul DESC limit  $start , $limit";
        $query = $this->db->prepare($sql);
        $query->execute();
               

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
        $result[]=$row;
        
    }

        return $result;


    }

    
    
}
