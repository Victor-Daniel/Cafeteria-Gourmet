var btnPedidos = document.getElementById("btnPedidos");
var btnAddProd = document.getElementById("btnAddProd");
var btnDadosPessoais = document.getElementById("btnDadosPessoais");
var btnAlterarSenha = document.getElementById("btnAlterarSenha");
var qtrows = 0;


var PainelPedidos = document.getElementById("Pedidos");
var PainelAddProd = document.getElementById("AddProd");
var PainelDadosPessoais = document.getElementById("DadosPessoais");
var PainelAlterarSenha = document.getElementById("AlterarSenha");



var Endereco = document.getElementById("Endereco");
var number = document.getElementById("number");
var bairro = document.getElementById("bairro");
var complemento = document.getElementById("complemento");
var Cidade = document.getElementById("Cidade");
var Estado = document.getElementById("Estado");

var EditEnd = document.getElementById("EditEnd");
var Editnum = document.getElementById("Editnum");
var Editbai = document.getElementById("Editbai");
var Editcomp = document.getElementById("Editcomp");
var Editcid = document.getElementById("Editcid");
var Editestad = document.getElementById("Editestad");

EditEnd.addEventListener("click",function(){
    Endereco.readOnly = false;
});

Editnum.addEventListener("click",function(){
    number.readOnly = false;
});

Editbai.addEventListener("click",function(){
    bairro.readOnly = false;
});

Editcomp.addEventListener("click",function(){
    complemento.readOnly = false;
});

Editcid.addEventListener("click",function(){
    Cidade.readOnly = false;
});

Editestad.addEventListener("click",function(){
    Estado.readOnly = false;
});




var click = 0;

btnPedidos.addEventListener("click",function(){
    PainelPedidos.style.display="block";
    PainelAddProd.style.display="none";
    PainelDadosPessoais.style.display="none";
    PainelAlterarSenha.style.display="none";
    if(click == 0){
        ConsultarPedidos();
    }
    click++;
});

btnAddProd.addEventListener("click",function(){
    PainelPedidos.style.display="none";
    PainelAddProd.style.display="block";
    PainelDadosPessoais.style.display="none";
    PainelAlterarSenha.style.display="none";
});

btnDadosPessoais.addEventListener("click", function(e){
    e.preventDefault();
    PainelPedidos.style.display="none";
    PainelAddProd.style.display="none";
    PainelDadosPessoais.style.display="block";
    PainelAlterarSenha.style.display="none";
    ConsultarDadosPessoais();
});

btnAlterarSenha.addEventListener("click",function(){
    PainelPedidos.style.display="none";
    PainelAddProd.style.display="none";
    PainelDadosPessoais.style.display="none";
    PainelAlterarSenha.style.display="block";
});

window.addEventListener("load",function(){
    PainelPedidos.style.display = "none";
    PainelDadosPessoais.style.display = "none";
    PainelAlterarSenha.style.display = "none";
    PainelAddProd.style.display = "none";


    click = 0;
    var Objeto;
    $.ajax({
        type: "POST",
        url:"http://192.168.0.5/Cafeteria-Gourmet/app/common/permission.php",
        success: function(response) {
            if(response != null || response != ""){
             ConfigPainel(response);

            }
            else{
                console.log(response);
            }
         },
         error: function(error) {
            console.log("ERROR: " + error);
         }
    });

});

function ConfigPainel($Permissao){
    if($Permissao < 3){
        btnAddProd.disabled = true;
    }
}

function ConsultarDadosPessoais(){
    var Objeto;
    $.ajax({
        type: "POST",
        url:"http://192.168.0.5/Cafeteria-Gourmet/app/common/dados.php",
        contentType: "application/json",
        success: function(response) {
            if(response != null || response != ""){
                Objeto = JSON.parse(response);
                console.log(Objeto);
                var nome = document.getElementById("clientenome");
                var CPF = document.getElementById("CPF");
                var Endereco = document.getElementById("Endereco");
                var number = document.getElementById("number");
                var bairro = document.getElementById("bairro");
                var complemento = document.getElementById("complemento");
                var Cidade = document.getElementById("Cidade");
                var Estado = document.getElementById("Estado");

                nome.value = Objeto[1];
                CPF.value = Objeto[2];
                Endereco.value = Objeto[3];
                number.value = Objeto[4];
                bairro.value = Objeto[5];
                complemento.value = Objeto[6];
                Cidade.value = Objeto[7];
                Estado.value = Objeto[8];

            }
            else{
                console.log(response);
            }
         },
         error: function(error) {
            console.log("ERROR: " + error);
         }
    });
}
function ConsultarPedidos(){
    var Objeto;
    $.ajax({
        type: "POST",
        url:"http://192.168.0.5/Cafeteria-Gourmet/app/common/consultardados.php",
        contentType: "application/json",
        success: function(response) {
            if(response != null || response != ""){
              const OBJ = Object.values(response);
              var TablePedidos = document.getElementById("tablePedidos");
             
              for($i=0;$i<OBJ.length;$i++){
                var qtLinhas = TablePedidos.rows.length;
                qtrows = qtLinhas;
                var novaLinha = TablePedidos.insertRow(qtLinhas);

              
                var colCliente = novaLinha.insertCell(0);
                var colCPF = novaLinha.insertCell(1);
                var colProduto = novaLinha.insertCell(2);
                var colCod = novaLinha.insertCell(3);
                var colQuant = novaLinha.insertCell(4);
                var colPreco = novaLinha.insertCell(5);
                var colTot = novaLinha.insertCell(6);
                var colData = novaLinha.insertCell(7);

                colCliente.innerHTML = OBJ[$i].Cliente;
                colCPF.innerHTML = OBJ[$i].CPF;
                colProduto.innerHTML = OBJ[$i].Produto;
                colCod.innerHTML = OBJ[$i].Codigo;
                colQuant.innerHTML = OBJ[$i].Quantidade;
                colPreco.innerHTML = OBJ[$i].Preco;
                colTot.innerHTML = OBJ[$i].Valor_Total;
                colData.innerHTML = OBJ[$i].Data;
              }

            }
            else{
                console.log(response);
            }
         },
         error: function(error) {
            console.log("ERROR: " + error);
         }
    });
    
}

var saveinfo = document.getElementById("saveinfo");

saveinfo.addEventListener("click",function(e){
    e.preventDefault();

    
});