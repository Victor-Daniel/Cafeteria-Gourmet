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
Dados.Carrinho = Array();
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


Button.addEventListener("click",function(e){
    e.preventDefault();
    Dados.Carrinho.pop();
    Dados.Pagamento.pop();
    var PadraoCod = /([A-Z]{1}[a-z]{2})[:]/;
    const Regexprod = new RegExp(PadraoCod);
    var PadraoPrice = /[A-Z][$]/;
    const RegexPrice = new RegExp(PadraoPrice);

    QuantidadeProdutos.forEach(function(Element,indice){
        var CodProd = Cod[indice].innerHTML;
        var PriceProd = Price[indice].innerHTML;

        if(Regexprod.test(CodProd)&&(RegexPrice.test(PriceProd))){
            CodProd = CodProd.replace(PadraoCod,"");
            PriceProd = PriceProd.replace(PadraoPrice,"");
            Dados.Carrinho[indice] = Array(CodProd,ProdName[indice].innerHTML,PriceProd,Element.value);
        }
    });
    InformacoesCartoes.forEach(function(Element,indice){
        Dados.Pagamento[indice] = Element.value;
    });

    RequestPag(Dados);

});

async function RequestPag(Dados){
    try{
        const response = await fetch('http://192.168.0.5/Cafeteria-Gourmet/pagamento.php',{
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(Dados)
        });
        
        if(response.status==200){
            window.location.replace("http://192.168.0.5/Cafeteria-Gourmet/painel.php");
        }
    } 
    catch(error){
        alert('Erro na fetch API ! '+ error.message);
    }
}
