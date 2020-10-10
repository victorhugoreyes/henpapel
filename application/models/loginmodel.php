<?php

class LoginModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        
        try {
            
            $this->db = $db;
        } catch (PDOException $e) {
            
            exit('No se pudo establecer conexion con la base de datos.');
        }
    }

    
    // Valida las credenciales del usuario (parece que no existe el campo 'usuario')
    public function signIn($user, $password) {

        $sql = "SELECT * FROM usuarios WHERE status = 'A' and password = '$password' AND usuario LIKE '$user' ";
        
        $query = $this->db->prepare($sql);
        $query->execute();

        if ($query->rowCount() > 0) {
            
            session_start();
            $_SESSION['logged'] = 'true';
            
            return true;
        } else {
            
            return false;
        }
    }
    

    // Obtiene los datos de un usuario(No existe el field id)
    public function getUserInfo($userID) {
        
        $sql = "SELECT * FROM usuarios WHERE id = " . $userID;
        
        $query = $this->db->prepare($sql);

        $query->execute();

        $info = $query->fetch(PDO::FETCH_ASSOC);
        
        return $info;
    }

    
    // no exista la tabla: usuarios_sesion_equipo  
    public function getAllowedMembers() {
        
        $sql = "SELECT * FROM usuarios WHERE team_member = 'true' AND id NOT IN(SELECT id_usuario FROM usuarios_sesion_equipo WHERE fecha = '" . TODAY . "' AND id_sesion NOT IN(" . $_SESSION['sessionID'] . ")) ORDER BY logged_in ASC";
        
        $query = $this->db->prepare($sql);
        $query->execute();

        $info = $query->fetch(PDO::FETCH_ASSOC);
        
        $users=array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
            $users[] = $row;
        }

        return $users;
    }


    // No existe la tabla: usuarios_sesion_equipo
    public function getFreeMembers() {
        
        $sql = "SELECT * FROM usuarios WHERE team_member ='true' AND id NOT IN(SELECT id_usuario FROM usuarios_sesion_equipo WHERE fecha = '" . TODAY . "') ORDER BY logged_in ASC";
        
        $query = $this->db->prepare($sql);
        $query->execute();

        $info = $query->fetch(PDO::FETCH_ASSOC);
        
        $users = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
            $users[] = $row;
        }

        return $users;
    }

    
    // Obtiene un array con los datos del usuario
    public function login($post) {
        
        $user = $post['usuario'];
        $pass = $post['pass'];
        
        $sql = "SELECT * FROM usuarios WHERE status = 'A' and nombre_usuario LIKE '$user' AND password = '$pass'";
        
        $query = $this->db->prepare($sql);
        $query->execute();
        
        if ( $query->rowCount() > 0 ) {
            
            $info = $query->fetch(PDO::FETCH_ASSOC);

            $_SESSION['n_id_usuario']     = $info['id_usuario'];
            $_SESSION['n_nombre_usuario'] = $info['nombre_usuario'];

            return $info;
        } else {
            
            return false;
        }
    }


    // No existe la tabla: usuarios_estaciones
    public function getUserStations($userID) {
        
        $sql = "SELECT * FROM usuarios_estaciones WHERE id_usuario=".$userID;
        
        $query = $this->db->prepare($sql);
        $query->execute();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        
            $this->getStationProcess($row['id_estacion']);
        }

        if ($query->rowCount()>0) {

            $info = $query->fetch(PDO::FETCH_ASSOC);

            return $info;
        } else {
            
            return false;
        }
    }


    // Obtiene los cambios pendientes
    public function getPendingCambios() {
        
        $sql = "SELECT * FROM cambios WHERE realizado = 'false'";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->rowCount();
    }


    // Obtiene el nombre de la tienda
    public function getStoreName($store) {

        $store = intval($store);

        $sql = "SELECT nombre_tienda FROM tiendas WHERE status = 'A' and id_tienda = $store";
        
        $query = $this->db->prepare($sql);
        $query->execute();

        $status = $query->fetch(PDO::FETCH_ASSOC);
        
        return $status['nombre_tienda'];
    }

    
    // No existe la tabla: usuarios_estaciones
    public function isMultiStation($userID) {
        
        $sql = "SELECT * FROM usuarios_estaciones WHERE id_usuario = " . $userID;
        
        $query = $this->db->prepare($sql);
        $query->execute();
        
        $stats = array();

        if ($query->rowCount()>1) {
        
            $stats['multi'] = 'true';
            
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                
                $stats['station'][$row['id_estacion']]=$row;
            }
            
            return $stats;
        } else {
            
            $stats['multi'] = 'false';
            
            $idStation = $query->fetch(PDO::FETCH_ASSOC); 
            
            $stats['station'] = $idStation;

            return $stats;
        }
    }


    // No existe la tabla: estaciones_procesos
    public function getStationProcess($stationID) {
        
        $process = array();        
        
        $sql = "SELECT * FROM estaciones_procesos WHERE id_estacion = ".$stationID;

        $query = $this->db->prepare($sql);
        $query->execute();
        
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        
            $process[$row['id_proceso']]=$this->getProcessInfo($row['id_proceso']);
        }

        return $process;
    }


    // No existe el campo: id_proceso en la tabla: procesos_catalogo 
    public function getProcessInfo($processID) {
        
        $process = array();        
        
        $sql = "SELECT * FROM procesos_catalogo WHERE id_proceso = " . $processID;

        $query = $this->db->prepare($sql);
        $query->execute();
        
        $processInfo = $query->fetch(PDO::FETCH_ASSOC);
        
        return $processInfo;
    }

    
    // No existe la tabla song
    public function getAmountOfSongs() {
        
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetch()->amount_of_songs;
    }

}
