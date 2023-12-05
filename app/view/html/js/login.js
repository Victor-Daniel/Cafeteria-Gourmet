var btnLogin = document.getElementById("btn-login");
var login = document.getElementById("tbuser");
var senha = document.getElementById("tbpass");

btnLogin.addEventListener("click",function(e){
    e.preventDefault();
    Dados={
        "Usuario":login.value,
        "Senha":senha.value
    }
    $.ajax({
        type: "POST",
        url:"http://192.168.0.5/Cafeteria-Gourmet/app/common/login.php",
        contentType: "application/json",
        data: JSON.stringify(Dados),
        success: function(response) {
            if((response != null) || (response != "")){
                //window.location.replace("http://192.168.0.5/Cafeteria-Gourmet/index.php");
                console.log(response);
            }
         },
         error: function(error) {
            console.log("ERROR: " + error);
         }
    });
    
});

