/*-------------------------
Javascript/Jquery
 Para o Menu Lateral
--------------------------*/

$(document).ready(function(){
   //alert('jQuery instalado');
   //Definição de Variaveis
   let oMenu = $('#abrirMenu');
   let oBkpAux = $('.menuLateral').html();
   let oSecao = $('#conteudoHome');
   let lOk = false;

   /*-------------------------------
    Click do Botão abrirMenu
   --------------------------------*/
   oMenu.click(function() {
    if(lOk ==  false){
        lOk = true;
        oMenuLat = $('.menuLateral');
        oMenuLat.css('width', '150px');
        oSecao.css('margin-left', '150px');
        
        //Retornar toda as tags a
        oList  = oMenuLat.find('a');
        
        oList[0].innerHTML= oList[0].innerHTML.replace("<i ","Home <i ") ;
        oList[1].innerHTML= oList[1].innerHTML.replace("<i ","Home <i ") ;
        oList[2].innerHTML= oList[2].innerHTML.replace("<i ","Home <i ") ;
        oList[3].innerHTML= oList[3].innerHTML.replace("<i ","Home <i ") ;
        oList[4].innerHTML= oList[4].innerHTML.replace("<i ","Home <i ") ;
        oList[5].innerHTML= oList[5].innerHTML.replace("<i ","Home <i ") ;
        oList[6].innerHTML= oList[6].innerHTML.replace("<i ","Home <i ") ;
        
        nX = 0;
        while (nX<= oList.length){ 
            oIcons = oList[nX].getElementsByTagName('i');
            oIcons[0].style.paddingLeft= '10px';
            nX++;
        }

    }else{
        lOk = false;
        document.getElementsByClassName('menuLateral')[0].innerHTML = oBkpAux;
        oMenuLat[0].style.width = '80px';
        oSecao.css('margin-left', '0px');
    
    }
  });
});
