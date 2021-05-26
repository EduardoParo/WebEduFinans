<?php
    namespace app;

    /* Classe Conection conexão com banco de dados
    ------------------------------------*/
    class connection{

        //Metodo GET 
        public static function getDb(){
            try{
                $oConn = new \PDO(
                    "mysql:host=sql209.epizy.com;dbname=epiz_25824282_web_api;charset=utf8",
                    "epiz_25824282",
                    "L4MQV5WZaoZ"
                );
                return $oConn;

            }catch(\PDOException $e){

            }
        }
    }



?>