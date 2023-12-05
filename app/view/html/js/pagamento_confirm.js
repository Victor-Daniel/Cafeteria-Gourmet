var Painel = document.getElementById("btn-Painel");
var Inicial = document.getElementById("btn-Inicial");

Painel.addEventListener("click",function(){
    window.location.href="http://192.168.0.5/Cafeteria-Gourmet/painel.php";
});

Inicial.addEventListener("click",function(){
    window.location.href="http://192.168.0.5/Cafeteria-Gourmet/cardapio.php";
});