
document.getElementById("resultado").addEventListener("click", function() {
    this.select();
});

document.getElementById("botonCopiar").addEventListener("click", function() {
    var input = document.getElementById("resultado");
    input.select();
    document.execCommand("copy");
    alert("¡Texto copiado!");
});


function encryptData(text) {
    requestAjax("../../app/controller/RSAController.php?method=encrypt&data="+text, 'GET', null
    , (response) => {document.getElementById("resultado").value = response.data;});
}
function decryptData(text) {
    requestAjax("../../app/controller/RSAController.php?method=decrypt&data="+text, 'GET', null
    , (response) => {document.getElementById("resultado3").value = response.data;});
}

function requestAjax(url, method, data, fn = (response) => {}) {
    var ajax = new XMLHttpRequest();
    ajax.open(method, url);
    ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax.responseType = 'text'
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var response = {data:ajax.response};
            fn(response);
        }
    }
    ajax.send();
    
}