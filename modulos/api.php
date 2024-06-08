<?php
function getFootballData($endpoint) {
    $apiKey = '5a7d7ee35361a36240895291ff91c959'; // Reemplaza con tu clave API de BeSoccer
    $url = 'https://api.besoccer.com/' . $endpoint;

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'X-RapidAPI-Host: api.besoccer.com',
            'X-RapidAPI-Key: ' . $apiKey
        ),
        CURLOPT_SSL_VERIFYPEER => false,  // Desactiva la verificación del certificado
        CURLOPT_SSL_VERIFYHOST => false,  // Desactiva la verificación del certificado
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo 'cURL Error #:' . $err;
        return null;
    } else {
        return json_decode($response, true);
    }
}

?>