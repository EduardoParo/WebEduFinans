/*------------------------------------------------------------------
    Funçao Gravar 
--------------------------------------------------------------------*/
function gravarRegistro(nId_des=null){
    let oId_Usr       = $('#nId_Usr  ');
    let oData         = $('#dData    ');
    let oKm           = $('#nKm      ');
    let oTitulo       = $('#cTitulo  ');
    let oProduto      = $('#cProduto ');
    let oMarca        = $('#cMarca   ');
    let oValorUni     = $('#nValorUni');
    let oQtd          = $('#nQtd     ');
    let oValorTotal   = $('#nValorTotal   ');
    let oObs          = $('#cObs     ');
    let lOk = false;

    if(nId_des == null){
        $.post('/WebEdufinans/incDespesa',         
            {   
                nId_Usr         : oId_Usr.val(),  
                dData           : oData.val(),    
                nKm             : oKm.val(),      
                cTitulo         : oTitulo.val(),  
                cProduto        : oProduto.val(), 
                cMarca          : oMarca.val(),   
                nValorUni       : oValorUni.val(),
                nQtd            : oQtd.val(),     
                nValorTotal     : oValorTotal.val(),   
                cObs            : oObs.val()     
            },
            function (retorno){ 
                parent.location.reload();
            }
        );

    }else{
        //Caso Seja Alteração chamar a Rota Inlcluir porem passando o ID
        $.post('/WebEdufinans/incDespesa', 

            { 
                nId_des          : nId_des,
                nId_Usr         :   oId_Usr.val(),  
                dData           :   oData.val(),    
                nKm             :   oKm.val(),      
                cTitulo         :   oTitulo.val(),  
                cProduto        :   oProduto.val(), 
                cMarca          :   oMarca.val(),   
                nValorUni       :   oValorUni.val(),
                nQtd            :   oQtd.val(),     
                nValorTotal     :   oValorTotal.val(), 
                cObs            :   oObs.val()     

            },
            function (retorno){ 
                parent.location.reload();
            }
        );
    
    }

}

/*-----------------------------------------------------------------
    Funçao Editar Retorna os dados dos campos do Registro Selecionado
--------------------------------------------------------------------*/
 function Editar(des_id) {
    let nId_des       = des_id;
    let oData         = $('#dData    ');
    let oKm           = $('#nKm      ');
    let oTitulo       = $('#cTitulo  ');
    let oProduto      = $('#cProduto ');
    let oMarca        = $('#cMarca   ');
    let oValorUni     = $('#nValorUni');
    let oQtd          = $('#nQtd     ');
    let oValorTotal   = $('#nValorTotal   ');
    let oObs          = $('#cObs     ');



    $.post('/WebEdufinans/altDespesa', { nId_des : nId_des}, function (retorno){ 
        if(retorno != null){
            

            //Inicializa Modal
            $('#telaModal').modal('show');
           $("#btn_registrar_modal").html('Alterar');

            //Montagem do botão Alterar registros
            $('#titulo_modal').html('Alterar');
            $("#btn_registrar_modal").click(function() {
                gravarRegistro(nId_des);
            });

            //Retornar os dados do Registro selecionado
            let aDados = JSON.parse(retorno);

            oData.val(          aDados[0].des_data            );          
            oKm.val(            aDados[0].des_km              );          
            oTitulo.val(        aDados[0].des_titulo          );     
            oProduto.val(       aDados[0].des_produto         );  
            oMarca.val(         aDados[0].des_marca           );      
            oValorUni.val(      aDados[0].des_vl_uni          ); 
            oQtd.val(           aDados[0].des_quantidade      );        
            oValorTotal.val(    aDados[0].des_vl_total        );   
            oObs.val(           aDados[0].des_obs             ); 
          
            
        } else {
            alert("Resultado nulo");
        }
    });

 }

 /*----------------------------------------------------------------
    Funçao Deletar
--------------------------------------------------------------------*/
function Deletar(nId_des){
    
    //Iniciar Modal
   showModal();

   $('#titulo_modal').html('Excluir');
   $('#titulo_modal_div').addClass('modal-header text-danger');
   
   $('#conteudo_modal').html('Tem certeza que deseja excluir o item : ' +nId_des);
   
   $('#btn_voltar_modal').html('Não');
   $('#btn_voltar_modal').addClass('btn btn-secondary bg-danger');
   $('#btn_voltar_modal').click(function() {
       parent.location.reload();
   });

   
   //Botao confirmar para Excluir o Registro
   $('#btn_registrar_modal').html('Sim');
   $('#btn_registrar_modal').addClass('btn btn-secondary bg-success');
   $('#btn_registrar_modal').click(function(){
      
       $.post('/WebEdufinans/delDespesa', { nId_des : nId_des}, function (retorno){ 
           if(retorno != null){
               let aDados = JSON.parse(retorno);
               window.location.reload();
           }
       });
   })
}

/*--------------------------------------------------------------
    Calcular valor total
-----------------------------------------------------------------*/
$(document).on("keyup","#nQtd",function(){
    let nTotal = 0;
    let nQtd= $('#nQtd').val();
    let nVlUni = $('#nValorUni').val();

    nTotal =  nQtd* nVlUni;
    $('#nValorTotal').val(nTotal);

})

function validaForm(){
    let oData         = $('#dData    ');
    let oKm           = $('#nKm      ');
    let oTitulo       = $('#cTitulo  ');
    let oProduto      = $('#cProduto ');
    let oMarca        = $('#cMarca   ');
    let oValorUni     = $('#nValorUni');
    let oQtd          = $('#nQtd     ');
    let oValorTotal   = $('#nValorTotal   ');

    if(oData.val() ==''){
        return false;
    }

}