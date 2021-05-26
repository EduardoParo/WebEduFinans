<?php 

//Definir namespace
namespace app\controller;
//Executar a classe do arquivo

use mf\controller\controller;
use mf\model\modelConnect ;

/*----------------------------------
    Extenção da classe Controller
-------------------------------------*/
class appController extends controller{
   
    /*Metodo Post ROTA Home
    ------------------------*/
    public function home(){ 
        //Validar usuario
        $this->validaAutenticacao();
        
        //Abre conexão com o Banco e instancia o Objeto Usuario
        $oDespesa = modelConnect::getModel('despesa');
        
        //Atribuir ao obj o Id do usuario
        $oDespesa->__set('nId_Usr', $_SESSION['nId']);
   
        ////Transformar array em json para encaminhar para o JS
        $aDados = json_encode($oDespesa->getAll());
        
        //Encaminhar os dados para a View é necessario utilizar o echo na pagina para imprimir o codigo JS
        $this->oView->aDados = '<script>
                                    let aLista = Array()
                                    aLista='.$aDados.'
                                 </script>';
       //Chamar a pagina Home
       $this->ExecView('home','layout2');
        
    }
    
     /*Registrar dados no banco de dados / ROTA REGISSUE
    ----------------------------------------------------*/
    public function incDespesa(){
        
        $this->validaAutenticacao();
        $oDespesa = modelConnect::getModel('despesa');
        //Verificar se é Atualização
        if(isset($_REQUEST["nId_des"])){
            $oDespesa->__set('nId_des'       ,$_REQUEST['nId_des']);
            $oDespesa->__set('nId_Usr'       ,$_SESSION['nId']);
            $oDespesa->__set('dData'         ,$_REQUEST['dData'      ]);
            $oDespesa->__set('nKm'           ,$_REQUEST['nKm'        ]);
            $oDespesa->__set('cTitulo'       ,$_REQUEST['cTitulo'    ]);
            $oDespesa->__set('cProduto'      ,$_REQUEST['cProduto'   ]);
            $oDespesa->__set('cMarca'        ,$_REQUEST['cMarca'     ]);
            $oDespesa->__set('nValorUni'     ,$_REQUEST['nValorUni'     ]);
            $oDespesa->__set('nQtd'          ,$_REQUEST['nQtd'       ]);
            $oDespesa->__set('nValorTotal'   ,$_REQUEST['nValorTotal'   ]);
            $oDespesa->__set('cObs'          ,$_REQUEST['cObs'       ]);
            

            $oDespesa->updateDespesa();
        }else{
           
            $oDespesa->__set('nId_Usr'      ,$_SESSION['nId']);
            $oDespesa->__set('dData'        ,$_REQUEST['dData'      ]);
            $oDespesa->__set('nKm'          ,$_REQUEST['nKm'        ]);
            $oDespesa->__set('cTitulo'      ,$_REQUEST['cTitulo'    ]);
            $oDespesa->__set('cProduto'     ,$_REQUEST['cProduto'   ]);
            $oDespesa->__set('cMarca'       ,$_REQUEST['cMarca'     ]);
            $oDespesa->__set('nValorUni'    ,$_REQUEST['nValorUni'     ]);
            $oDespesa->__set('nQtd'         ,$_REQUEST['nQtd'       ]);
            $oDespesa->__set('nValorTotal'  ,$_REQUEST['nValorTotal'   ]);
            $oDespesa->__set('cObs'         ,$_REQUEST['cObs'       ]);

            $oDespesa->insertDespesa();
        }

        header('Location: /WebEdufinans/home');
    }

    /*Alterar Despesa // ROTA 
    ----------------------------------------*/
    public function altDespesa(){
        $this->validaAutenticacao();

        $oDespesa = modelConnect::getModel('despesa');
        
        //Pegar o valor da rquisição Ajax
        $oDespesa->__set('nId_des', $_REQUEST["nId_des"]);

        //Transformar array em json para encaminhar para o JS
        $aDados = json_encode($oDespesa->getDespesa());

        //Retornar Json para o Js
        echo $aDados;
                                
    }

      /*Excluir Issue // ROTA EXCLUIR ISSUE
      --------------------------------------------*/
      public function delDespesa(){
        $this->validaAutenticacao();

        $oDespesa = modelConnect::getModel('despesa');
        
        //Pegar o valor da rquisição Ajax
        $oDespesa->__set('nId_des', $_REQUEST["nId_des"]);

        //Transformar array em json para encaminhar para o JS
        $aDados = json_encode($oDespesa->delDespesa());

        //Retornar Json para o Js
        echo $aDados;
                                
    }


    //Função lotoFacil
    public function lotoFacil(){
        $this->validaAutenticacao();

       //Chamar a pagina Home
       $this->ExecView('lotoFacil');
    }

    /*Função Validar autenticação
    -------------------------------------*/
    public function validaAutenticacao(){     
        //Iniciar seção PHP
        session_start();

        if(!isset($_SESSION['nId']) || $_SESSION['nId'] == '' || !isset($_SESSION['nId']) || $_SESSION['nId'] == ''){
            //Define o caminho ?login=erro
            header('Location: /WebEdufinans/?login=erro');
        }else{
            return true;
        }
    }
    
}

?>    

    