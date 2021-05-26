<?php

namespace app\model;

use mf\model\model;

/*-----------------------------------
Extensão da classe model
------------------------------------*/
class despesa extends model{
    //Definir Propriedades do Objeto
    private $nId_des        ;
    private $nId_Usr        ;
    private $dData          ;
    private $nKm            ;
    private $cTitulo        ;
    private $cProduto       ;
    private $cMarca         ;
    private $nValorUni      ;
    private $nQtd           ;
    private $nValorTotal    ;
    private $cObs           ;

   
    /*Metodo GET Retornar os atributos do OBJ
    ------------------------------------------*/
    public function __get($xAtributo){
        return $this->$xAtributo;
    }

    /*Metodo PUT seta os valores dos atributos
    --------------------------------------------*/
    public function __set($xAtributo,$xValor){
        $this->$xAtributo = $xValor;
    }

     /*Metodo GET retornar todos dados 
    --------------------------------------------*/
    public function getAll(){
        //Montagem da query
        $cQuery = " SELECT ";
        $cQuery.= " * FROM despesa ";
        $cQuery.= "ORDER BY";
        $cQuery.= " data DESC";

        $oQuery = $this->oDb->prepare($cQuery);
        $oQuery->execute();

        return $oQuery->fetchAll(\PDO::FETCH_ASSOC);
    }

    /*Metodo GET retornar um dado
    --------------------------------------------*/
    public function getDespesa(){
        //Montagem da query
        $cQuery = " SELECT ";
        $cQuery.= " * FROM despesa ";
        $cQuery.= " WHERE ";
        $cQuery.= " des_id = :nId_des";

        $oQuery = $this->oDb->prepare($cQuery);
        $oQuery->bindValue(':nId_des'        , $this->__get('nId_des'));

        $oQuery->execute();

        return $oQuery->fetchAll(\PDO::FETCH_ASSOC);
    }

    /*Metodo POST salvar os dados 
    --------------------------------------------*/
    public function insertDespesa(){
       //Montagem da query
        $cQuery =" INSERT INTO despesa ";
        $cQuery.="      (des_id_usr, des_data, des_km, des_titulo, des_produto, des_marca, des_vl_uni, des_quantidade, des_vl_total, des_obs) " ;
        $cQuery.="  VALUES ";
        $cQuery.="      (:nId_Usr, :dData, :nKm, :cTitulo, :cProduto, :cMarca, :nValorUni,  :nQtd, :nValorTotal, :cObs) ";

        $oQuery = $this->oDb->prepare($cQuery);

        $oQuery->bindValue(':nId_Usr'        , $this->__get('nId_Usr'));
        $oQuery->bindValue(':dData'         , $this->__get('dData'));
        $oQuery->bindValue(':nKm'           , $this->__get('nKm'));
        $oQuery->bindValue(':cTitulo'       , $this->__get('cTitulo'));
        $oQuery->bindValue(':cProduto'      , $this->__get('cProduto'));
        $oQuery->bindValue(':cMarca'        , $this->__get('cMarca'));
        $oQuery->bindValue(':nValorUni'     , $this->__get('nValorUni'));
        $oQuery->bindValue(':nQtd'          , $this->__get('nQtd'));
        $oQuery->bindValue(':nValorTotal'   , $this->__get('nValorTotal'));
        $oQuery->bindValue(':cObs'          , $this->__get('cObs'));
      
        $oQuery->execute();

        return $this;

    }

    
    /*Metodo PUT salvar os dados 
    --------------------------------------------*/
    public function updateDespesa(){
        //Montagem da query
         $cQuery =" UPDATE despesa ";
         $cQuery.="  SET ";
         $cQuery.="      des_id_usr     = :nId_Usr,
                         des_data       = :dData,
                         des_km         = :nKm,
                         des_titulo     = :cTitulo,
                         des_produto    = :cProduto,
                         des_marca      = :cMarca,
                         des_vl_uni     = :nValorUni, 
                         des_quantidade = :nQtd,
                         des_vl_total   = :nValorTotal,
                         des_obs        = :cObs ";
         $cQuery.="  WHERE ";
         $cQuery.="     des_id = :nId_des";
 
         $oQuery = $this->oDb->prepare($cQuery);
        
         $oQuery->bindValue(':nId_des'       ,intval($this->__get('nId_des')));
         $oQuery->bindValue(':nId_Usr'       , $this->__get('nId_Usr'));
         $oQuery->bindValue(':dData'         , $this->__get('dData'));
         $oQuery->bindValue(':nKm'           , $this->__get('nKm'));
         $oQuery->bindValue(':cTitulo'       , $this->__get('cTitulo'));
         $oQuery->bindValue(':cProduto'      , $this->__get('cProduto'));
         $oQuery->bindValue(':cMarca'        , $this->__get('cMarca'));
         $oQuery->bindValue(':nValorUni'     , $this->__get('nValorUni'));
         $oQuery->bindValue(':nQtd'          , $this->__get('nQtd'));
         $oQuery->bindValue(':nValorTotal'   , $this->__get('nValorTotal'));
         $oQuery->bindValue(':cObs'          , $this->__get('cObs'));
       
         $oQuery->execute();
 
         return $this;
 
     }

     //Deletar um Registro
     public function delDespesa(){
        $cQuery = "DELETE FROM despesa WHERE des_id = :nId_des";

        $oQuery = $this->oDb->prepare($cQuery);
        $oQuery->bindValue(':nId_des'     , intval($this->__get('nId_des')) );
        $oQuery->execute();

        return $oQuery->fetchAll(\PDO::FETCH_ASSOC);
    }
    
   
    
    //Metodo Validar os dados antes de gravar no banco
    

    


}