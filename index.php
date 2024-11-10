<?php
session_start();

// Configura tus claves de reCAPTCHA
$siteKey = '6LfbwnoqAAAAANhPMOuAnd_rbtgTViC_AfvNmCxK';  // Reemplaza con tu clave de sitio de reCAPTCHA v3
$secretKey = '6LfbwnoqAAAAAHmdWff8-P_NwsuQGVZS38Tvpk2_'; // Reemplaza con tu clave secreta de reCAPTCHA v3

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener la respuesta del reCAPTCHA
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verificar la respuesta del reCAPTCHA con Google
    $response = @file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
    
    if ($response === FALSE) {
        // Manejar error al llamar a la API
        header('Location: error.php'); // Redirigir a una página de error
        exit();
    }

    $responseKeys = json_decode($response, true);

    // Validar la respuesta
    if ($responseKeys['success'] && $responseKeys['score'] >= 0.5) {
        // Si el score es mayor o igual a 0.5, iniciar la sesión 'uzziel'
        $_SESSION['uzziel'] = true;
        header('Location: pws.php'); // Redirige a pws.php
        exit();
    } else {
        // Si el reCAPTCHA no es válido o el score es bajo, redirige a index1.php
        header('Location: index1.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reCAPTCHA v3</title>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $siteKey; ?>"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo $siteKey; ?>', {action: 'homepage'}).then(function(token) {
                // Añadir el token al formulario
                document.getElementById('recaptchaResponse').value = token;
                // Enviar el formulario automáticamente
                document.getElementById('recaptchaForm').submit();
            });
        });
    </script>
</head>
<body>
    <form id="recaptchaForm" method="post">
        <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse">
        <!-- Este formulario se enviará automáticamente cuando se obtenga el token de reCAPTCHA -->
    </form>
</body>
</html>
