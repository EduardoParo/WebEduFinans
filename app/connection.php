<?php
    namespace app;

    /* Classe Conection conexão com banco de dados
    ------------------------------------*/
    class connection{

        //Metodo GET 
        public static function getDb(){
            try{
                $oConn = new \PDO(
                    "mysql:host=localhost;dbname=despesas;charset=utf8",
                    "root",
                    ""
                );
                return $oConn;

            }catch(\PDOException $e){

            }
        }
    }



?>