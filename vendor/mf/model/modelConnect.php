<?php
    namespace mf\model;
    
    // Chamada do arquivo Connection
    use app\connection;

    /* Classe modelConnect 
    ----------------------------------------*/
    class modelConnect {

        // Metodo GET
        public static function getModel($cModel){
            
            $cClass = "app\\model\\".$cModel;//ucfirst($oModel);

            // Estabelece a conexão
            $oConn = connection::getDb();

            // Retorna o Obj com a conexão do modelo
            return new $cClass($oConn);
        }
    }



?>