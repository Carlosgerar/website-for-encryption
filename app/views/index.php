<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with JohnDoe landing page.">
    <meta name="author" content="Devcrud">
    <title>Encriptación de texto</title>
    <!-- font icons -->
    <link rel="stylesheet" href="../../app/assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + JohnDoe main styles -->
	<link rel="stylesheet" href="../../app/assets/css/johndoe.css">
    <script src="../../app/assets/js/index.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="30" id="home">
    <div>
        <button class="btn btn-outline-dark" onclick="see('encryptAndDecrypt', 'generateKey')" id="encryptAndDecryptButton">encriptar y desencriptar</button>
        <button class="btn btn-outline-dark" onclick="see('generateKey', 'encryptAndDecrypt')" id="generateKeyButton">generar llaves</button>
    </div>
    <header class="header">
        <div class="container" id="encryptAndDecrypt" style="display: flex; gap: 150px;">
            <div class="header-new">
                <h3>encriptar</h3>
                <div>
                    <h4 class="header-subtitle" >Ingrese cualquier texto</h4>
                    <input type="text" id="text" oninput="encryptData(this.value)" style="width: 200px;">
                </div>
                <div style="top: 43%;">
                    <h4 class="header-subtitle" >Resultado</h4>
                    <input type="text" id="resultado" readonly style="width: 200px;">
                    <button id="botonCopiar" onclick="copyText('resultado')" class="btn btn-outline-light">Copiar</button>
                </div>
            </div>
            <div class="header-new">
                <h3>desencriptar</h3>
                <div>
                    <h4 class="header-subtitle" >Ingrese cualquier texto</h4>
                    <input type="text" id="text3" oninput="decryptData(this.value)" style="width: 200px;">
                </div>
                <div style="top: 43%;">
                    <h4 class="header-subtitle" >Resultado</h4>
                    <input type="text" id="resultado3" readonly style="width: 200px;">
                    <button id="botonCopiar"  onclick="copyText('resultado3')" class="btn btn-outline-light">Copiar</button>
                </div>
            </div>
        </div>
        <div class="container" id="generateKey">
            <div class="header-new">
                <h3>generar llave</h3>
                <div>
                    <h4 class="header-subtitle" >primer digito</h4>
                    <input type="number" id="d1" value="12" oninput="generateKeys()" style="width: 200px;">
                </div>
                <div style="top: 43%;">
                    <h4 class="header-subtitle" >segundo digito</h4>
                    <input type="number" id="d2" value="34" oninput="generateKeys()"  style="width: 200px;">
                </div>
                <!-- <div style="top: 43%;">
                    <h4 class="header-subtitle" >e</h4>
                    <input type="number" id="e" value="17" oninput="generateKeys()"  style="width: 200px;">
                </div> -->
            </div>
            <div class="header-new" style="margin-left:134px; margin-top: 83px;">
                <h3>llave generada</h3>
                <div>
                    <div>
                        <h4 class="header-subtitle" >llave publica, parte 1</h4>
                        <input type="number" id="publicKey1" value="17" readonly style="width: 200px;">
                        <button id="botonCopiar"  onclick="copyText('publicKey1')" class="btn btn-outline-light">Copiar</button>
                    </div>
                    <div>
                        <h4 class="header-subtitle" >llave publica, parte 2</h4>
                        <input type="number" id="publicKey2" value="108" readonly style="width: 200px;">
                        <button id="botonCopiar"  onclick="copyText('publicKey2')" class="btn btn-outline-light">Copiar</button>
                    </div>
                </div>
                <div>
                    <div>
                        <h4 class="header-subtitle" >llave privada, parte 1</h4>
                        <input type="number" id="privateKey1" value="57" readonly style="width: 200px;">
                        <button id="botonCopiar"  onclick="copyText('privateKey1')" class="btn btn-outline-light">Copiar</button>
                    </div>
                    <div>
                        <h4 class="header-subtitle" >llave privada, parte 2</h4>
                        <input type="number" id="privateKey2" value="108" readonly style="width: 200px;">
                        <button id="botonCopiar"  onclick="copyText('privateKey1')" class="btn btn-outline-light">Copiar</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

	<!-- core  -->
    <script src="../../app/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../../app/assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="../../app/assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope  -->
    <script src="../../app/assets/vendors/isotope/isotope.pkgd.js"></script>
    
    <!-- Google mpas -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- JohnDoe js -->
    <script src="../../app/assets/js/johndoe.js"></script>
    <script>
        var defaultValuesKeys = {
            p: 12,
            q: 9,
            e: 17
        }
        var keys = {
            public: [17,108],
            private: [57,108]
        }
        var globalKeys = JSON.stringify(keys);

        function see(id, hiddenId){
            var element = document.getElementById(id);
            element.style.display ="flex" 
            if(hiddenId){
                var element = document.getElementById(hiddenId);
                element.style.display = "none"
            }
        }
    </script>
</body>
</html>
