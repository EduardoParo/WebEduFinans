<?php
    // Definir namespace
    namespace app\controller;

    // Executar a classe  do arquivo
    use mf\controller\controller;
    use mf\model\modelConnect;

    /* Extensão da classe Controller
    --------------------------------------*/
    class indexController extends controller {

        // Metodo POST Index
        public function index(){
            //Verificar se foi realizado o Longin
            $this->oView->login = isset($_GET['login']) ? $_GET['login'] : '';

            //Executar a View Index
            $this->ExecView('index');
        }

        /*Função Cadastrar Usuario
        -------------------------------------*/
        public function incluirUsr(){
            $oUsr = modelConnect::getModel('usuario');

            $oUsr->__set('cNome'  ,$_POST['nome']);
	    	$oUsr->__set('cEmail' ,$_POST['email']);
	    	$oUsr->__set('cSenha' ,md5($_POST['senha']));
        
	    	if($oUsr->validarCadastro()){
            
	    		if(count($oUsr->getUsrEmail()) == 0 ){
	    			$oUsr->salvarUsr();
	    			$this->ExecView('cadastrar');
                }

	    		$this->oView->aUsuario = array(
	    			'nome'  => $_POST['nome']	,
	    			'email' => $_POST['email']	,
	    			'senha' => $_POST['senha']	,
                );

                $this->oView->lErro = true;

	    		$this->ExecView('cadastrar');

             }
        }

          /*Função 
        -------------------------------------*/
        public function cadastrar(){
            //Definir propiedades dentro do arrary pois no Metodo validar faz comparações
            $this->oView->aUsuario = array(
                'nome'  => '',
                'email' => '',
                'senha' => '',
            );
            $this->oView->lErro = false;
            $this->ExecView('cadastrar');
        }
    }

    



?>