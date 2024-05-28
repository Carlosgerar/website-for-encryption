
document.getElementById("resultado").addEventListener("click", function() {
    this.select();
});

function copyText(id) {
    var copyText = document.getElementById(id);
    copyText.select();
    document.execCommand("copy");
    alert("¡Texto copiado!");
}
function generateKeysA() {
    validation();

    let num1 = parseInt(document.getElementById("d1").value, 10);
    let num2 = parseInt(document.getElementById("d2").value, 10);
    let es = document.getElementById("e").value;

    let p = num1;
    let q = num2;
    let n = p * q;
    let phi = (p - 1) * (q - 1);

    let e =  3;

    while (gcd(e, phi) !== 1) {
        e += 2;
    }

    let d = modInverse(e, phi);
    document.getElementById("textGenerateKey").innerHTML = '';
    document.getElementById("textGenerateKey").append(`Clave pública: (${e}, ${n})\nClave privada: (${d}, ${n})`);
    document.getElementById("e").value = e;

    return {
        publicKey: { e, n },
        privateKey: { d, n }
    };
}
function validation() {
    if(document.getElementById("d1").value == ''){
        document.getElementById("d1").value = defaultValuesKeys.p;
    }
    if(document.getElementById("d2").value == ''){
        document.getElementById("d2").value = defaultValuesKeys.q;
    }
    if(document.getElementById("e").value == ''){
        document.getElementById("e").value = defaultValuesKeys.e;
    }
}

function see(id, hiddenId) {
    var element = document.getElementById(id);
    element.style.display = "flex"
    if (hiddenId) {
        var element = document.getElementById(hiddenId);
        element.style.display = "none"
    }
}