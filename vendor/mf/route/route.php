<?php
    // Definir nome para encontrar op arquivo
    namespace mf\route;
    
    /* Definição da classe Route
    ----------------------------------------*/
    abstract class route{
        // Definição de variaveis
        private $aRoutes;
        abstract protected function iniRoutes();

        // Contrutor
        public function __construct(){
            $this->iniRoutes();             //Inicializa o array de rotas
            $this->exec($this->getUrl()); // Executa ação do controlador
        }

        // Metodo GET Retorna array das rotas
        public function getRoutes(){
            return $this->aRoutes;
        }
        
        // Metodo PUT Armazenar Array de Rotas
        public function setRoutes($aRoutes){
            $this->aRoutes = $aRoutes;
        }

        // Metodo GET Recuperar a URL
        protected function getUrl(){
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }

        //Metodo POST Executa a ação definida pelo controller
        protected function exec($cUrl){
            
            //Laço para percorrer as rotas 
            foreach($this->getRoutes() as $key => $aRoutes){
                //Condição para acessar a rota dentro do array
                if($cUrl ==$aRoutes['route']){
                    //Armazena o caminho do arquivo controller
                    $cClass ="app\\controller\\" . $aRoutes['controller'];

                    //Instancia o Objeto com o caminho do controler 
                    $oController = new $cClass;

                    //Armazena a acção do array encontrado 
                    $cAction =  $aRoutes['action'];

                    //Executa o o metodo definido no Obj com o caminho do controler
                    $oController->$cAction();

                }
            }
        }
    }




?>