<?php

namespace app\model;

use mf\model\model;

/*-----------------------------------
Extensão da classe model
------------------------------------*/
class usuario extends model{
    //Definir Propriedades do Objeto
    private $nId;
    private $cNome;
    private $cEmail;
    private $cSenha;

    //Metodo GET Retornar os atributos do OBJ
    public function __get($xAtributo){
        return $this->$xAtributo;
    }

    //Metodo PUT seta os valores dos atributos
    public function __set($xAtributo,$xValor){
        $this->$xAtributo = $xValor;
    }

    //Metodo POST salvar os dados 
    public function salvarUsr(){
       //Montagem da query
        $cQuery =" INSERT INTO sys_usr ";
        $cQuery.="     (usr_nome, usr_email, usr_senha) " ;
        $cQuery.="  VALUES ";
        $cQuery.="  (:nome, :email, :senha) ";

        $oQuery = $this->oDb->prepare($cQuery);
        
        $oQuery->bindValue(':nome', $this->__get('cNome'));
        $oQuery->bindValue(':email', $this->__get('cEmail'));
        $oQuery->bindValue(':senha', $this->__get('cSenha'));

        $oQuery->execute();

        return $this;

    }

    //Metodo GET Retornar um usuário por e-mail
    public function getUsrEmail(){
        //Montagem Query
        $cQuery =" SELECT ";
        $cQuery.="     usr_nome, usr_email ";
        $cQuery.=" FROM ";
        $cQuery.="      sys_usr ";
        $cQuery.=" WHERE ";
        $cQuery.="      usr_email = :email";

        $oQuery= $this->oDb->prepare($cQuery);
        $oQuery->bindValue('email', $this->__get('cEmail'));
        $oQuery->execute();

        // Retornar um array com os dados nome, email
        return $oQuery->fetchAll(\PDO::FETCH_ASSOC);

    }
    //Metodo autenticar
    public function Autenticar(){
        //Montagem da Query
        $cQuery = "SELECT ";
        $cQuery.= "     usr_id, usr_nome, usr_senha ";
        $cQuery.=" FROM ";
        $cQuery.="      sys_usr ";
        $cQuery.=" WHERE ";
        $cQuery.="      usr_email = :email and usr_senha = :senha ";

        $oQuery = $this->oDb->prepare($cQuery);
        
        $oQuery->bindValue('email', $this->__get('cEmail'));
        $oQuery->bindValue('senha', $this->__get('cSenha'));

        $oQuery->execute();

        $xRet = $oQuery->fetch(\PDO::FETCH_ASSOC);

        if(gettype($xRet) != "boolean"){
            $aUsr = $xRet;

            if($aUsr['usr_id'] !='' && $aUsr['usr_nome'] != ''){
                $this->__set('nId'  , $aUsr['usr_id']);
                $this->__set('cNome',$aUsr['usr_nome']);
            }
        }
        //Retornar Obj
        return $this;
    }

    //Metodo Validar os dados antes de gravar no banco
    public function validarCadastro(){
        $lOk = true;
    
        if(strlen($this->__get('cNome')) < 3){
            $lOk = false;
        }
    
        if(strlen($this->__get('cEmail')) < 3){
            $lOk = false;
        }
    
        if(strlen($this->__get('cSenha')) < 3){
            $lOk = false;
        }
    
        return $lOk;
    }

    


}