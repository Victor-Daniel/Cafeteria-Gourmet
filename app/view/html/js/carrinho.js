var Aumentar = document.querySelectorAll('.Aumentar');
var Quantidade = document.querySelectorAll(".Quantidade");
var Diminuir = document.querySelectorAll('.Diminuir');

Aumentar.forEach(function(elemento,indice){
    
    elemento.addEventListener("click",function(){
        Quantidade[indice].value =  parseInt(Quantidade[indice].value) + 1; 
    });
});

Diminuir.forEach(function(elemento,indice){
    elemento.addEventListener("click",function(){
        if(Quantidade[indice].value > 1){
            Quantidade[indice].value =  parseInt(Quantidade[indice].value) - 1; 
        }
    });
});
