var InformacoesCartoes = document.querySelectorAll(".CartaoDados");

var QuantidadeProdutos = document.querySelectorAll(".Quantidade");

var Cod = document.querySelectorAll(".Cod");
var ProdName = document.querySelectorAll(".ProdName");

var Price = document.querySelectorAll(".Price");

var Button = document.querySelector(".button");

var CardHolder = document.querySelector("#cardHolder");

var CardNumber = document.querySelector('#cardNumber');

var ExpiryDate = document.querySelector("#expiryDate");

var cvv = document.querySelector("#cvv");

var Dados = {};
Dados.Produtos = Array();
Dados.Pagamento = Array();

CardHolder.addEventListener("keypress",function(e){
    const KeyCode = (e.which) ?  e.which : e.keyCode;
    if(KeyCode > 47 && KeyCode < 58){
        e.preventDefault(0);
    }
});

CardNumber.addEventListener("keypress",function(e){
    const KeyCode = (e.which) ?  e.which : e.keyCode;
    if(!(KeyCode > 47 && KeyCode < 58)){
        e.preventDefault(0);
    }
});

ExpiryDate.addEventListener("keypress",function(e){
    const KeyCode = (e.which) ?  e.which : e.keyCode;
    if(!(KeyCode > 47 && KeyCode < 58)){
        e.preventDefault(0);
    }
});

cvv.addEventListener("keypress",function(e){
    const KeyCode = (e.which) ?  e.which : e.keyCode;
    if(!(KeyCode > 47 && KeyCode < 58)){
        e.preventDefault(0);
    }
});

ExpiryDate.addEventListener("change",function(){
    var Data = ExpiryDate.value;
    const regex = new RegExp(/^([0-9]{2})[/][0-9]{2}$/);
    var Barra = "/";

    var DataAlterada = Data.slice(0,2) + Barra + Data.slice(2);

    if(regex.test(DataAlterada)){
        var Mes = parseInt(Data.slice(0,2),10);
        var Ano = parseInt(Data.slice(2,4),10);
        var CurrentYear = new Date().getFullYear().toString().substr(-2);
        if(((Mes > 12)||(Mes < 1))||(Ano < CurrentYear)){
            alert("Favor inserir um mês ou ano válido!");
            ExpiryDate.value = "";
        }   
        else{
            ExpiryDate.value = DataAlterada;
        }
    }
    else{
        alert("Formato não reconhecido!");
        ExpiryDate.value = "";
    }
});


function AjustandoCarrinho(Produtos){
    var Estoque = document.querySelectorAll(".Estoque");
    Estoque.forEach(function(conteudo,indice){
        if(conteudo.innerHTML==0){
            alert("Um ou alguns dos produtos deste carrinho não possui estoque disponível! Este produto será removido automaticamente.");
            Produtos.splice(indice,1);
            console.log(Produtos);
        }
    });
    VerificarEstoque();

    return Produtos;
}

Button.addEventListener("click",function(e){
    e.preventDefault();
    Dados.Produtos.pop();
    Dados.Pagamento.pop();
    var PadraoCod = /([A-Z]{1}[a-z]{2})[:]/;
    const Regexprod = new RegExp(PadraoCod);

    QuantidadeProdutos.forEach(function(Element,indice){
        var CodProd = Cod[indice].innerHTML;
        if(Regexprod.test(CodProd)){
            CodProd = CodProd.replace(PadraoCod,"");
            Dados.Produtos[indice] = Array(CodProd,Element.value);
        }
    });
    InformacoesCartoes.forEach(function(Element,indice){
        Dados.Pagamento[indice] = Element.value;
    });
    Dados.Produtos = AjustandoCarrinho(Dados.Produtos);
    var empity = 0;
    Dados.Pagamento.forEach(function(Element){
        if(Element==""){
            empity = empity + 1;
        }
    });
    if(empity > 0){
        alert("Favor preencher os dados corretamente!")
    }
    else{
        RequestPag(Dados);
    }
});

 function RequestPag(Dados){
    $.ajax({
        type: "POST",
        url:"http://192.168.0.5/Cafeteria-Gourmet/app/common/comprar.php",
        contentType: "application/json",
        data: JSON.stringify(Dados),
        success: function(response) {
            if((response == null) || (response == "")){
                window.location.replace("http://192.168.0.5/Cafeteria-Gourmet/pagamento.php");
            }
         },
         error: function(error) {
            console.log("ERROR: " + error);
         }
    });
}



function VerificarEstoque(){
    var Estoque = document.querySelectorAll(".Estoque");
    var Prod = document.querySelectorAll(".CardCarrinho");
    Estoque.forEach(function(Element,Indice){
        if(Element.innerHTML==0){
            Prod[Indice].remove();
        }
    });
}
