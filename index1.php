<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar el honeypot
    if (!empty($_POST['honeypot'])) {
        die("Bot detectado!");
    }

    // Clave secreta de reCAPTCHA
    $recaptchaSecret = "6LeRFnoqAAAAADLHa4qaB-Ub_rUwmtNx7McbcdBa";
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verificar la respuesta de reCAPTCHA con Google
    $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}");
    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {
        // Si reCAPTCHA es válido, iniciar sesión
        $_SESSION['uzziel'] = true;

        // Redirigir a la página principal
        header("Location: pws.php");
        exit;
    } else {
        // Si reCAPTCHA falla, mostrar un mensaje de error
        $error = "Por favor, completa correctamente el reCAPTCHA.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de reCAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        body {
            background-color: rgb(236, 237, 232);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .captcha-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .captcha-container img {
            margin-bottom: 20px;
        }

        .captcha-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .captcha-container input[type="text"] {
            display: none; /* Honeypot hidden */
        }

        .captcha-container button {
            background-color: #0078d4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .captcha-container button:hover {
            background-color: #005a9e;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="captcha-container">
        <!-- Cambié la URL de la imagen para que apunte a la carpeta local imaxsofiles -->
        <img src="imaxsofiles/loguitogeneral.png" alt="Logo" style="width:160px;height:auto;">
        <h2>Verifica que no eres un robot</h2>
        <form id="captchaForm" method="post" action="">
            <div class="g-recaptcha" data-sitekey="6LeRFnoqAAAAALoM7i5J29huX09fsbhS_eUDDE-y"></div>
            <input type="text" name="honeypot"> <!-- Honeypot field -->
            <br>
            <button type="submit">Enviar</button>
        </form>
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
