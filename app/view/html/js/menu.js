//Configuração dos filtros pelo click

var item = document.getElementById('filter');
var lista = document.getElementById('menu-lateral');
var CardSalgado = document.getElementById("item-salgado");
var CardBebida = document.getElementById("item-bebida");
var CardDoces = document.getElementById("item-doces");
var CardSobremesa = document.getElementById("item-sobremesa");
var AllCards = document.getElementById("all-itens");

item.addEventListener("click",function(){
    if(lista.style.display=="block"){
        lista.style.display="none";
    }
    else{
        lista.style.display="block";
    }
});

CardSalgado.addEventListener("click",function(){
    var ElementsBebida = document.querySelectorAll(".Bebida");
    for(var i = 0; i < ElementsBebida.length; i++){
        ElementsBebida[i].style.display="none";
    }
    var ElementsDoces = document.querySelectorAll(".Doces");
    for(var i = 0; i < ElementsDoces.length; i++){
        ElementsDoces[i].style.display="none";
    }

    var ElementsSobremesa = document.querySelectorAll(".Sobremesa");
    for(var i = 0; i < ElementsSobremesa.length; i++){
        ElementsSobremesa[i].style.display="none";
    }

    var ElementsSalgado = document.querySelectorAll(".Salgado");
    for(var i = 0; i < ElementsSalgado.length; i++){
        ElementsSalgado[i].style.display="block";
    }

});

CardBebida.addEventListener("click",function(){
    var ElementsBebida = document.querySelectorAll(".Bebida");
    for(var i = 0; i < ElementsBebida.length; i++){
        ElementsBebida[i].style.display="block";
    }
    var ElementsDoces = document.querySelectorAll(".Doces");
    for(var i = 0; i < ElementsDoces.length; i++){
        ElementsDoces[i].style.display="none";
    }

    var ElementsSobremesa = document.querySelectorAll(".Sobremesa");
    for(var i = 0; i < ElementsSobremesa.length; i++){
        ElementsSobremesa[i].style.display="none";
    }

    var ElementsSalgado = document.querySelectorAll(".Salgado");
    for(var i = 0; i < ElementsSalgado.length; i++){
        ElementsSalgado[i].style.display="none";
    }
});


CardDoces.addEventListener("click",function(){
    var ElementsBebida = document.querySelectorAll(".Bebida");
    for(var i = 0; i < ElementsBebida.length; i++){
        ElementsBebida[i].style.display="none";
    }
    var ElementsDoces = document.querySelectorAll(".Doces");
    for(var i = 0; i < ElementsDoces.length; i++){
        ElementsDoces[i].style.display="block";
    }

    var ElementsSobremesa = document.querySelectorAll(".Sobremesa");
    for(var i = 0; i < ElementsSobremesa.length; i++){
        ElementsSobremesa[i].style.display="none";
    }

    var ElementsSalgado = document.querySelectorAll(".Salgado");
    for(var i = 0; i < ElementsSalgado.length; i++){
        ElementsSalgado[i].style.display="none";
    }
});

CardSobremesa.addEventListener("click",function(){
    var ElementsBebida = document.querySelectorAll(".Bebida");
    for(var i = 0; i < ElementsBebida.length; i++){
        ElementsBebida[i].style.display="none";
    }
    var ElementsDoces = document.querySelectorAll(".Doces");
    for(var i = 0; i < ElementsDoces.length; i++){
        ElementsDoces[i].style.display="none";
    }

    var ElementsSobremesa = document.querySelectorAll(".Sobremesa");
    for(var i = 0; i < ElementsSobremesa.length; i++){
        ElementsSobremesa[i].style.display="block";
    }

    var ElementsSalgado = document.querySelectorAll(".Salgado");
    for(var i = 0; i < ElementsSalgado.length; i++){
        ElementsSalgado[i].style.display="none";
    }
});

AllCards.addEventListener("click",function(){
    var ElementsBebida = document.querySelectorAll(".Bebida");
    for(var i = 0; i < ElementsBebida.length; i++){
        ElementsBebida[i].style.display="block";
    }
    var ElementsDoces = document.querySelectorAll(".Doces");
    for(var i = 0; i < ElementsDoces.length; i++){
        ElementsDoces[i].style.display="block";
    }

    var ElementsSobremesa = document.querySelectorAll(".Sobremesa");
    for(var i = 0; i < ElementsSobremesa.length; i++){
        ElementsSobremesa[i].style.display="block";
    }

    var ElementsSalgado = document.querySelectorAll(".Salgado");
    for(var i = 0; i < ElementsSalgado.length; i++){
        ElementsSalgado[i].style.display="block";
    }
});