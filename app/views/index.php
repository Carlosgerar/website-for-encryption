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
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="30" id="home">
    <header class="header">
        <div class="container" style="display: flex; gap: 150px;">
            <div class="header-new">
                <h3>encriptar</h3>
                <div>
                    <h4 class="header-subtitle" >Ingrese cualquier texto</h4>
                    <input type="text" id="text" oninput="encryptData(this.value)" style="width: 200px;">
                </div>
                <div style="top: 43%;">
                    <h4 class="header-subtitle" >Resultado</h4>
                    <input type="text" id="resultado" readonly style="width: 200px;">
                    <button id="botonCopiar" class="btn btn-outline-light">Copiar</button>
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
                    <button id="botonCopiar" class="btn btn-outline-light">Copiar</button>
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
    <script src="../../app/assets/js/index.js"></script>

</body>
</html>
