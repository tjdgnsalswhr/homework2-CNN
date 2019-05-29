<?php
function gcd($num1, $num2)
{
    while ($num2 != 0) {
        $rest = $num1 % $num2;
        $num1 = $num2;
        $num2 = $rest;
    }
    return $num1;
}

function getN($p, $q)
{
    $n = $p * $q;

    return $n;
}

function getTotient($p, $q)
{
    $totient = ($p - 1) * ($q - 1);

    return $totient;
}

function publicKey($totient)
{
    $publicKey = 2;
    while ($publicKey < $totient && gcd($publicKey, $totient) != 1) {
        $publicKey += 1;
    }
    return $publicKey;
}

function privateKey($publicKey, $totient)
{
    $privateKey = 1;
    while (($privateKey * $publicKey) % $totient != 1 || $privateKey == $publicKey) {
        $privateKey += 1;
    }
    return $privateKey;
}

function encrypt($publicKey, $n, $sessionKey)
{
    $encryptedKey = (pow($sessionKey, $publicKey)) % $n;
    return $encryptedKey;
}

function decrypt($privateKey, $n, $encryptedKey)
{
    $decryptedKey = ($encryptedKey * $privateKey) % $n;
    return $decryptedKey;
}

function Public_Key($json_data)
{
    $p_Server = 23;
    $q_Server = 49;
    $totient_Server = getTotient($p_Server, $q_Server);

    $Public_Key_Client = $json_data['Public_Key_Client'];
    $Public_Key_Server = publicKey($totient_Server);
    $Private_Key_Server = privateKey($Public_Key_Server, $totient_Server);

    $value = array(
        'p_Server' => $p_Server,
        'q_Server' => $q_Server,
        'Public_Key_Client' => $Public_Key_Client,
        'Public_Key_Server' => $Public_Key_Server,
        'Private_Key_Server' => $Private_Key_Server
    );
    $_POST['value'] = $value;

    $Public_Key = array(
        'Public_Key_Server' => $Public_Key_Server
    );
    echo json_encode($Public_Key);
}
?>










