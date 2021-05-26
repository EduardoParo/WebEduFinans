<?php
namespace mf\model;

/* Classe Model instancia o Objeto Odb
------------------------------*/
abstract class model {

    //Variavel Propiedades do Objeto
	protected $oDb;

    //Construtoe
	public function __construct(\PDO $oDb) {
		$this->oDb = $oDb;
	}
}
?>