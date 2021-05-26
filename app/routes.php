<?php
    //Definir nome do arquivo para instaciar a classe index/public
    namespace app;

    //Utilizar a classe Route
    use mf\route\route;
 
    /*Continuação da classe route
    -----------------------------------------------*/
    class Routes extends route {
        
        //Função para definir o array de rotas
        protected function iniRoutes(){

            //Primeira Rota Index
            $aRoutes['index'] = array(
                'route' => '/WebEdufinans/',
                'controller' => 'indexController',
                'action'    =>  'index'
            );

            //Segunda Rota Autenticar
            $aRoutes['autenticar'] = array(
                'route' => '/WebEdufinans/autenticar',
                'controller' => 'authController',
                'action'    =>  'autenticar'
            );
            //Terceira Rota Home
            $aRoutes['home'] = array(
                'route' => '/WebEdufinans/home',
                'controller' => 'appController',
                'action'    =>  'home'
            );
            //Quarta Rota Sair
               $aRoutes['sair'] = array(
                'route' => '/WebEdufinans/sair',
                'controller' => 'authController',
                'action'    =>  'sair'
            );

            //Cadastrar Usuario
            $aRoutes['incluirUsr'] = array(
                'route' => '/WebEdufinans/incluirUsr',
                'controller' => 'indexController',
                'action'    =>  'incluirUsr'
           );

            //Registrar Despesa
            $aRoutes['incDespesa'] = array(
                'route' => '/WebEdufinans/incDespesa',
                'controller' => 'appController',
                'action'    =>  'incDespesa'
           );

            //Registrar Despesa
            $aRoutes['altDespesa'] = array(
             'route' => '/WebEdufinans/altDespesa',
             'controller' => 'appController',
             'action'    =>  'altDespesa'
           );

             //Registrar Despesa
             $aRoutes['delDespesa'] = array(
              'route' => '/WebEdufinans/delDespesa',
              'controller' => 'appController',
              'action'    =>  'delDespesa'
            );

            //Cadastrar Usuario
            $aRoutes['lotoFacil'] = array(
                'route' => '/WebEdufinans/lotoFacil',
                'controller' => 'appController',
                'action'    =>  'lotoFacil'
           );
            $this->setRoutes($aRoutes);
    

        }
    }

?>