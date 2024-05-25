
document.getElementById("resultado").addEventListener("click", function() {
    this.select();
});

function copyText(id) {
    var copyText = document.getElementById(id);
    copyText.select();
    document.execCommand("copy");
    alert("¡Texto copiado!");
}
function generateKeys() {
    validation();

    num1 = document.getElementById("d1").value;
    num2 = document.getElementById("d2").value;
    // e = document.getElementById("e").value;

    requestAjax("../../app/controller/RSAController.php?method=generateKeys&"+`num1=${num1}&num2=${num2}`, 'GET', null
    , (response) => {
        var keys = JSON.parse(response.data);
        globalKeys = response.data;
        document.getElementById("publicKey1").value = keys.public[0];
        document.getElementById("publicKey2").value = keys.public[1];
        document.getElementById("privateKey1").value = keys.private[0];
        document.getElementById("privateKey2").value = keys.private[1];
    });
}
function validation() {
    if(document.getElementById("d1").value == ''){
        document.getElementById("d1").value = defaultValuesKeys.p;
    }
    if(document.getElementById("d2").value == ''){
        document.getElementById("d2").value = defaultValuesKeys.q;
    }
    // if(document.getElementById("d2").value == ''){
    //     document.getElementById("e").value = defaultValuesKeys.e;
    // }
}
function encryptData(text) {
    requestAjax("../../app/controller/RSAController.php?method=encrypt&data="+text+`&globalKeys=${globalKeys}`, 'GET', null
    , (response) => {
        console.log(globalKeys);
        document.getElementById("resultado").value = response.data;
    });
}
function decryptData(text) {
    requestAjax("../../app/controller/RSAController.php?method=decrypt&data="+text+`&globalKeys=${globalKeys}`, 'GET', null
    , (response) => {
        console.log(globalKeys);
        document.getElementById("resultado3").value = response.data;
    });
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