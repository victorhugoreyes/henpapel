<?php

class Application {
    
    private $url_controller = null;
    private $url_action     = null;
    private $url_params     = array();

    public function __construct() {
       
        $this->splitUrl();
        
        if (file_exists('./application/controller/' . $this->url_controller . '.php')) {
           
           require_once './application/controller/' . $this->url_controller . '.php';
            
            $this->url_controller = new $this->url_controller();

            if (method_exists($this->url_controller, $this->url_action)) {

                if(!empty($this->url_params)) {
                    
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                   
                    $this->url_controller->{$this->url_action}();
                }
            } else {
                
                $this->url_controller->index();
            }
        } else {
            
            require_once './application/controller/inicio.php';
            
            $home = new Inicio();
            
            $home->index();
        }
    }

   
    private function splitUrl() {

        if (isset($_GET['url'])) {
            
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
           
            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;
            
            unset($url[0], $url[1]);
           
            $this->url_params = array_values($url);
        }
    }
}
